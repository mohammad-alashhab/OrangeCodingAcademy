<x-admin-app-layout>
    
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <i class="fas fa-address-card text-indigo-600"></i>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contact Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <div class="p-8">
                    <!-- Contact Profile Header -->
                    <div class="flex items-start justify-between mb-8">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 rounded-full bg-indigo-100 flex items-center justify-center">
                                <span class="text-2xl font-bold text-indigo-600">
                                    {{ strtoupper(substr($contact->first_name, 0, 1)) }}{{ strtoupper(substr($contact->last_name, 0, 1)) }}
                                </span>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">{{ $contact->first_name }} {{ $contact->last_name }}</h3>
                                <div class="flex items-center space-x-2 text-gray-500">
                                    <span class="px-3 py-1 rounded-full text-sm {{ $contact->status->name === 'Open' ? 'bg-green-100 text-green-800' : ($contact->status->name === 'Closed' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                        {{ $contact->status->name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="text-sm text-gray-500">
                            <div class="flex items-center space-x-2">
                                <i class="far fa-clock"></i>
                                <span>Created: {{ $contact->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            @if($contact->updated_at)
                            <div class="flex items-center space-x-2 mt-1">
                                <i class="fas fa-history"></i>
                                <span>Updated: {{ $contact->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Contact Information Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg">
                                <i class="fas fa-envelope text-indigo-600"></i>
                                <div>
                                    <p class="text-sm text-gray-500">Email</p>
                                    <p class="font-medium">{{ $contact->email }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg">
                                <i class="fas fa-phone text-indigo-600"></i>
                                <div>
                                    <p class="text-sm text-gray-500">Phone</p>
                                    <p class="font-medium">{{ $contact->phone_number ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="fas fa-comment text-indigo-600"></i>
                                <p class="text-sm text-gray-500">Message</p>
                            </div>
                            <p class="font-medium">{{ $contact->message }}</p>
                        </div>
                    </div>

                    <!-- Status Update Form -->
                    <form action="{{ route('contacts.updateStatus', $contact->id) }}" method="POST" class="mt-8 bg-gray-50 rounded-lg p-6">
                        @csrf
                        <label for="status_id" class="block mb-2 font-medium text-gray-700 flex items-center space-x-2">
                            <i class="fas fa-tasks text-indigo-600"></i>
                            <span>Update Status</span>
                        </label>

                        @if($isStatusEditable)
                        <select id="status_id" name="status_id" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{ $contact->status_id == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                            @endforeach
                        </select>

                        <button type="submit" class="mt-4 inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition duration-150 ease-in-out">
                            <i class="fas fa-save mr-2"></i>
                            Update Status
                        </button>
                        @else
                        <select id="status_id" name="status_id" class="w-full rounded-lg border-gray-300 bg-gray-100 cursor-not-allowed" disabled>
                            <option value="{{ $contact->status_id }}" selected>
                                {{ $contact->status->name }}
                            </option>
                        </select>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>