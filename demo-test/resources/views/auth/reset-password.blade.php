<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        :root {
            --primary: #ff3333;
            --dark: #111111;
            --light: #ffffff;
            --gray: #f5f5f5;
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .page-container {
            min-height: 100vh;
            display: flex;
            background: var(--light);
            position: relative;
            overflow: hidden;
            align-items: center;
            justify-content: center;
        }

        .animated-bg {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            background: linear-gradient(45deg, rgba(255, 51, 51, 0.03) 0%, rgba(255, 51, 51, 0) 70%);
        }

        .animated-shape {
            position: absolute;
            background: var(--primary);
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.1;
            animation: floatAnimation 20s infinite alternate;
        }

        .shape1 {
            top: -10%;
            left: -10%;
            width: 500px;
            height: 500px;
        }

        .shape2 {
            bottom: -15%;
            right: -15%;
            width: 600px;
            height: 600px;
        }

        @keyframes floatAnimation {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }

            100% {
                transform: translate(100px, 100px) rotate(360deg);
            }
        }

        .form-section {
            width: 100%;
            max-width: 500px;
            padding: 3rem;
            background: var(--light);
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            position: relative;
            z-index: 1;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-title {
            font-size: 2.5rem;
            color: var(--dark);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-field {
            width: 100%;
            padding: 1.2rem 1rem 1.2rem 3rem;
            border: 2px solid transparent;
            border-radius: 12px;
            background: var(--gray);
            font-size: 1rem;
            transition: var(--transition);
        }

        .input-field:focus {
            border-color: var(--primary);
            background: transparent;
            outline: none;
            box-shadow: 0 0 0 4px rgba(255, 51, 51, 0.1);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            transition: var(--transition);
        }

        .submit-btn {
            width: 100%;
            padding: 1.2rem;
            border: none;
            border-radius: 12px;
            background: var(--primary);
            color: var(--light);
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(255, 51, 51, 0.3);
        }

        .submit-btn::after {
            content: '';
            position: absolute;
            width: 30px;
            height: 200px;
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(45deg);
            top: -60px;
            left: -100px;
            transition: 0.7s;
        }

        .submit-btn:hover::after {
            left: 120%;
        }

        .theme-toggle {
            position: fixed;
            top: 2rem;
            right: 2rem;
            z-index: 100;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--dark);
            color: var(--light);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        [data-theme="dark"] {
            --light: #111111;
            --dark: #ffffff;
            --gray: rgba(255, 255, 255, 0.05);
        }

        [data-theme="dark"] .form-section {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 600px) {
            .form-section {
                padding: 2rem;
            }
        }
    </style>

    <button class="theme-toggle" onclick="toggleTheme()">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="5" />
            <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42" />
        </svg>
    </button>

    <div class="page-container" data-theme="light">
        <div class="animated-bg">
            <div class="animated-shape shape1"></div>
            <div class="animated-shape shape2"></div>
        </div>

        <div class="form-section">
            <div class="form-header">
                <h2 class="form-title">Reset Password</h2>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="input-group">
                    <input type="email" id="email" name="email" class="input-field"
                        value="{{ old('email', $request->email) }}"
                        required autofocus autocomplete="username"
                        placeholder="Email address" />
                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                        <polyline points="22,6 12,13 2,6" />
                    </svg>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="input-group">
                    <input type="password" id="password" name="password"
                        class="input-field" required
                        autocomplete="new-password"
                        placeholder="New Password" />
                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="input-group">
                    <input type="password" id="password_confirmation"
                        name="password_confirmation"
                        class="input-field" required
                        autocomplete="new-password"
                        placeholder="Confirm Password" />
                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <button type="submit" class="submit-btn">
                    {{ __('Reset Password') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="ml-2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <script>
        function toggleTheme() {
            const container = document.querySelector('.page-container');
            const currentTheme = container.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            container.setAttribute('data-theme', newTheme);
        }
    </script>
</x-guest-layout>