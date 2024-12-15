<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-gradient-to-r from-indigo-600 to-purple-700 dark:from-indigo-800 dark:to-purple-900 p-4 rounded-lg shadow-lg">
            <div class="flex items-center space-x-4">
                <div class="bg-white/20 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-white">{{ __('Orders Management') }}</h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg overflow-hidden">
                <!-- Search and Filter Section -->
                <div class="bg-gray-100 dark:bg-gray-700 p-6 flex items-center space-x-4">
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('orders.index') }}" class="flex-grow">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input
                                type="text"
                                name="search"
                                placeholder="Search orders..."
                                value="{{ request('search') }}"
                                class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:bg-gray-600 dark:border-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 transition"
                                onkeypress="if(event.keyCode === 13) this.form.submit();">
                        </div>
                    </form>

                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('orders.index') }}" class="flex space-x-4">
                        <select
                            name="status"
                            class="rounded-lg border border-gray-300 dark:bg-gray-600 dark:border-gray-700 dark:text-white py-2 focus:ring-2 focus:ring-blue-500">
                            <option value="">All Statuses</option>
                            @foreach($statuses as $status)
                            <option
                                value="{{ $status->name }}"
                                {{ request('status') == $status->name ? 'selected' : '' }}>
                                {{ ucfirst($status->name) }}
                            </option>
                            @endforeach
                        </select>

                        <!-- <select
                            name="approved"
                            class="rounded-lg border border-gray-300 dark:bg-gray-600 dark:border-gray-700 dark:text-white px-4 py-2 focus:ring-2 focus:ring-blue-500">
                            <option value="">Approval Status</option>
                            <option value="1" {{ request('approved') == '1' ? 'selected' : '' }}>Approved</option>
                            <option value="0" {{ request('approved') == '0' ? 'selected' : '' }}>Not Approved</option>
                        </select> -->

                        <button
                            type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            <span>Apply Filters</span>
                        </button>
                    </form>
                </div>

                <!-- Orders Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 dark:bg-gray-700 border-b dark:border-gray-600">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Order ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Total Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <!-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Approved</th> -->
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y dark:divide-gray-700">
                            @forelse($orders as $order)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    #{{ $order->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $order->user->name ?? 'N/A' }}
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                                {{ $order->user->email ?? '' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    ${{ number_format($order->total_price, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="
                                        px-3 py-1 inline-flex text-xs leading-5 
                                        font-semibold rounded-full 
                                        @if($order->status->name == 'completed') bg-green-100 text-green-800 dark:bg-green-700 dark:text-white
                                        @elseif($order->status->name == 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-white
                                        @else bg-red-100 text-red-800 dark:bg-red-700 dark:text-white
                                        @endif
                                    ">
                                        {{ ucfirst($order->status->name) }}
                                    </span>
                                </td>
                                <!-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    <span class="
                                        px-3 py-1 inline-flex text-xs leading-5 
                                        font-semibold rounded-full 
                                        {{ $order->is_approved ? 'bg-green-100 text-green-800 dark:bg-green-700 dark:text-white' : 'bg-red-100 text-red-800 dark:bg-red-700 dark:text-white' }}
                                    ">
                                        {{ $order->is_approved ? 'Approved' : 'Not Approved' }}
                                    </span>
                                </td> -->
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('orders.show', $order->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 flex items-center justify-end space-x-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <span>View Details</span>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <svg class="w-16 h-16 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-lg">No orders found</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="bg-gray-100 dark:bg-gray-700 px-4 py-3 flex items-center justify-between border-t dark:border-gray-600">
                    <div class="flex-1 flex justify-between sm:hidden">
                        {{ $orders->links('pagination::simple-tailwind') }}
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700 dark:text-gray-300">
                                Showing
                                <span class="font-medium">{{ $orders->firstItem() }}</span>
                                to
                                <span class="font-medium">{{ $orders->lastItem() }}</span>
                                of
                                <span class="font-medium">{{ $orders->total() }}</span>
                                results
                            </p>
                        </div>
                        {{ $orders->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>