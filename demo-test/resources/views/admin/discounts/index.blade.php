<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discounts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-6 py-4">
                    <div class="flex justify-between items-center">
                        <form method="GET" action="{{ route('discounts.index') }}" class="flex items-center">
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search Discounts..."
                                class="border border-gray-300 rounded px-3 py-2 focus:outline-none" />
                            <button type="submit" class="ml-2 btn btn-primary">Search</button>
                        </form>
                        <a href="{{ route('discounts.create') }}" class="btn btn-primary">Create Discount</a>
                    </div>
                    <table class="table mt-3 w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Product</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Discount (%)</th>
                                <th class="px-4 py-2">New Price</th>
                                <th class="px-4 py-2">Start Date</th>
                                <th class="px-4 py-2">End Date</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($discounts as $discount)
                            <tr>
                                <td class="px-4 py-2">{{ $discount->product->name }}</td>
                                <td class="px-4 py-2">{{ number_format($discount->product->price, 2) }}</td>
                                <td class="px-4 py-2">{{ $discount->percentage }}%</td>
                                <td class="px-4 py-2">
                                    {{ number_format($discount->product->price - ($discount->product->price * ($discount->percentage / 100)), 2) }}
                                </td>
                                <td class="px-4 py-2">{{ $discount->startdate }}</td>
                                <td class="px-4 py-2">{{ $discount->enddate }}</td>
                                <td class="px-4 py-2">{{ $discount->is_active ? 'Active' : 'Inactive' }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('discounts.edit', $discount->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @if (now()->greaterThanOrEqualTo($discount->enddate))
                                    <span class="text-red-500">Expired</span>
                                    @else
                                    <form action="{{ route('discounts.toggleStatus', $discount->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-info">
                                            {{ $discount->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>
                                    @endif
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">No discounts found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $discounts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>