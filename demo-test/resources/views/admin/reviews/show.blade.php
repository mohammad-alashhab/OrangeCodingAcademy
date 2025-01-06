<x-admin-app-layout>
    
    <x-slot name="header">
        <div class="flex items-center space-x-3 text-gray-800">
            <i class="fas fa-star-half-alt text-2xl text-yellow-500"></i>
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Review Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-xl overflow-hidden">
                <!-- Header Banner -->
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-6 text-white">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center">
                            <i class="fas fa-user text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">{{ $review->user->name ?? 'N/A' }}</h3>
                            <p class="text-white/80">{{ $review->created_at->format('F j, Y') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Review Content -->
                <div class="p-8">
                    <!-- Product Information -->
                    <div class="mb-8 flex items-center space-x-3">
                        <i class="fas fa-box text-gray-500 text-xl"></i>
                        <span class="text-lg font-medium">{{ ucfirst($review->product->name ?? 'N/A') }}</span>
                    </div>

                    <!-- Rating -->
                    <div class="mb-8">
                        <h4 class="text-sm font-semibold text-gray-500 mb-2">RATING</h4>
                        <div class="flex items-center space-x-1">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <=$review->rating)
                                <i class="fas fa-star text-2xl text-yellow-400"></i>
                                @else
                                <i class="far fa-star text-2xl text-gray-300"></i>
                                @endif
                                @endfor
                        </div>
                    </div>

                    <!-- Comment -->
                    <div class="mb-8">
                        <h4 class="text-sm font-semibold text-gray-500 mb-2">COMMENT</h4>
                        <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                            <i class="fas fa-quote-left text-gray-400 mb-2"></i>
                            <p class="text-gray-700 leading-relaxed">{{ $review->comment }}</p>
                            <i class="fas fa-quote-right text-gray-400 mt-2 float-right"></i>
                        </div>
                    </div>

                    <!-- Meta Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                                <i class="fas fa-eye {{ $review->is_visible ? 'text-green-500' : 'text-red-500' }}"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Visibility Status</p>
                                <p class="font-medium">{{ $review->is_visible ? 'Visible' : 'Hidden' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-clock text-blue-500"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Last Updated</p>
                                <p class="font-medium">{{ $review->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <form action="{{ route('reviews.toggleVisibility', $review->id) }}" method="POST" class="flex items-center space-x-4">
                        @csrf
                        <button type="submit" class="inline-flex items-center px-4 py-2 rounded-lg {{ $review->is_visible ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' }} text-white transition-colors duration-200">
                            <i class="fas {{ $review->is_visible ? 'fa-eye-slash' : 'fa-eye' }} mr-2"></i>
                            {{ $review->is_visible ? __('Hide') : __('Make Visible') }}
                        </button>
                        <a href="{{ route('reviews.index') }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            {{ __('Back') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>