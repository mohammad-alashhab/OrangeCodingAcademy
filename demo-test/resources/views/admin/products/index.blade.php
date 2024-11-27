<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ open: false, product: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filter Section -->
            <div class="mb-4 flex flex-wrap justify-between items-center gap-4">
                <form method="GET" action="{{ route('products.index') }}" class="flex flex-wrap gap-4 items-center">
                    <!-- Search Input -->
                    <input
                        type="text"
                        name="search"
                        placeholder="Search products..."
                        class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value="{{ request('search') }}">

                    <!-- Brand Dropdown -->
                    <select
                        name="brand"
                        class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select Brand</option>
                        @foreach ($brands as $brand)
                        <option
                            value="{{ $brand->name }}"
                            {{ request('brand') == $brand->name ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                        @endforeach
                    </select>

                    <!-- Category Dropdown -->
                    <select
                        name="category"
                        class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                        <option
                            value="{{ $category->name }}"
                            {{ request('category') == $category->name ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Filter
                    </button>
                </form>

                <!-- Add Product Button -->
                <a
                    href="{{ route('products.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add New Product
                </a>
            </div>

            <!-- Product Table -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="table-auto w-full text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Category</th>
                            <th class="px-4 py-2">Brand</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Stock</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td class="border px-4 py-2">{{ $product->id }}</td>
                            <td class="border px-4 py-2">{{ $product->name }}</td>
                            <td class="border px-4 py-2">{{ $product->category->name ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">{{ $product->brand->name ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">${{ number_format($product->price, 2) }}</td>
                            <td class="border px-4 py-2">{{ $product->stock }}</td>
                            <td class="border px-4 py-2">
                                <a
                                    href="{{ route('products.show', $product->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                    View
                                </a>
                                <a
                                    href="{{ route('products.edit', $product->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                                    Edit
                                </a>
                                <form
                                    action="{{ route('products.destroy', $product->id) }}"
                                    method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                                        onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">No products found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>