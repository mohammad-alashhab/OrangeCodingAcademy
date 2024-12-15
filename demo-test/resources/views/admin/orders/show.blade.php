<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-lg shadow-lg p-6 text-white">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold">Order #{{ $order->id }}</h2>
                    <p class="text-sm opacity-80">{{ $order->created_at->format('F d, Y h:i A') }}</p>
                </div>
                <div class="flex items-center gap-3">
                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 8H4C3.45 8 3 7.55 3 7C3 6.45 3.45 6 4 6H20C20.55 6 21 6.45 21 7C21 7.55 20.55 8 20 8ZM20 18H4C3.45 18 3 17.55 3 17C3 16.45 3.45 16 4 16H20C20.55 16 21 16.45 21 17C21 17.55 20.55 18 20 18ZM4 13H20C20.55 13 21 12.55 21 12C21 11.45 20.55 11 20 11H4C3.45 11 3 11.45 3 12C3 12.55 3.45 13 4 13Z" fill="white" />
                    </svg>
                    <div class="bg-white/20 rounded-full px-4 py-2 flex items-center gap-2">
                        @if($order->status->name === 'pending')
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" />
                            <path d="M12 7v5l3 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        @elseif($order->status->name === 'shipped')
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                            <path d="M3 9h18v11a1 1 0 01-1 1h-16a1 1 0 01-1-1V9z" stroke="currentColor" stroke-width="2" />
                            <path d="M7 9V5a1 1 0 011-1h8a1 1 0 011 1v4" stroke="currentColor" stroke-width="2" />
                        </svg>
                        @else
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                            <path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        @endif
                        <span class="font-medium">{{ ucfirst($order->status->name) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Customer Details -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-500" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="7" r="5" stroke="currentColor" stroke-width="2" />
                                <path d="M20 21a8 8 0 00-16 0" stroke="currentColor" stroke-width="2" />
                            </svg>
                            Customer Information
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" viewBox="0 0 24 24" fill="none">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" stroke="currentColor" stroke-width="2" />
                                    <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2" />
                                </svg>
                                <p>{{ $order->user->name }}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" viewBox="0 0 24 24" fill="none">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2" />
                                    <path d="M22 6l-10 7L2 6" stroke="currentColor" stroke-width="2" />
                                </svg>
                                <p>{{ $order->user->email }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Address -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-500" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="currentColor" stroke-width="2" />
                            </svg>
                            Shipping Address
                        </h3>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-600">{{ $order->shippingAddress->full_address }}</p>
                        </div>
                        <h3 class="text-lg font-semibold mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 3h18v7H3z" /> <!-- Enclosing box -->
                                <path d="M21 10v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V10" /> <!-- Lower part for additional detail -->
                                <line x1="3" y1="7" x2="21" y2="7" /> <!-- Divider -->
                                <circle cx="12" cy="16" r="3" /> <!-- Circle for billing -->
                            </svg>

                            Billing Address
                        </h3>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-600">{{ $order->shippingAddress->full_address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Payment Summary -->
                    <div class="bg-gradient-to-br from-violet-500 to-purple-500 rounded-lg shadow-lg p-6 text-white">
                        <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <rect x="2" y="4" width="20" height="16" rx="2" stroke="currentColor" stroke-width="2" />
                                <path d="M2 10h20" stroke="currentColor" stroke-width="2" />
                            </svg>
                            Payment Summary
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span>Subtotal</span>
                                <span>${{ number_format($order->total_price - ($order->total_price * 0.1), 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span>Tax (10%)</span>
                                <span>${{ number_format($order->total_price * 0.1, 2) }}</span>
                            </div>
                            <div class="h-px bg-white/20 my-2"></div>
                            <div class="flex justify-between items-center text-lg font-bold">
                                <span>Total</span>
                                <span>${{ number_format($order->total_price, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Status Update -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-lg font-semibold mb-4">Update Status</h3>
                        <form method="POST" action="{{ route('orders.updateStatus', $order->id) }}" class="space-y-4">
                            @csrf
                            @method('POST')
                            <div>
                                <select name="status_id" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" {{ in_array($order->status->name, ['completed', 'canceled']) ? 'disabled' : '' }}>
                                    @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ $order->status_id == $status->id ? 'selected' : '' }}>
                                        {{ ucfirst($status->name) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @if(!in_array($order->status->name, ['completed', 'canceled']))
                            <button type="submit" class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                                Update Status
                            </button>
                            @else
                            <p class="text-red-500 text-sm">Status cannot be changed for completed or canceled orders.</p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="mt-6 bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Order Items</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($order->items as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" fill="none">
                                                <rect x="4" y="4" width="16" height="16" rx="2" stroke="currentColor" stroke-width="2" />
                                                <path d="M12 8v8M8 12h8" stroke="currentColor" stroke-width="2" />
                                            </svg>
                                            <img src="{{ asset('storage/' .  $item->product->images->front_img) }}" alt="{{ $item->product->images->front_img }}" class="w-16 h-16">
                                        </div>
                                        <span class="font-medium">{{ $item->product->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">{{ $item->quantity }}</td>
                                <td class="px-6 py-4">${{ number_format($item->price, 2) }}</td>
                                <td class="px-6 py-4">${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No items found for this order.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>