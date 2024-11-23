<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- User Details -->
                    <h3 class="text-xl font-bold mb-4">User Information</h3>
                    <div class="flex items-center mb-6">
                        <img src="{{ asset($user->image) }}" alt="User Image" class="w-24 h-24 rounded-full">
                        <div class="ml-6">
                            <p><strong>Name:</strong> {{ $user->name }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Phone:</strong> {{ $user->phone }}</p>
                            <p><strong>Role:</strong> {{ $user->role->name ?? 'N/A' }}</p>
                            <p><strong>Status:</strong> {{ $user->is_active ? 'Active' : 'Inactive' }}</p>
                        </div>
                    </div>

                    <!-- Address Details -->
                    <h3 class="text-xl font-bold mb-4">Address Information</h3>
                    <div class="mb-6">
                        @foreach($user->addresses as $address)
                        <div class="mb-4">
                            <p><strong>Address Type:</strong> {{ $address->address_type }}</p>
                            <p><strong>Street Address:</strong> {{ $address->street_address }}</p>
                            <p><strong>City:</strong> {{ $address->city }}</p>
                            <p><strong>State:</strong> {{ $address->state }}</p>
                            <p><strong>Zip Code:</strong> {{ $address->zip_code }}</p>
                            <p><strong>Country:</strong> {{ $address->country }}</p>
                            <p><strong>Default Address:</strong> {{ $address->default_address ? 'Yes' : 'No' }}</p>
                        </div>
                        @endforeach
                    </div>

                    <!-- Order History -->
                    <h3 class="text-xl font-bold mb-4">Order History</h3>
                    <table class="table-auto w-full mb-6">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Order ID</th>
                                <th class="border px-4 py-2">Total Price</th>
                                <th class="border px-4 py-2">Product Quantity</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                            <tr>
                                <td class="border px-4 py-2">{{ $order->id }}</td>
                                <td class="border px-4 py-2">${{ $order->total_price }}</td>
                                <td class="border px-4 py-2">{{ $order->product_quantity }}</td>
                                <td class="border px-4 py-2">{{ $order->status->name ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">{{ $order->created_at->format('d/m/Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="border px-4 py-2 text-center">No orders found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Actions -->
                    <h3 class="text-xl font-bold mb-4">Actions</h3>
                    <div class="flex space-x-4">
                        <form action="{{ route('users.toggleStatus', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>