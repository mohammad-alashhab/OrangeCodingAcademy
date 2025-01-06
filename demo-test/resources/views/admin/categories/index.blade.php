<!-- Make sure to add this in your layout head -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<x-admin-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg p-4 shadow-lg">
            <h2 class="font-bold text-2xl text-white leading-tight flex items-center">
                <i class="fas fa-layer-group mr-3"></i>
                {{ __('Categories') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <div class="p-8">
                    <!-- Add Category Button -->
                    <div class="mb-6">
                        <a href="{{ route('categories.create') }}"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 transition-colors duration-200 text-white font-semibold rounded-lg shadow-md transform hover:scale-105">
                            <i class="fas fa-plus-circle mr-2"></i>
                            {{ __('Add New Category') }}
                        </a>
                    </div>

                    <!-- Categories Table -->
                    <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i class="fas fa-hashtag mr-2"></i>
                                            {{ __('ID') }}
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i class="fas fa-tag mr-2"></i>
                                            {{ __('Name') }}
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i class="fas fa-align-left mr-2"></i>
                                            {{ __('Description') }}
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i class="fas fa-image mr-2"></i>
                                            {{ __('Image') }}
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i class="fas fa-cog mr-2"></i>
                                            {{ __('Actions') }}
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($categories as $category)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $category->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $category->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $category->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <img src="{{ asset('storage/' . $category->image) }}"
                                            alt="{{ $category->name }}"
                                            class="w-16 h-16 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow duration-200">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="inline-flex items-center px-4 py-2 bg-amber-500 hover:bg-amber-600 transition-colors duration-200 text-white rounded-lg shadow-sm">
                                            <i class="fas fa-edit mr-2"></i>
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 transition-colors duration-200 text-white rounded-lg shadow-sm">
                                                <i class="fas fa-trash-alt mr-2"></i>
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom hover effects */
        .hover\:scale-105:hover {
            transform: scale(1.05);
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }

        /* Custom scrollbar for table */
        .overflow-hidden::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .overflow-hidden::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .overflow-hidden::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .overflow-hidden::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</x-admin-app-layout>