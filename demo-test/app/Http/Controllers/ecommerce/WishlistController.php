<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        // Fetch the authenticated user's wishlist items with product details
        $wishlistItems = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $brands = Brand::all();

        return view('ecommerce.wishlist', compact('wishlistItems', 'brands'));
    }

    public function add($product_id)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to your wishlist.');
        }

        // Check if the product is already in the user's wishlist
        $existingWishlistItem = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product_id)
            ->first();

        if ($existingWishlistItem) {
            return redirect()->back()->with('error', 'Product is already in your wishlist.');
        }

        // Add the product to the wishlist
        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $product_id,
        ]);

        return redirect()->back()->with('success', 'Product added to wishlist.');
    }

    public function remove($product_id)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to remove items from your wishlist.');
        }

        // Find the wishlist item for the authenticated user and the given product
        $wishlistItem = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product_id)
            ->first();

        if ($wishlistItem) {
            // Delete the wishlist item
            $wishlistItem->delete();
            return redirect()->back()->with('success', 'Product removed from wishlist.');
        }

        return redirect()->back()->with('error', 'Product is not in your wishlist.');
    }

    public function destroy(Wishlist $wishlist)
    {
        // Ensure the user can only delete their own wishlist items
        if ($wishlist->user_id === Auth::id()) {
            $wishlist->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'You are not authorized to delete this item.'], 403);
    }

    /**
     * Get the wishlist count for the authenticated user.
     */
    public static function getWishlistCount()
    {
        if (Auth::check()) {
            return Wishlist::where('user_id', Auth::id())->count();
        }
        return 0;
    }
}
