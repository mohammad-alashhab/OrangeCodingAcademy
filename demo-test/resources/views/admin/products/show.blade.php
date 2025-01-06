<x-admin-app-layout>
    <!-- Add a stylish header with gradient -->
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 -mt-4 -mx-4 px-4 py-6">
            <h2 class="font-bold text-2xl text-white leading-tight flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span>{{ __('Product Details') }}</span>
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl rounded-3xl border border-gray-100">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <!-- Left Column - Enhanced Image Slider -->
                    <div class="relative h-[600px] bg-gradient-to-br from-gray-50 to-gray-100">
                        <div x-data="{ 
                            currentImage: 0,
                            images: ['{{ asset('storage/' . $product->images->front_img) }}', '{{ asset('storage/' . $product->images->side_img) }}', '{{ asset('storage/' . $product->images->back_img) }}'].filter(i => i),
                            autoplay: null,
                            init() {
                                this.autoplay = setInterval(() => {
                                    this.currentImage = (this.currentImage + 1) % this.images.length
                                }, 3000)
                            }
                        }"
                            @mouseenter="clearInterval(autoplay)"
                            @mouseleave="autoplay = setInterval(() => { currentImage = (currentImage + 1) % images.length }, 3000)"
                            class="h-full">
                            <!-- Main Image -->
                            <div class="relative h-full overflow-hidden">
                                <template x-for="(image, index) in images" :key="index">
                                    <div x-show="currentImage === index"
                                        x-transition:enter="transition ease-out duration-500"
                                        x-transition:enter-start="opacity-0 transform scale-95"
                                        x-transition:enter-end="opacity-100 transform scale-100"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100 transform scale-100"
                                        x-transition:leave-end="opacity-0 transform scale-95"
                                        class="absolute inset-0 p-8">
                                        <img :src="image"
                                            class="w-full h-full object-contain rounded-2xl shadow-lg"
                                            alt="Product Image">
                                    </div>
                                </template>
                            </div>

                            <!-- Enhanced Navigation Arrows -->
                            <button @click="currentImage = (currentImage - 1 + images.length) % images.length"
                                class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button @click="currentImage = (currentImage + 1) % images.length"
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            <!-- Progress Bar -->
                            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                <template x-for="(image, index) in images" :key="index">
                                    <button @click="currentImage = index"
                                        :class="{'w-8 bg-blue-600': currentImage === index, 'w-4 bg-gray-300': currentImage !== index}"
                                        class="h-2 rounded-full transition-all duration-300"></button>
                                </template>
                            </div>

                            <!-- Thumbnail Preview -->
                            <div x-show="images.length > 1"
                                class="absolute -right-12 top-1/2 transform -translate-y-1/2 space-y-3">
                                <template x-for="(image, index) in images" :key="index">
                                    <div :class="{'ring-2 ring-blue-500 shadow-lg': currentImage === index}"
                                        @click="currentImage = index"
                                        class="w-16 h-16 rounded-lg overflow-hidden cursor-pointer transition-all duration-300 hover:scale-110">
                                        <img :src="image"
                                            class="w-full h-full object-cover">
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Enhanced Product Information -->
                    <div class="p-12 space-y-8">
                        <div class="space-y-4">
                            <div class="flex items-center space-x-2">
                                <span class="px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full">
                                    {{ $product->category->name ?? 'N/A' }}
                                </span>
                                <span class="px-3 py-1 text-xs font-semibold {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} rounded-full">
                                    {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                </span>
                            </div>
                            <h1 class="text-4xl font-bold text-gray-900">{{ $product->name }}</h1>
                            <div class="flex items-baseline space-x-4">
                                <span class="text-3xl font-bold text-blue-600">${{ $product->price }}</span>
                            </div>
                        </div>

                        <!-- Enhanced Product Details -->
                        <div class="grid grid-cols-2 gap-6">
                            <div class="bg-gray-50 p-6 rounded-2xl hover:shadow-md transition-shadow duration-300">
                                <div class="flex items-center space-x-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                    <p class="font-medium text-gray-900">Brand</p>
                                </div>
                                <p class="text-gray-600">{{ $product->brand->name ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 p-6 rounded-2xl hover:shadow-md transition-shadow duration-300">
                                <div class="flex items-center space-x-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                    <p class="font-medium text-gray-900">Stock Level</p>
                                </div>
                                <p class="text-gray-600">{{ $product->stock }} units</p>
                            </div>
                        </div>

                        <!-- Enhanced Description -->
                        <div class="bg-gray-50 p-8 rounded-2xl space-y-4">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900">Description</h3>
                            </div>
                            <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add custom styles -->
    <style>
        /* Custom scrollbar for thumbnail preview */
        .thumbnail-scroll::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        .thumbnail-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 2px;
        }

        .thumbnail-scroll::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 2px;
        }

        .thumbnail-scroll::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Smooth image transitions */
        .image-fade {
            transition: opacity 0.5s ease-in-out;
        }

        /* Hover effects */
        .hover-scale {
            transition: transform 0.3s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }
    </style>
</x-admin-app-layout>