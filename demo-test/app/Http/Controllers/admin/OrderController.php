<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Status;
use App\Models\Coupon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // List all orders with filters
    public function index(Request $request)
    {
        $status = $request->input('status'); // Optional status filter
        $search = $request->input('search'); // Optional search by user name/email

        // Fetch orders with optional filters
        $orders = Order::query()
        ->when($status, function ($query) use ($status) {
            $query->whereHas('status', function ($statusQuery) use ($status) {
                $statusQuery->where('name', $status);
            });
        })
        ->when($search, function ($query) use ($search) {
            $query->whereHas('user', function ($userQuery) use ($search) {
                $userQuery->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            });
        })
        ->orderBy('id', 'asc')
        ->with(['user', 'status', 'items.product'])
        ->paginate(10);

        // Fetch statuses as objects
        $statuses = Status::where('type', 'order')->get();

        return view('admin.orders.index', compact('orders', 'statuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'shipping_address_id' => 'required|exists:addresses,id',
            'billing_address_id' => 'required|exists:addresses,id',
            'coupon_code' => 'nullable|string|exists:coupons,code',
        ]);

        // Start transaction
        DB::beginTransaction();

        try {
            $coupon = null;
            $discountAmount = 0;

            // Create the order first
            $order = Order::create([
                'user_id' => $validated['user_id'],
                'status_id' => $validated['status_id'],
                'shipping_address_id' => $validated['shipping_address_id'],
                'billing_address_id' => $validated['billing_address_id'],
                'coupon_id' => null, // Will update later if coupon is valid
                // 'is_approved' => false,
            ]);

            // Calculate total price of the order items
            $orderTotal = OrderItem::where('order_id', $order->id)->sum(DB::raw('quantity * price'));

            // Check if a valid coupon is applied
            if (!empty($validated['coupon_code'])) {
                $coupon = Coupon::where('code', $validated['coupon_code'])
                ->whereDate('valid_from', '<=', now())
                ->whereDate('valid_until', '>=', now())
                ->firstOrFail();

                if ($orderTotal >= $coupon->min_order_value) {
                    $discountAmount = $orderTotal * ($coupon->discount_percentage / 100);
                    if ($coupon->max_discount) {
                        $discountAmount = min($discountAmount, $coupon->max_discount);
                    }

                    // Update the order with the coupon ID
                    $order->update(['coupon_id' => $coupon->id]);
                } else {
                    return back()->withErrors(['coupon_code' => 'Order total does not meet the minimum order value for this coupon.']);
                }
            }

            // Apply discount to the total price
            $order->update(['total_price' => $orderTotal - $discountAmount]);

            DB::commit();

            return redirect()->route('orders.index')->with('success', 'Order created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    // View a specific order
    public function show($id)
    {
        $order = Order::with(['user', 'status', 'items.product', 'shippingAddress', 'billingAddress'])->findOrFail($id);
        $statuses = Status::where('type', 'order')->get();

        return view('admin.orders.show', compact('order', 'statuses'));
    }


    // Approve or disapprove an order
    // public function toggleApproval(Request $request, Order $order)
    // {
    //     $order->update([
    //         'is_approved' => $request->input('is_approved', $order->is_approved), // Toggle between 1 (approved) and 0 (disapproved)
    //     ]);

    //     return redirect()->route('orders.index')->with('success', 'Order approval status updated!');
    // }

    // Update order status
    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Order status updated!');
    }
}
