<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Contact details -->
                    <h3 class="text-lg font-bold mb-4">Details</h3>
                    <p><strong>User:</strong> {{ $contact->user->name ?? 'N/A' }}</p>
                    <p><strong>email:</strong> {{ $contact->user->email ?? 'N/A' }}</p>
                    <p><strong>Subject:</strong> {{ $contact->subject }}</p>
                    <p><strong>Message:</strong> {{ $contact->message }}</p>
                    <p><strong>Status:</strong> {{ $contact->status->name ?? 'N/A' }}</p>
                    <p><strong>Created At:</strong> {{ $contact->created_at }}</p>
                    <p><strong>Updated At:</strong> {{ $contact->updated_at ?? 'Not updated' }}</p>

                    <form action="{{ route('contacts.updateStatus', $contact->id) }}" method="POST" class="mt-6">
                        @csrf
                        <label for="status_id" class="block mb-2 font-medium">Update Status</label>

                        <!-- Check if the status is not Closed or Resolved -->
                        @if($isStatusEditable)
                        <select id="status_id" name="status_id" class="border rounded px-4 py-2 w-full mb-4">
                            @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{ $contact->status_id == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                            @endforeach
                        </select>
                        @else
                        <!-- If status is Closed or Resolved, disable the dropdown -->
                        <select id="status_id" name="status_id" class="border rounded px-4 py-2 w-full mb-4" disabled>
                            <option value="{{ $contact->status_id }}" selected>
                                {{ $contact->status->name }}
                            </option>
                        </select>
                        @endif

                        @if($isStatusEditable)
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Update Status
                        </button>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>