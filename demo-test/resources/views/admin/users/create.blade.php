<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                    <div class="mb-4">
                        <div class="text-red-500 font-medium">
                            {{ __('Whoops! Something went wrong.') }}
                        </div>
                        <ul class="mt-3 text-sm text-red-500 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full rounded-md shadow-sm" required>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full rounded-md shadow-sm" required>
                        </div>

                        <!-- Password Field -->
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 dark:text-gray-300">Password</label>
                            <input type="password" name="password" id="password" class="w-full rounded-md shadow-sm" required>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full rounded-md shadow-sm" required>
                        </div>

                        <!-- Phone Field -->
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700 dark:text-gray-300">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="w-full rounded-md shadow-sm">
                        </div>

                        <!-- Role Field -->
                        <div class="mb-4">
                            <label for="role_id" class="block text-gray-700 dark:text-gray-300">Role</label>
                            <select
                                name="role_id"
                                id="role_id"
                                class="w-full rounded-md shadow-sm"
                                required
                                @if(auth()->user()->role_id == 2) disabled @endif
                                >
                                @if(auth()->user()->role_id == 2)
                                <!-- Default 'Customer' role selected for Admin -->
                                <option value="3" selected>Customer</option>
                                @else
                                <!-- For Super Admin, allow selection of any role -->
                                <option value="" disabled selected>Select a Role</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id', $user->role_id ?? '') == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                                @endforeach
                                @endif
                            </select>

                            <!-- Hidden Input to Submit 'role_id' if Dropdown is Disabled -->
                            @if(auth()->user()->role_id == 2)
                            <input type="hidden" name="role_id" value="3">
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700">{{ __('Image') }}</label>
                            <input type="file" name="image" id="image" class="mt-1">
                            @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>