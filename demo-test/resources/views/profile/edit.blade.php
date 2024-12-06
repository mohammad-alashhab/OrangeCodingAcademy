<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white tracking-wide">
            {{ __('Profile Settings') }}
        </h2>
        <p class="text-red-100 mt-2">{{ __("Manage your account and personalize your profile") }}</p>
    </x-slot>

    <section class="py-12 bg-white text-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Profile Section (Traditional DIV style) -->
            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden p-8">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Profile Picture -->
                        <div class="md:col-span-1 flex flex-col items-center">
                            <div class="relative group">
                                <img
                                    id="profile-image"
                                    src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('default-profile.png') }}"
                                    alt="Profile Picture"
                                    class="w-48 h-48 rounded-full object-cover border-4 border-red-100 shadow-lg group-hover:scale-105 transition-all-smooth">
                                <label
                                    class="absolute bottom-0 right-0 bg-red-600 text-white p-2 rounded-full cursor-pointer hover:bg-red-700 transition-all-smooth">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <input type="file" name="image" class="hidden" id="image-input" />
                                </label>
                            </div>
                        </div>

                        <!-- Profile Details -->
                        <div class="md:col-span-2 space-y-6">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="name" :value="__('Full Name')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="email" :value="__('Email Address')" />
                                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="phone" :value="__('Phone Number')" />
                                    <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full" :value="old('phone', $user->phone)" />
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>
                            </div>
                            <div class="text-right">
                                <x-primary-button class="mt-4 text-white">{{ __('Update') }}</x-primary-button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <!-- Security Section (Traditional DIV style) -->
            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden p-8">
                <h3 class="text-xl font-semibold text-black mb-6">{{ __('Change Password') }}</h3>
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <x-input-label for="current_password" :value="__('Current Password')" />
                    <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

                    <x-input-label for="password" :value="__('New Password')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

                    <x-input-label for="password_confirmation" :value="__('Confirm New Password')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

                    <div class="text-right">
                        <x-primary-button class="mt-4 text-white">{{ __('Update Password') }}</x-primary-button>
                    </div>
                </form>

                <!-- Account Deletion -->
                <div class="mt-8">
                    <h3 class="text-xl font-semibold text-red-600 mb-6">{{ __('Danger Zone') }}</h3>
                    <div class="bg-red-50 border border-red-200 p-6 rounded-lg">
                        <p class="text-red-700 mb-4">{{ __('Permanently delete your account and all associated data.') }}</p>
                        <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-danger-button>
                    </div>

                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Are you sure you want to delete your account?') }}</h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __('This action is irreversible. Please enter your password to confirm.') }}</p>

                            <x-text-input id="password" name="password" type="password" class="mt-4 block w-full" placeholder="{{ __('Password') }}" />
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />

                            <div class="mt-6 flex justify-end gap-2">
                                <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                                <x-danger-button>{{ __('Delete Account') }}</x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('image-input').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const previewImage = document.getElementById('profile-image');
                previewImage.src = reader.result; // Set the image source to the selected file
            }
            reader.readAsDataURL(event.target.files[0]); // Read the selected file
        });
    </script>
</x-app-layout>