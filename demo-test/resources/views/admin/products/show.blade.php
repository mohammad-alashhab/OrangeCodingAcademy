<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Product Information -->
                    <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
                    <p class="mb-4"><strong>Description:</strong> {{ $product->description }}</p>
                    <p class="mb-4"><strong>Price:</strong> ${{ $product->price }}</p>
                    <p class="mb-4"><strong>Stock:</strong> {{ $product->stock }}</p>
                    <p class="mb-4"><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
                    <p class="mb-4"><strong>Brand:</strong> {{ $product->brand->name ?? 'N/A' }}</p>

                    <!-- Image Slider -->
                    <div x-data="{ currentImage: 0, images: ['{{ asset('storage/' . $product->images->front_img) }}', '{{ asset('storage/' . $product->images->side_img) }}', '{{ asset('storage/' . $product->images->back_img) }}'].filter(i => i) }">
                        <div x-show="images.length > 0">
                            <img
                                :src="images[currentImage]"
                                alt="Product Image"
                                class="w-full h-64 object-cover rounded-lg mb-4">
                            <div class="flex justify-between items-center mt-4">
                                <button
                                    @click="currentImage = (currentImage - 1 + images.length) % images.length"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-1 px-4 rounded">
                                    Previous
                                </button>
                                <span x-text="`${currentImage + 1} / ${images.length}`"></span>
                                <button
                                    @click="currentImage = (currentImage + 1) % images.length"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-1 px-4 rounded">
                                    Next
                                </button>
                            </div>
                        </div>
                        <p x-show="images.length === 0" class="text-gray-500 italic">No images available</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>