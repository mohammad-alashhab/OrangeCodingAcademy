<x-admin-app-layout>

    <!-- Add custom CSS -->
    <style>
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .contact-table th {
            position: relative;
        }

        .contact-table th:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -1px;
            width: 100%;
            height: 2px;
            background: #3b82f6;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .contact-table th:hover:after {
            transform: scaleX(1);
        }

        .contact-row {
            transition: all 0.2s ease;
        }

        .contact-row:hover {
            background-color: #f8fafc;
            transform: translateY(-1px);
        }

        .status-badge {
            transition: all 0.3s ease;
        }

        .status-badge:hover {
            transform: scale(1.05);
        }
    </style>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-address-book text-blue-500 mr-2"></i>
                {{ __('Contacts Management') }}
            </h2>
            <div class="text-sm text-gray-500">
                <i class="fas fa-users mr-1"></i>
                Total Contacts: {{ $contacts->total() }}
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Search form -->
                    <form method="GET" action="{{ route('contacts.index') }}" class="mb-6">
                        <div class="relative flex items-center">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search contacts..."
                                class="search-input pl-10 pr-4 py-3 w-full rounded-l-lg border-gray-200 focus:border-blue-500 focus:ring-0 transition duration-150 ease-in-out">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-r-lg transition duration-150 ease-in-out flex items-center">
                                <span class="mr-2">Search</span>
                            </button>
                        </div>
                    </form>

                    <!-- Contacts table -->
                    <div class="overflow-x-auto bg-white rounded-lg shadow">
                        <table class="contact-table min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i class="fas fa-hashtag mr-2"></i>ID
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i class="fas fa-user mr-2"></i>Name
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i class="fas fa-envelope mr-2"></i>Email
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i class="fas fa-phone mr-2"></i>Phone
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i class="fas fa-comment mr-2"></i>Message
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i class="fas fa-info-circle mr-2"></i>Status
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i class="fas fa-cog mr-2"></i>Actions
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($contacts as $contact)
                                <tr class="contact-row">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        #{{ $contact->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                    <span class="text-blue-600 font-medium">
                                                        {{ strtoupper(substr($contact->first_name, 0, 1)) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $contact->first_name }} {{ $contact->last_name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $contact->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $contact->phone_number ?? 'N/A' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ Str::limit($contact->message, 50) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-badge px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if($contact->status->name === 'Active') bg-green-100 text-green-800
                                            @elseif($contact->status->name === 'Pending') bg-yellow-100 text-yellow-800
                                            @elseif($contact->status->name === 'Resolved') bg-green-100 text-green-800
                                            @elseif($contact->status->name === 'Closed') bg-red-100 text-red-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            {{ $contact->status->name ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('contacts.show', $contact->id) }}"
                                            class="text-blue-500 hover:text-blue-700 transition duration-150 ease-in-out flex items-center">
                                            <i class="fas fa-eye mr-2"></i>
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center py-8">
                                            <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                                            <p class="text-lg">No contacts found</p>
                                            <p class="text-sm text-gray-400">Try adjusting your search criteria</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination links -->
                    <div class="mt-6">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>