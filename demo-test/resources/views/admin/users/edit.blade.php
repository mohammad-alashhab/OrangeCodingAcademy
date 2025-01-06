<x-admin-app-layout>

    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <i class="fas fa-user-edit text-2xl text-indigo-500"></i>
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit User') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl">
                <div class="p-8">
                    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Profile Section -->
                        <div class="flex items-center space-x-6 mb-8">
                            <div class="relative">
                                <img id="profile-preview" src="{{ $user->image ? asset('storage/' . $user->image) : '' }}"
                                    alt="{{ $user->name }}" class="w-24 h-24 rounded-full object-cover border-4 border-indigo-500 shadow-lg">
                                <div class="absolute bottom-0 right-0 bg-white dark:bg-gray-700 rounded-full p-2 shadow-lg">
                                    <label for="image" class="cursor-pointer">
                                        <i class="fas fa-camera text-indigo-500"></i>
                                    </label>
                                    <input type="file" name="image" id="image" class="hidden" accept="image/*">
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $user->name }}</h3>
                                <p class="text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                            </div>
                        </div>

                        <!-- Form Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name Field -->
                            <div class="space-y-2">
                                <x-label for="name" :value="__('Name')" class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                <div class="relative">
                                    <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <x-input id="name" class="pl-10 block w-full rounded-lg border-gray-300 dark:border-gray-600 shadow-sm"
                                        type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus />
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="space-y-2">
                                <x-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                <div class="relative">
                                    <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <x-input id="email" class="pl-10 block w-full rounded-lg border-gray-300 dark:border-gray-600 shadow-sm"
                                        type="email" name="email" value="{{ old('email', $user->email) }}" required />
                                </div>
                            </div>

                            <!-- Phone Field -->
                            <div class="space-y-2">
                                <x-label for="phone" :value="__('Phone')" class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                <div class="relative">
                                    <i class="fas fa-phone absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <x-input id="phone" class="pl-10 block w-full rounded-lg border-gray-300 dark:border-gray-600 shadow-sm"
                                        type="text" name="phone" value="{{ old('phone', $user->phone) }}" required />
                                </div>
                            </div>

                            <!-- Role Field -->
                            <div class="space-y-2">
                                <x-label for="role_id" :value="__('Role')" class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                <div class="relative">
                                    <i class="fas fa-user-shield absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <select id="role_id" name="role_id"
                                        class="pl-10 block w-full rounded-lg border-gray-300 dark:border-gray-600 shadow-sm">
                                        <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Admin</option>
                                        <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-8">
                            <x-primary-button class="flex items-center space-x-2 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500">
                                <i class="fas fa-save"></i>
                                <span>{{ __('Save Changes') }}</span>
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('profile-preview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

</x-admin-app-layout>