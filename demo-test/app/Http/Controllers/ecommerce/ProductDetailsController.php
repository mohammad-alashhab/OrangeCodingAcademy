<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductDetailsController extends Controller
{
    public function index($id)
    {
        // Fetch the product by ID with its relationships
        $product = Product::with(['images', 'reviews', 'category', 'brand', 'discounts'])
        ->findOrFail($id);

        // Calculate the average rating
        $averageRating = $product->reviews->avg('rating') ?? 0;

        // Fetch related products from the same category (excluding the current product)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id) // Exclude the current product
            ->with(['images', 'reviews']) // Eager load images and reviews
            ->take(10) // Limit to 10 related products
            ->get();

        // Pass the product, average rating, and related products to the view
        return view('ecommerce.product-details', compact('product', 'averageRating', 'relatedProducts'));
    }

    public function store(Request $request)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'You must be logged in to submit a review.'], 401);
        }

        // Validate the request data
        try {
            $validated = $request->validate([
                'product_id' => 'required|exists:products,id',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'required|string|max:1000',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return JSON response with validation errors
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $e->errors(),
            ], 422);
        }

        // Get the authenticated user
        $user = Auth::user();

        // Create the review
        Review::create([
            'user_id' => $user->id, // Associate with the logged-in user
            'product_id' => $validated['product_id'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'is_visible' => true, // Set the review as visible by default
        ]);

        // Return a JSON response indicating success
        return response()->json(['success' => true, 'message' => 'Thank you for your review!']);
    }
}