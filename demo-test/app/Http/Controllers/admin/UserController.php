<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\AuditLog;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display all users
    public function index(Request $request)
    {
        $search = $request->input('search');
        $loggedInUser = auth()->user();

        $users = User::query()
            ->when($loggedInUser->role_id == 2, function ($query) {
                // Admin (role_id = 2) fetches only customers (role_id = 3)
                $query->where('role_id', 3);
            })
            ->when($loggedInUser->role_id == 1, function ($query) use ($loggedInUser) {
                // Super Admin (role_id = 1) fetches all users except themselves
                $query->where('id', '!=', $loggedInUser->id);
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->with('role')
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    // Show form to create a user
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    // Store a new user in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'role_id' => 'required|exists:roles,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('users', 'public') : null;

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
            'role_id' => $validated['role_id'],
            'image' => $imagePath,
            'is_active' => $validated['is_active'] ?? 1,
        ]);

        // Log the creation action
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => 'create',
            'details' => 'Created user: ' . $user->name,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    // Show form to edit a user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorizeUserEdit($user);

        return view('admin.users.edit', compact('user'));
    }

    // Update a user's information
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorizeUserEdit($user);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'role_id' => 'required|exists:roles,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->file('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $validated['image'] = $request->file('image')->store('users', 'public');
        } else {
            $validated['image'] = $user->image;
        }

        $user->update($validated);

        // Log the update action
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => 'update',
            'details' => 'Updated user: ' . $user->name,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    // Delete a user
    public function destroy(User $user)
    {
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        // Log the delete action
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => 'delete',
            'details' => 'Deleted user: ' . $user->name,
        ]);

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

    // Toggle user status
    public function toggleStatus(User $user)
    {
        $user->update(['is_active' => !$user->is_active]);

        // Log the toggle status action
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => 'toggle_status',
            'details' => 'Toggled status for user: ' . $user->name,
        ]);

        return redirect()->route('users.index')->with('success', 'User status updated successfully!');
    }

    // View user details
    public function show($id)
    {
        $user = User::with('role', 'addresses')->findOrFail($id);
        $this->authorizeUserView($user);

        $orders = $user->orders()->with('status')->paginate(5);

        // Fetch admin/super admin activities with pagination
        $auditLogs = [];
        if (in_array($user->role_id, [1, 2])) {
            // Paginate the audit logs for the user, 10 per page
            $auditLogs = AuditLog::where('user_id', $user->id)
                ->latest()
                ->paginate(5); // You can adjust the number of items per page
        }

        return view('admin.users.show', compact('user', 'orders', 'auditLogs'));
    }

    // Authorization for editing users
    private function authorizeUserEdit($user)
    {
        $loggedInUser = auth()->user();

        if ($loggedInUser->role_id == 2 && $user->role_id == 2) {
            abort(403, 'Access denied');
        }

        if ($loggedInUser->role_id == 2 && $user->role_id != 3) {
            abort(403, 'Access denied');
        }

        if ($loggedInUser->role_id == 1 && $loggedInUser->id == $user->id) {
            abort(403, 'Access denied');
        }
    }

    // Authorization for viewing users
    private function authorizeUserView($user)
    {
        $loggedInUser = auth()->user();

        if ($loggedInUser->role_id == 2 && $user->role_id == 2) {
            abort(403, 'Access denied');
        }

        if ($loggedInUser->role_id == 2 && $user->role_id != 3) {
            abort(403, 'Access denied');
        }

        if ($loggedInUser->role_id == 1 && $loggedInUser->id == $user->id) {
            abort(403, 'Access denied');
        }
    }
}

