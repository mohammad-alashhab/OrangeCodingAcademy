<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Order Details -->
                    <h3 class="text-lg font-semibold mb-4">Order Information</h3>
                    <div class="mb-4">
                        <p><strong>ID:</strong> {{ $order->id }}</p>
                        <p><strong>User:</strong> {{ $order->user->name ?? 'N/A' }}</p>
                        <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
                        <p><strong>Status:</strong> {{ $order->status->name ?? 'N/A' }}</p>
                        <p><strong>Approval:</strong> {{ $order->is_approved ? 'Approved' : 'Disapproved' }}</p>
                        <p><strong>Created At:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>
                    </div>

                    <!-- Shipping and Billing Address -->
                    <h3 class="text-lg font-semibold mb-4">Addresses</h3>
                    <div class="mb-4">
                        <p><strong>Shipping Address:</strong> {{ $order->shippingAddress->full_address ?? 'N/A' }}</p>
                        <p><strong>Billing Address:</strong> {{ $order->billingAddress->full_address ?? 'N/A' }}</p>
                    </div>

                    <!-- Order Items -->
                    <h3 class="text-lg font-semibold mb-4">Order Items</h3>
                    <table class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">Product</th>
                                <th class="border px-4 py-2">Quantity</th>
                                <th class="border px-4 py-2">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($order->items as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item->product->name ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">{{ $item->quantity }}</td>
                                <td class="border px-4 py-2">${{ number_format($item->price, 2) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center border px-4 py-2">No items found for this order.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Update Status -->
                    <h3 class="text-lg font-semibold mb-4 mt-6">Update Status</h3>
                    <form method="POST" action="{{ route('orders.updateStatus', $order->id) }}">
                        @csrf
                        @method('POST')
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Order Status</label>
                            <select
                                id="status"
                                name="status_id"
                                class="border rounded-md px-4 py-2"
                                {{ in_array($order->status->name, ['completed', 'canceled']) ? 'disabled' : '' }}>
                                @foreach($statuses as $status)
                                <option value="{{ $status->id }}" {{ $order->status_id == $status->id ? 'selected' : '' }}>
                                    {{ ucfirst($status->name) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @if(!in_array($order->status->name, ['completed', 'canceled']))
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Status</button>
                        @else
                        <p class="text-red-500 text-sm">You cannot change the status of a completed or canceled order.</p>
                        @endif
                    </form>

                    <!-- Toggle Approval -->
                    <h3 class="text-lg font-semibold mb-4 mt-6">Approval</h3>
                    <form method="POST" action="{{ route('orders.toggleApproval', $order->id) }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="is_approved" value="{{ $order->is_approved ? 0 : 1 }}">
                        <button type="submit" class="px-4 py-2 rounded-md {{ $order->is_approved ? 'bg-red-500 text-white' : 'bg-green-500 text-white' }}">
                            {{ $order->is_approved ? 'Disapprove' : 'Approve' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>