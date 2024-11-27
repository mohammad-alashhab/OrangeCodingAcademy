<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Display all reviews
    public function index(Request $request)
    {
        $search = $request->input('search');
        $visibility = $request->input('visibility'); // Filter by visibility

        $reviews = Review::query()
            ->when($search, function ($query) use ($search) {
                $query->where('comment', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
            })
            ->when($visibility, function ($query) use ($visibility) {
                $query->where('is_visible', $visibility);
            })
            ->with('user') // Include user information
            ->paginate(10);

        return view('admin.reviews.index', compact('reviews'));
    }

    // Toggle visibility of a review
    public function toggleVisibility($id)
    {
        $review = Review::findOrFail($id);

        $review->update(['is_visible' => !$review->is_visible]);

        // Log the action
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => 'toggle_visibility',
            'details' => 'Toggled visibility for review ID ' . $review->id,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review visibility updated successfully!');
    }

    // View a single review in detail
    public function show($id)
    {
        $review = Review::with('user')->findOrFail($id);

        return view('admin.reviews.show', compact('review'));
    }
}
