<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Status;
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



    // View a specific order
    public function show($id)
    {
        $order = Order::with(['user', 'status', 'items.product', 'shippingAddress', 'billingAddress'])->findOrFail($id);
        $statuses = Status::where('type', 'order')->get();

        return view('admin.orders.show', compact('order', 'statuses'));
    }


    // Approve or disapprove an order
    public function toggleApproval(Request $request, Order $order)
    {
        $order->update([
            'is_approved' => $request->input('is_approved', $order->is_approved), // Toggle between 1 (approved) and 0 (disapproved)
        ]);

        return redirect()->route('orders.index')->with('success', 'Order approval status updated!');
    }

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
