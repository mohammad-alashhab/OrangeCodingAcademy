<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    // Display all discounts
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Fetch the discounts, along with their related products
        $discounts = Discount::query()
        ->with('product')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('product', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            })
            ->paginate(10);

        // Check if any discount has expired and update its status
        foreach ($discounts as $discount) {
            if (now()->greaterThanOrEqualTo($discount->enddate) && $discount->is_active) {
                $discount->update(['is_active' => false]);  // Automatically deactivate expired discounts
            }
        }

        return view('admin.discounts.index', compact('discounts'));
    }


    // Show form to create a new discount
    public function create()
    {
        $products = Product::all(); // Fetch all products for the dropdown
        return view('admin.discounts.create', compact('products'));
    }

    // Store a new discount
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'percentage' => 'required|numeric|min:0|max:100',
            'startdate' => 'required|date|before_or_equal:enddate',
            'enddate' => 'required|date|after_or_equal:startdate',
            'is_active' => 'boolean',
        ]);

        $discount = Discount::create($validated);

        // Calculate the discounted price
        $product = $discount->product; // Get related product
        $discountedPrice = $product->price - ($product->price * ($discount->percentage / 100));

        // Update product price
        $product->update(['price' => $discountedPrice]);

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully!');
    }


    // Show form to edit a discount
    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        $products = Product::all(); // Fetch all products for the dropdown

        return view('admin.discounts.edit', compact('discount', 'products'));
    }

    // Update a discount
    public function update(Request $request, $id)
    {
        $discount = Discount::findOrFail($id);

        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'percentage' => 'required|numeric|min:0|max:100',
            'startdate' => 'required|date|before_or_equal:enddate',
            'enddate' => 'required|date|after_or_equal:startdate',
            'is_active' => 'boolean',
        ]);

        $product = $discount->product; // Get the associated product

        // Check if original price exists; if not, store the current price as the original
        if (!$product->original_price) {
            $product->original_price = $product->price; // Assume `original_price` is a column in `products` table
            $product->save();
        }

        // Revert the product price to the original price
        $product->price = $product->original_price;
        $product->save();

        // Recalculate the new discounted price
        $discountedPrice = $product->original_price - ($product->original_price * ($validated['percentage'] / 100));

        // Update the discount and product price
        $discount->update($validated);
        $product->update(['price' => $discountedPrice]);

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully!');
    }



    // Delete a discount
    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $product = $discount->product;

        // Restore original price
        $originalPrice = $product->price / (1 - ($discount->percentage / 100));
        $product->update(['price' => $originalPrice]);

        $discount->delete();

        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully!');
    }


    // Toggle discount status (activate/deactivate)
    public function toggleStatus($id)
    {
        $discount = Discount::findOrFail($id);
        $product = $discount->product;

        // Check if the discount has expired
        if (now()->greaterThanOrEqualTo($discount->enddate)) {
            // If the discount is expired, don't allow it to be activated
            return redirect()->route('discounts.index')
            ->with('error', 'This discount has expired and cannot be reactivated.');
        }

        // Proceed to toggle the discount status
        if ($discount->is_active) {
            // Restore original price
            $originalPrice = $product->price / (1 - ($discount->percentage / 100));
            $product->update(['price' => $originalPrice]);
        } else {
            // Apply discounted price
            $discountedPrice = $product->price - ($product->price * ($discount->percentage / 100));
            $product->update(['price' => $discountedPrice]);
        }

        // Toggle the discount status
        $discount->update(['is_active' => !$discount->is_active]);

        return redirect()->route('discounts.index')->with('success', 'Discount status updated successfully!');
    }




    // Show a single discount details
    public function show($id)
    {
        $discount = Discount::with('product')->findOrFail($id);
        return view('admin.discounts.show', compact('discount'));
    }
}
