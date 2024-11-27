<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Search form -->
                    <form method="GET" action="{{ route('contacts.index') }}" class="mb-6">
                        <div class="flex">
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search by subject or message"
                                class="border rounded-l px-4 py-2 w-full">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">
                                Search
                            </button>
                        </div>
                    </form>

                    <!-- Contacts table -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">ID</th>
                                    <th class="border px-4 py-2">User</th>
                                    <th class="border px-4 py-2">Subject</th>
                                    <th class="border px-4 py-2">Message</th>
                                    <th class="border px-4 py-2">Status</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contacts as $contact)
                                <tr>
                                    <td class="border px-4 py-2">{{ $contact->id }}</td>
                                    <td class="border px-4 py-2">{{ $contact->user->name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ Str::limit($contact->subject, 30) }}</td>
                                    <td class="border px-4 py-2">{{ Str::limit($contact->message, 50) }}</td>
                                    <td class="border px-4 py-2">{{ $contact->status->name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('contacts.show', $contact->id) }}" class="text-blue-500 hover:underline">
                                            View
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center border px-4 py-2">No contacts found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination links -->
                    <div class="mt-4">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>