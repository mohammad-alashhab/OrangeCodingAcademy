<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Brand') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('brands.store') }}" method="POST">
                        @csrf

                        <!-- Brand Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">{{ __('Brand Name') }}</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="w-full px-4 py-2 border rounded-lg @error('name') border-red-500 @enderror" required>
                            @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                {{ __('Create') }}
                            </button>
                            <a href="{{ route('brands.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>