<x-admin-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight tracking-tight">
            <i class="fas fa-tags mr-2 text-indigo-600"></i>{{ __('Discounts Management') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-8">
                    <!-- Search and Create Section -->
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">
                        <form method="GET" action="{{ route('discounts.index') }}" class="w-full sm:w-auto">
                            <div class="relative">
                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="Search discounts..."
                                    class="w-full sm:w-80 pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-200 ease-in-out" />
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </form>
                        <a href="{{ route('discounts.create') }}" class="w-full sm:w-auto px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-200 ease-in-out flex items-center justify-center gap-2">
                            <i class="fas fa-plus-circle"></i>
                            Create Discount
                        </a>
                    </div>

                    <!-- Table Section -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <div class="flex items-center gap-1">
                                            <i class="fas fa-box text-indigo-400"></i>
                                            Product
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <div class="flex items-center gap-1">
                                            <i class="fas fa-dollar-sign text-indigo-400"></i>
                                            Price
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <div class="flex items-center gap-1">
                                            <i class="fas fa-percentage text-indigo-400"></i>
                                            Discount
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <div class="flex items-center gap-1">
                                            <i class="fas fa-calendar-alt text-indigo-400"></i>
                                            Start Date
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <div class="flex items-center gap-1">
                                            <i class="fas fa-calendar-check text-indigo-400"></i>
                                            End Date
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <div class="flex items-center gap-1">
                                            <i class="fas fa-circle text-indigo-400"></i>
                                            Status
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($discounts as $discount)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $discount->product->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        ${{ number_format($discount->product->price, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                            {{ $discount->percentage }}%
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $discount->startdate }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $discount->enddate }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 rounded-full text-sm {{ $discount->is_active ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ $discount->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        <a href="{{ route('discounts.edit', $discount->id) }}"
                                            class="inline-flex items-center px-3 py-2 border border-yellow-400 rounded-md text-sm font-medium text-yellow-700 bg-yellow-50 hover:bg-yellow-100 transition-colors duration-200">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>

                                        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-2 border border-red-400 rounded-md text-sm font-medium text-red-700 bg-red-50 hover:bg-red-100 transition-colors duration-200">
                                                <i class="fas fa-trash-alt mr-1"></i> Delete
                                            </button>
                                        </form>

                                        @if (now()->greaterThanOrEqualTo($discount->enddate))
                                        <span class="inline-flex items-center px-3 py-2 rounded-md text-sm font-medium text-red-700 bg-red-50">
                                            <i class="fas fa-clock mr-1"></i> Expired
                                        </span>
                                        @else
                                        <form action="{{ route('discounts.toggleStatus', $discount->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-2 border border-indigo-400 rounded-md text-sm font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100 transition-colors duration-200">
                                                <i class="fas fa-toggle-on mr-1"></i>
                                                {{ $discount->is_active ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-10 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <i class="fas fa-inbox text-4xl mb-4"></i>
                                            <span class="text-lg">No discounts found</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $discounts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>