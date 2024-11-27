<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reviews') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <!-- Search and Filter -->
                <form action="{{ route('reviews.index') }}" method="GET" class="mb-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <input
                            type="text"
                            name="search"
                            class="form-input w-full"
                            placeholder="Search by comment or user"
                            value="{{ request('search') }}">

                        <select name="visibility" class="form-select w-full">
                            <option value="">All</option>
                            <option value="1" {{ request('visibility') == '1' ? 'selected' : '' }}>Visible</option>
                            <option value="0" {{ request('visibility') == '0' ? 'selected' : '' }}>Hidden</option>
                        </select>

                        <button type="submit" class="btn btn-primary w-full">
                            {{ __('Filter') }}
                        </button>
                    </div>
                </form>

                <!-- Reviews Table -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">User</th>
                                <th class="border px-4 py-2">Item</th>
                                <th class="border px-4 py-2">Rating</th>
                                <th class="border px-4 py-2">Comment</th>
                                <th class="border px-4 py-2">Visibility</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reviews as $review)
                            <tr>
                                <td class="border px-4 py-2">{{ $review->id }}</td>
                                <td class="border px-4 py-2">{{ $review->user->name ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">{{ $review->product->name ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">
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
                                </td>
                                <td class="border px-4 py-2">{{ Str::limit($review->comment, 50) }}</td>
                                <td class="border px-4 py-2">
                                    {{ $review->is_visible ? 'Visible' : 'Hidden' }}
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-info btn-sm">
                                        View
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center border px-4 py-2">
                                    {{ __('No reviews found.') }}
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


                <!-- Pagination -->
                <div class="mt-4">
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>