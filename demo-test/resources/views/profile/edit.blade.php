@if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white tracking-wide">
            {{ __('Profile Settings') }}
        </h2>
        <p class="text-red-100 mt-2">{{ __("Manage your account and personalize your profile") }}</p>
    </x-slot>

    <!-- Main Content for Admin -->
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
</x-admin-app-layout>
@else
<x-ecommerce-app-layout>
    <style>
        /* Custom CSS */
        :root {
            --primary-red: #e31837;
            --dark-red: #b31329;
            --off-white: #f8f9fa;
        }

        .account__welcome--text {
            font-size: 1.5rem;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
            font-weight: 500;
        }

        .account__wrapper {
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
        }

        .account__content {
            margin-bottom: 40px;
        }

        .account__content--title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .account__content--title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--primary-red);
        }

        /* Profile Image Styles */
        .profile-image-container {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 auto 30px;
        }

        .profile-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid var(--primary-red);
            transition: all 0.3s ease;
        }

        .profile-image-label {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: var(--primary-red);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .profile-image-label:hover {
            background: var(--dark-red);
            transform: scale(1.1);
        }

        /* Form Styles */
        .form-control {
            border: 2px solid #e1e1e1;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-red);
            box-shadow: 0 0 0 0.2rem rgba(227, 24, 55, 0.25);
        }

        .form-label {
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
        }

        /* Danger Zone Styles */
        .danger-zone {
            background: #fff5f5;
            border: 1px solid #feb2b2;
            border-radius: 12px;
            padding: 25px;
        }

        .danger-zone h2 {
            color: #dc3545;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .account__wrapper {
                padding: 20px;
            }

            .profile-image-container {
                width: 150px;
                height: 150px;
            }
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><span>Home</span></li>
                            <li class="breadcrumb__content--menu__items"><span>My Account</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Profile Section -->
    <section class="my__account--section section--padding">
        <div class="container">
            <div class="account__wrapper">
                <!-- Profile Update Form -->
                <div class="account__content">
                    <h2 class="account__content--title h3">Update Your Profile</h2>
                    <form method="POST" action="{{ route('profile.update.ecommerce') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <!-- Profile Picture -->
                            <div class="col-md-4 text-center">
                                <div class="profile-image-container">
                                    <img id="profile-image"
                                        src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('default-profile.png') }}"
                                        alt="Profile Picture">
                                    <label for="image-input" class="profile-image-label">
                                        <i class="fas fa-camera"></i>
                                        <input type="file" name="image" id="image-input" class="d-none">
                                    </label>
                                </div>
                            </div>

                            <!-- Profile Details -->
                            <div class="col-md-8">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="name">Full Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="email">Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="phone">Phone Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                        </div>
                                    </div>

                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn primary__btn">
                                            <i class="fas fa-save me-2"></i>Update Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Password Change Section -->
                <div class="account__content">
                    <h2 class="account__content--title h3">Change Password</h2>
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="row g-3">
                            <!-- Current Password -->
                            <div class="col-md-4">
                                <label class="form-label" for="current_password">Current Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                </div>
                                @if ($errors->updatePassword->has('current_password'))
                                <div class="text-danger mt-1">
                                    {{ $errors->updatePassword->first('current_password') }}
                                </div>
                                @endif
                            </div>

                            <!-- New Password -->
                            <div class="col-md-4">
                                <label class="form-label" for="password">New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                @if ($errors->updatePassword->has('password'))
                                <div class="text-danger mt-1">
                                    {{ $errors->updatePassword->first('password') }}
                                </div>
                                @endif
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-md-4">
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                </div>
                                @if ($errors->updatePassword->has('password_confirmation'))
                                <div class="text-danger mt-1">
                                    {{ $errors->updatePassword->first('password_confirmation') }}
                                </div>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 text-end">
                                <button type="submit" class="btn primary__btn">
                                    <i class="fas fa-lock me-2"></i>Update Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Danger Zone Section for Account Deletion -->
                <div class="account__content mt-8">
                    <h2 class="account__content--title h3 mb-20 text-red-600">Danger Zone</h2>
                    <div class="danger-zone">
                        <p class="text-danger mb-4">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Permanently delete your account and all associated data.
                        </p>
                        <button class="btn primary__btn" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                            <i class="fas fa-trash-alt me-2"></i>Delete Account
                        </button>
                    </div>
                </div>

                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <div class="modal-content">
                        <style>
                            .modal-content {
                                background: white;
                                border-radius: 15px;
                                padding: 30px;
                                max-width: 500px;
                                margin: 0 auto;
                            }

                            .modal-title {
                                color: #dc3545;
                                font-size: 1.5rem;
                                font-weight: 600;
                                margin-bottom: 15px;
                                display: flex;
                                align-items: center;
                                gap: 10px;
                            }

                            .modal-description {
                                color: #666;
                                margin-bottom: 25px;
                                font-size: 0.95rem;
                                line-height: 1.5;
                            }

                            .modal-input {
                                width: 100%;
                                border: 2px solid #e1e1e1;
                                padding: 12px;
                                border-radius: 8px;
                                transition: all 0.3s ease;
                                margin-bottom: 20px;
                            }

                            .modal-input:focus {
                                border-color: #e31837;
                                box-shadow: 0 0 0 0.2rem rgba(227, 24, 55, 0.25);
                                outline: none;
                            }

                            .modal-actions {
                                display: flex;
                                justify-content: flex-end;
                                gap: 15px;
                            }

                            .btn-cancel {
                                background: #f8f9fa;
                                color: #333;
                                padding: 10px 20px;
                                border-radius: 8px;
                                border: 1px solid #ddd;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            }

                            .btn-cancel:hover {
                                background: #e9ecef;
                            }

                            .btn-delete {
                                background: #e31837;
                                color: white;
                                padding: 10px 20px;
                                border-radius: 8px;
                                border: none;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            }

                            .btn-delete:hover {
                                background: #b31329;
                            }

                            .error-message {
                                color: #dc3545;
                                margin-top: 5px;
                            }
                        </style>

                        <form method="post" action="{{ route('profile.destroy.ecommerce') }}">
                            @csrf
                            @method('delete')

                            <h2 class="modal-title">
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ __('Delete Account') }}
                            </h2>

                            <p class="modal-description">
                                {{ __('This action is irreversible. All your data, including profile information, orders, and preferences will be permanently deleted. Please enter your password to confirm.') }}
                            </p>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="modal-input"
                                placeholder="{{ __('Enter your password') }}">

                            @if($errors->userDeletion->get('password'))
                            <div class="error-message">
                                {{ $errors->userDeletion->first('password') }}
                            </div>
                            @endif

                            <div class="modal-actions">
                                <button type="button" class="btn-cancel" x-on:click="$dispatch('close')">
                                    <i class="fas fa-times me-2"></i>{{ __('Cancel') }}
                                </button>
                                <button type="submit" class="btn-delete">
                                    <i class="fas fa-trash-alt me-2"></i>{{ __('Delete Account') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </x-modal>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('image-input').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('profile-image').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
</x-ecommerce-app-layout>
@endif