<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Discount') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-6 py-4">
                    <form action="{{ route('discounts.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="product_id" class="block text-sm font-medium text-gray-700">Product</label>
                            <select name="product_id" id="product_id" class="form-control" required>
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} (Price: {{ $product->price }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="percentage" class="block text-sm font-medium text-gray-700">Discount Percentage (%)</label>
                            <input type="number" name="percentage" id="percentage" class="form-control" min="0" max="100" required>
                        </div>

                        <div class="mb-4">
                            <label for="startdate" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" name="startdate" id="startdate" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="enddate" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="date" name="enddate" id="enddate" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Discount</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>