<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Store a newly created review in the database.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        // Get the authenticated user (if available)
        $user = Auth::user();

        // Create the review
        Review::create([
            'user_id' => $user ? $user->id : null, // Associate with the user if logged in
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_visible' => true, // Set the review as visible by default
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Thank you for your review!');
    }
}
