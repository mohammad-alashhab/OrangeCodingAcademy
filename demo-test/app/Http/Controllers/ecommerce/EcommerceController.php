<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    // Display the homepage
    public function index()
    {
        $categories = Category::all();
        $products = Product::all(); // Fetch all products
        $brands = Brand::all(); // Fetch all products
        // Sort products by average rating in descending order
        $sortedProducts = $products->sortByDesc(function ($product) {
            return $product->reviews->avg('rating') ?? 0;
        });
        $recentProducts = Product::with('reviews', 'images')
        ->orderBy('created_at', 'asc') // Order by created_at in ascending order
        ->take(10) // Optional: limit the number of products
        ->get();
        // Bestseller products: sort by total orders (assuming `orders_count` is available)
        $bestsellerProducts = Product::withCount('orders') // Assuming an 'orders' relationship exists
        ->orderBy('orders_count', 'desc')
        ->take(10) // Optional: limit to top 10 bestsellers
        ->get();

        // Top products: sort by a combination of total orders and average rating
        $topProducts = $products->sortByDesc(function ($product) {
            $orderCount = $product->orders->count() ?? 0;
            $averageRating = $product->reviews->avg('rating') ?? 0;
            return $orderCount + $averageRating; // Weighted score
        })->take(10); // Optional: limit to top 10

        // New products: order by `created_at` in descending order
        $newProducts = Product::with('reviews', 'images')
        ->orderBy('created_at', 'desc') // Newest to oldest
        ->take(10) // Optional: limit to top 10 newest products
        ->get();
        $deals = Discount::with([
            'product' => function ($query) {
                $query->with('images', 'reviews');
            }
        ])
        ->active() // Assuming the `scopeActive` is defined in the `Discount` model
            ->where('enddate',
                '>',
                Carbon::now()
            ) // Exclude expired discounts
            ->inRandomOrder() // Fetch random products
            ->limit(1) // Limit to one deal
            ->get();

        return view('ecommerce.home', compact('categories', 'products', 'deals', 'sortedProducts', 'recentProducts',
    'bestsellerProducts', 'topProducts', 'newProducts', 'brands'));
    }

    // App\Http\Controllers\ecommerce\EcommerceController.php
    public function getProductDetails($id)
    {
        $product = Product::with(['images', 'reviews', 'category', 'brand', 'discounts'])
        ->findOrFail($id);

        // Calculate average rating
        $averageRating = $product->reviews->avg('rating') ?? 0;

        // Prepare response
        return response()->json([
            'product' => $product,
            'averageRating' => $averageRating,
            'reviewCount' => $product->reviews->count(),
        ]);
    }

    public function about()
    {
        return view('ecommerce.about-us');
    }

    // Show a specific category with products
    public function show($id)
    {
        $category = Category::with('products')->findOrFail($id);
        return view('category.show', compact('category'));
    }
}
