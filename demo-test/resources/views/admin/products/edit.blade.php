<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Product Name</label>
                        <input type="text" name="name" id="name"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                            value="{{ old('name', $product->name) }}" required>
                        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description</label>
                        <textarea name="description" id="description"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">{{ old('description', $product->description) }}</textarea>
                        @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Category Dropdown -->
                    <div class="mb-4">
                        <label for="category_id" class="block text-gray-700">Category</label>
                        <select name="category_id" id="category_id"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" required>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
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
                            <option value="{{ $brand->id }}"
                                {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('brand_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-gray-700">Price</label>

                        <!-- If discount is active, disable price field but send the value as hidden input -->
                        @if($activeDiscount)
                        <input type="number" name="price" id="price"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                            value="{{ old('price', $product->price) }}" disabled>

                        <!-- Hidden price field to pass the value -->
                        <input type="hidden" name="price" value="{{ old('price', $product->price) }}">

                        <small class="text-gray-500">Price is locked due to active discount. Cancel discount to adjust.</small>
                        @else
                        <input type="number" name="price" id="price"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                            value="{{ old('price', $product->price) }}" required>
                        @endif

                        @error('price')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="stock" class="block text-gray-700">Stock</label>

                        @if($activeDiscount)
                        <input type="number" name="stock" id="stock"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                            value="{{ old('stock', $product->stock) }}" disabled>

                        <!-- Hidden stock field to pass the value -->
                        <input type="hidden" name="stock" value="{{ old('stock', $product->stock) }}">

                        <small class="text-gray-500">Stock is locked due to active discount. Cancel discount to adjust.</small>
                        @else
                        <input type="number" name="stock" id="stock"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                            value="{{ old('stock', $product->stock) }}" required>
                        @endif

                        @error('stock')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="front_img" class="block text-gray-700">Front Image</label>
                        @if ($product->front_img)
                        <img src="{{ asset('storage/' . $product->front_img) }}" alt="Front Image" class="w-20 h-20 mb-2">
                        @endif
                        <input type="file" name="front_img" id="front_img" class="w-full">
                        @error('front_img') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="back_img" class="block text-gray-700">Back Image</label>
                        @if ($product->back_img)
                        <img src="{{ asset('storage/' . $product->back_img) }}" alt="Back Image" class="w-20 h-20 mb-2">
                        @endif
                        <input type="file" name="back_img" id="back_img" class="w-full">
                        @error('back_img') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="side_img" class="block text-gray-700">Side Image</label>
                        @if ($product->side_img)
                        <img src="{{ asset('storage/' . $product->side_img) }}" alt="Side Image" class="w-20 h-20 mb-2">
                        @endif
                        <input type="file" name="side_img" id="side_img" class="w-full">
                        @error('side_img') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Update Product
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-admin-app-layout>