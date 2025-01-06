<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Fetch the authenticated user's cart items with product details
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $brands = Brand::all();

        return view('ecommerce.cart', compact('cartItems', 'brands'));
    }

    public function add($product_id)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to your cart.');
        }

        // Check if the product is already in the user's cart
        $existingCartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product_id)
            ->first();

        if ($existingCartItem) {
            // Increment the quantity if the product is already in the cart
            $existingCartItem->increment('quantity');
            return redirect()->back()->with('success', 'Product quantity updated in your cart.');
        }

        // Add the product to the cart
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product_id,
            'quantity' => 1, // Default quantity
        ]);

        return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function remove($product_id)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to remove items from your cart.');
        }

        // Find the cart item for the authenticated user and the given product
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product_id)
            ->first();

        if ($cartItem) {
            // Delete the cart item
            $cartItem->delete();
            return redirect()->back()->with('success', 'Product removed from cart.');
        }

        return redirect()->back()->with('error', 'Product is not in your cart.');
    }

    public function destroy(Cart $cart)
    {
        // Ensure the user can only delete their own cart items
        if ($cart->user_id === Auth::id()) {
            $cart->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'You are not authorized to delete this item.'], 403);
    }

    /**
     * Get the cart count for the authenticated user.
     */
    public static function getCartCount()
    {
        if (Auth::check()) {
            return Cart::where('user_id', Auth::id())->count();
        }
        return 0;
    }

    public function checkout()
    {
        return view('ecommerce.checkout');
    }
}
