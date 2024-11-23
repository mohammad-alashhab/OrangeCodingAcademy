<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Product Name</label>
                        <input type="text" name="name" id="name"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                            value="{{ old('name') }}" required>
                        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description</label>
                        <textarea name="description" id="description"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">{{ old('description') }}</textarea>
                        @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Category Dropdown -->
                    <div class="mb-4">
                        <label for="category_id" class="block text-gray-700">Category</label>
                        <select name="category_id" id="category_id"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" required>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Brand Dropdown -->
                    <div class="mb-4">
                        <label for="brand_id" class="block text-gray-700">Brand</label>
                        <select name="brand_id" id="brand_id"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" required>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('brand_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-gray-700">Price</label>
                        <input type="number" name="price" id="price"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                            value="{{ old('price') }}" required>
                        @error('price') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="stock" class="block text-gray-700">Stock</label>
                        <input type="number" name="stock" id="stock"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                            value="{{ old('stock') }}" required>
                        @error('stock') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="front_img" class="block text-gray-700">Front Image</label>
                        <input type="file" name="front_img" id="front_img" class="w-full">
                    </div>

                    <div class="mb-4">
                        <label for="back_img" class="block text-gray-700">Back Image</label>
                        <input type="file" name="back_img" id="back_img" class="w-full">
                    </div>

                    <div class="mb-4">
                        <label for="side_img" class="block text-gray-700">Side Image</label>
                        <input type="file" name="side_img" id="side_img" class="w-full">
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create Product
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>