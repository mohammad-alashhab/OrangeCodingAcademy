<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Review Details') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <!-- Review Details -->
                <div class="mb-6">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Review Information') }}</h3>
                    <p><strong>{{ __('User:') }}</strong> {{ $review->user->name ?? 'N/A' }}</p>
                    <p><strong>{{ __('Item:') }}</strong> {{ ucfirst($review->product->name ?? 'N/A') }}</p>

                    <p><strong>{{ __('Rating:') }}</strong>
                        <!-- Rating as stars -->
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="text-yellow-500">
                            @if ($i <= $review->rating)
                                ★
                                @else
                                ☆
                                @endif
                                </span>
                                @endfor
                    </p>

                    <p><strong>{{ __('Comment:') }}</strong> {{ $review->comment }}</p>
                    <p><strong>{{ __('Visibility:') }}</strong> {{ $review->is_visible ? 'Visible' : 'Hidden' }}</p>
                    <p><strong>{{ __('Created At:') }}</strong> {{ $review->created_at }}</p>
                    <p><strong>{{ __('Updated At:') }}</strong> {{ $review->updated_at }}</p>
                </div>


                <!-- Actions -->
                <form action="{{ route('reviews.toggleVisibility', $review->id) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-{{ $review->is_visible ? 'danger' : 'success' }}">
                        {{ $review->is_visible ? __('Hide') : __('Make Visible') }}
                    </button>
                    <a href="{{ route('reviews.index') }}" class="btn btn-secondary">
                        {{ __('Back') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>