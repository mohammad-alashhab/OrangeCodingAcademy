<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Status;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Display all contacts with pagination
    public function index(Request $request)
    {
        $search = $request->input('search');

        $contacts = Contact::query()
            ->with(['status']) // Only include the status relationship
            ->when($search, function ($query) use ($search) {
                $query->where('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('phone_number', 'like', "%{$search}%")
                ->orWhere('message', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    // Show details of a specific contact
    public function show($id)
    {
        $contact = Contact::with(['status'])->findOrFail($id); // Include only the status relationship
        $statuses = Status::where('type', 'contact')->get();

        // Check if the status is 'Closed' or 'Resolved' and pass this information to the view
        $isStatusEditable = !in_array($contact->status->name, ['Closed', 'Resolved']);

        return view('admin.contacts.show', compact('contact', 'statuses', 'isStatusEditable'));
    }

    // Update the status of a contact
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status_id' => 'required|exists:statuses,id'
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update([
            'status_id' => $validated['status_id'],
            'updated_at' => now(),
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact status updated successfully!');
    }
}
