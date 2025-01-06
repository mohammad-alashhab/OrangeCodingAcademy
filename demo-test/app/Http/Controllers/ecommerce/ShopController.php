<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index(Request $request)
    {
        // Get the filter value from the request
        $sort = $request->query('sort', 'latest');
        $categoryId = $request->query('category'); // Get the selected category ID

        // Initialize the query
        $query = Product::query();

        // Apply category filter if a category is selected
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Apply sorting filters based on the selected option
        switch ($sort) {
            case 'newness':
                $query->orderBy('created_at', 'desc'); // Sort by creation date (newness)
                break;
            case 'rating':
                $query->withAvg('reviews', 'rating') // Sort by average rating
                ->orderBy('reviews_avg_rating', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc'); // Default: Sort by latest
                break;
        }

        // Paginate the results
        $products = $query->paginate(3);

        // Fetch all categories
        $categories = Category::all(); // Assuming you have a `Category` model

        // Pass the products, categories, and filter values to the view
        return view('ecommerce.shop-grid', compact('products', 'sort', 'categories', 'categoryId'));
    }
}
