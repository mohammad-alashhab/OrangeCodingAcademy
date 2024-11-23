<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ open: false, product: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filter Section -->
            <div class="mb-4 flex justify-between items-center">
                <form method="GET" action="{{ route('products.index') }}" class="flex items-center gap-4">
                    <!-- Search Input -->
                    <input type="text" name="search" placeholder="Search products..."
                        class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value="{{ request('search') }}">

                    <!-- Brand Dropdown -->
                    <select name="brand" class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select Brand</option>
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->name }}" {{ request('brand') == $brand->name ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                        @endforeach
                    </select>

                    <!-- Category Dropdown -->
                    <select name="category" class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->name }}" {{ request('category') == $category->name ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>

                    <!-- Submit Button -->
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Filter
                    </button>
                </form>

                <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add New Product
                </a>
            </div>

            <!-- Product Table -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table-auto w-full text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Category</th>
                            <th class="px-4 py-2">Brand</th>
                            <th class="px-4 py-2">Description</th>
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
                            <td class="border px-4 py-2">{{ $product->description }}</td>
                            <td class="border px-4 py-2">${{ $product->price }}</td>
                            <td class="border px-4 py-2">{{ $product->stock }}</td>
                            <td class="border px-4 py-2">
                                <button @click="open = true; product = {{ $product->toJson() }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">View</button>
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">No products found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>

        <!-- Product Modal -->
        <div x-show="open" @click.away="open = false" x-transition
            class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center z-50">
            <div class="bg-white p-6 rounded-lg max-w-lg w-full">
                <h2 class="text-xl font-bold mb-4" x-text="product.name"></h2>
                <p class="mb-4" x-text="product.description"></p>
                <p class="mb-4">Price: $<span x-text="product.price"></span></p>
                <p class="mb-4">Stock: <span x-text="product.stock"></span></p>
                <p class="mb-4">Category: <span x-text="product.category?.name ?? 'N/A'"></span></p>
                <p class="mb-4">Brand: <span x-text="product.brand?.name ?? 'N/A'"></span></p>

                <!-- Image Slider -->
                <div x-data="{ currentImage: 0, images: product.images.map(img => img.front_view || img.side_view || img.back_view) }">
                    <div class="relative">
                        <template x-for="(image, index) in images" :key="index">
                            <div x-show="currentImage === index">
                                <img :src="image" alt="Product Image" class="w-full h-64 object-cover rounded-lg mb-4">
                            </div>
                        </template>

                        <!-- Slider Controls -->
                        <button @click="currentImage = (currentImage - 1 + images.length) % images.length"
                            class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-gray-600 text-white p-2 rounded-full">
                            &#8592;
                        </button>
                        <button @click="currentImage = (currentImage + 1) % images.length"
                            class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-gray-600 text-white p-2 rounded-full">
                            &#8594;
                        </button>
                    </div>
                </div>

                <div class="mt-4 flex justify-end">
                    <button @click="open = false" class="bg-red-500 text-white py-2 px-4 rounded">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>