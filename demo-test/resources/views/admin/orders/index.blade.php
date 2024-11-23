<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Filters -->
                    <form method="GET" action="{{ route('orders.index') }}" class="mb-4">
                        <div class="flex items-center space-x-4">
                            <input type="text" name="search" placeholder="Search by user/email" value="{{ request('search') }}" class="border rounded-md px-4 py-2">
                            <select name="status" class="border rounded-md px-4 py-2">
                                <option value="">All Statuses</option>
                                @foreach($statuses as $status)
                                <option value="{{ $status->name }}" {{ request('status') == $status->name ? 'selected' : '' }}>
                                    {{ ucfirst($status->name) }}
                                </option>
                                @endforeach
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Filter</button>
                        </div>
                    </form>

                    <!-- Orders Table -->
                    <table class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">User</th>
                                <th class="border px-4 py-2">Total Price</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Approved</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                            <tr>
                                <td class="border px-4 py-2">{{ $order->id }}</td>
                                <td class="border px-4 py-2">{{ $order->user->name ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">${{ number_format($order->total_price, 2) }}</td>
                                <td class="border px-4 py-2">{{ $order->status->name ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">
                                    {{ $order->is_approved ? 'Approved' : 'Disapproved' }}
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('orders.show', $order->id) }}" class="text-blue-500">View</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center border px-4 py-2">No orders found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>