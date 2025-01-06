<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // Display all coupons
    public function index(Request $request)
    {
        $search = $request->input('search');

        $coupons = Coupon::query()
            ->when($search, function ($query) use ($search) {
                $query->where('code', 'like', "%{$search}%");
            })
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('admin.coupons.index', compact('coupons'));
    }

    // Show form to create a new coupon
    public function create()
    {
        return view('admin.coupons.create');
    }

    // Store a new coupon in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:coupons',
            'discount_percentage' => 'required|integer|min:1|max:100',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after_or_equal:valid_from',
            'min_order_value' => 'nullable|numeric|min:0',
            'max_discount' => 'nullable|numeric|min:0',
        ]);

        Coupon::create($validated);

        return redirect()->route('coupons.index')->with('success', 'Coupon created successfully!');
    }

    // Show form to edit a coupon
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit', compact('coupon'));
    }

    // Update a coupon in the database
    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:coupons,code,' . $coupon->id,
            'discount_percentage' => 'required|integer|min:1|max:100',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after_or_equal:valid_from',
            'min_order_value' => 'nullable|numeric|min:0',
            'max_discount' => 'nullable|numeric|min:0',
        ]);

        $coupon->update($validated);

        return redirect()->route('coupons.index')->with('success', 'Coupon updated successfully!');
    }

    // Delete a coupon
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return redirect()->route('coupons.index')->with('success', 'Coupon deleted successfully!');
    }
}
