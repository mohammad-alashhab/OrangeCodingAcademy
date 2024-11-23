<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Coupon') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('coupons.update', $coupon->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="code" class="block text-gray-700">{{ __('Code') }}</label>
                            <input type="text" name="code" id="code" class="w-full border-gray-300 rounded mt-1" value="{{ old('code', $coupon->code) }}" required>
                            @error('code')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="discount_percentage" class="block text-gray-700">{{ __('Discount Percentage') }}</label>
                            <input type="number" name="discount_percentage" id="discount_percentage" class="w-full border-gray-300 rounded mt-1" value="{{ old('discount_percentage', $coupon->discount_percentage) }}" required min="1" max="100">
                            @error('discount_percentage')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="valid_from" class="block text-gray-700">{{ __('Valid From') }}</label>
                            <input type="date" name="valid_from" id="valid_from" class="w-full border-gray-300 rounded mt-1" value="{{ old('valid_from', $coupon->valid_from) }}" required>
                            @error('valid_from')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="valid_until" class="block text-gray-700">{{ __('Valid Until') }}</label>
                            <input type="date" name="valid_until" id="valid_until" class="w-full border-gray-300 rounded mt-1" value="{{ old('valid_until', $coupon->valid_until) }}" required>
                            @error('valid_until')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="min_order_value" class="block text-gray-700">{{ __('Minimum Order Value') }}</label>
                            <input type="number" name="min_order_value" id="min_order_value" class="w-full border-gray-300 rounded mt-1" value="{{ old('min_order_value', $coupon->min_order_value) }}" step="0.01">
                            @error('min_order_value')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="max_discount" class="block text-gray-700">{{ __('Maximum Discount') }}</label>
                            <input type="number" name="max_discount" id="max_discount" class="w-full border-gray-300 rounded mt-1" value="{{ old('max_discount', $coupon->max_discount) }}" step="0.01">
                            @error('max_discount')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            {{ __('Update') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>