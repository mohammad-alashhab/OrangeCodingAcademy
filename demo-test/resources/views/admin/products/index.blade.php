<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-gradient-to-r from-indigo-600 to-purple-700 dark:from-indigo-800 dark:to-purple-900 p-4 rounded-lg shadow-lg">
            <div class="flex items-center space-x-4">
                <div class="bg-white/20 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-white">{{ __('Products Management') }}</h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-3">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg overflow-hidden">
                <!-- Search and Filter Section -->
                <div class="bg-gray-100 dark:bg-gray-700 p-6 flex items-center space-x-4">
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('products.index') }}" class="flex-grow">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input
                                type="text"
                                name="search"
                                placeholder="Search products..."
                                value="{{ request('search') }}"
                                class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:bg-gray-600 dark:border-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 transition"
                                onkeypress="if(event.keyCode === 13) this.form.submit();">
                        </div>
                    </form>

                    <!-- Add Product Button -->
                    <a href="{{ route('products.create') }}"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Add Product</span>
                    </a>
                </div>

                <!-- Products Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 dark:bg-gray-700 border-b dark:border-gray-600">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Brand</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Stock</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y dark:divide-gray-700">
                            @forelse($products as $product)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    #{{ $product->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                    {{ $product->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $product->category->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $product->brand->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    ${{ number_format($product->price, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="
        px-3 py-1 inline-flex text-xs leading-5 
        font-semibold rounded-full 
        w-16 h-6 justify-center items-center
        @if($product->stock <= 10) bg-red-100 text-red-800 dark:bg-red-700 dark:text-white
        @elseif($product->stock <= 25) bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-white
        @elseif($product->stock <= 50) bg-blue-100 text-blue-800 dark:bg-blue-700 dark:text-white
        @else bg-green-100 text-green-800 dark:bg-green-700 dark:text-white
        @endif
    ">
                                        {{ $product->stock }}
                                    </span>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('products.show', $product->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 flex items-center space-x-1">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <span>View</span>
                                        </a>

                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300 flex items-center space-x-1">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            <span>Edit</span>
                                        </a>

                                        <form
                                            action="{{ route('products.destroy', $product->id) }}"
                                            method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 flex items-center space-x-1">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <svg class="w-16 h-16 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-lg">No products found</p>
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
                        {{ $products->links('pagination::simple-tailwind') }}
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700 dark:text-gray-300">
                                Showing
                                <span class="font-medium">{{ $products->firstItem() }}</span>
                                to
                                <span class="font-medium">{{ $products->lastItem() }}</span>
                                of
                                <span class="font-medium">{{ $products->total() }}</span>
                                results
                            </p>
                        </div>
                        {{ $products->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>