<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    // Display all discounts
    public function index()
    {
        $discounts = Discount::with('product')->paginate(10);
        return view('admin.discounts.index', compact('discounts'));
    }

    // Show form to create a new discount
    public function create()
    {
        $products = Product::all();
        return view('admin.discounts.create', compact('products'));
    }

    // Store a new discount
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'newprice' => 'required|numeric|min:0',
            'startdate' => 'required|date|before_or_equal:enddate',
            'enddate' => 'required|date|after_or_equal:startdate',
            'is_active' => 'nullable|boolean',
        ]);

        $discount = Discount::create([
            'product_id' => $validated['product_id'],
            'newprice' => $validated['newprice'],
            'startdate' => $validated['startdate'],
            'enddate' => $validated['enddate'],
            'is_active' => $validated['is_active'] ?? true,  // Default to active if not provided
        ]);

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully!');
    }

    // Show form to edit an existing discount
    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        $products = Product::all();
        return view('admin.discounts.edit', compact('discount', 'products'));
    }

    // Update an existing discount
    public function update(Request $request, $id)
    {
        $discount = Discount::findOrFail($id);

        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'newprice' => 'required|numeric|min:0',
            'startdate' => 'required|date|before_or_equal:enddate',
            'enddate' => 'required|date|after_or_equal:startdate',
            'is_active' => 'nullable|boolean',
        ]);

        $discount->update([
            'product_id' => $validated['product_id'],
            'newprice' => $validated['newprice'],
            'startdate' => $validated['startdate'],
            'enddate' => $validated['enddate'],
            'is_active' => $validated['is_active'] ?? $discount->is_active,  // Maintain the previous value if not provided
        ]);

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully!');
    }

    // Delete a discount
    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully!');
    }

    // Toggle the active status of a discount
    public function toggleStatus($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->update(['is_active' => !$discount->is_active]);

        return redirect()->route('discounts.index')->with('success', 'Discount status updated successfully!');
    }
}
