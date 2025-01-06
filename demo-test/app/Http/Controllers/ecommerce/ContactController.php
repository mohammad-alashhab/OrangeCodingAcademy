<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('ecommerce.contacts', compact('brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|alpha|max:255', // Allow only alphabetic characters
            'lastname' => 'required|alpha|max:255', // Allow only alphabetic characters
            'number' => 'required|numeric|digits_between:10,15', // Ensure number is numeric
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', // Allow only Gmail email
            'message' => 'required|string',
        ]);

        // Save the contact message
        Contact::create([
            'first_name' => $validated['firstname'],
            'last_name' => $validated['lastname'],
            'phone_number' => $validated['number'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        // Return a JSON response indicating success
        return response()->json(['success' => true, 'message' => 'Your message has been sent successfully!']);
    }
}
