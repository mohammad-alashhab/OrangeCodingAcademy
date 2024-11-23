<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display all users
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%");
            })
            ->with('role') // Ensure to eager load roles for performance
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }


    // Show form to create a user
    public function create()
    {
        $roles = Role::all(); // Assuming you have a Role model
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
            'is_active' => 'boolean', // Validate 'is_active' field
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
            'role_id' => $validated['role_id'],
            'is_active' => $validated['is_active'] ?? 1, // Default to active if not provided
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }


    // Show form to edit a user
    public function edit($id)
    {
        $user = User::findOrFail($id); // Retrieve the user or fail with 404
        return view('admin.users.edit', compact('user')); // Pass the user object to the view
    }


    // Update a user in the database
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'role_id' => 'required|exists:roles,id',
            'is_active' => 'boolean', // Validate 'is_active' field
        ]);

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }


    // Delete a user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

    // Toggle user status (active/inactive)
    public function toggleStatus(User $user)
    {
        // Only toggle the 'is_active' column
        $user->update(['is_active' => !$user->is_active]);

        return redirect()->route('users.index')->with('success', 'User status updated successfully!');
    }

    public function show($id)
    {
        // Fetch user with the associated role and addresses
        $user = User::with('role', 'addresses')->findOrFail($id);

        // Fetch orders associated with the user along with statuses
        $orders = $user->orders()->with('status')->get();

        return view('admin.users.show', compact('user', 'orders'));
    }




}
