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
        }

        /* Background Animation */
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

        /* Main Content */
        .login-container {
            width: 100%;
            max-width: 1400px;
            margin: auto;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 2rem;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        /* Hero Section */
        .hero-section {
            padding: 3rem;
            border-radius: 24px;
            background: var(--dark);
            color: var(--light);
            position: relative;
            overflow: hidden;
            animation: slideIn 1s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(-100px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 4rem;
        }

        .brand svg {
            width: 40px;
            height: 40px;
            animation: pulse 2s infinite;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, var(--primary), #ff6b6b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Form Section */
        .form-section {
            padding: 3rem;
            background: var(--light);
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
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
            margin-bottom: 2.5rem;
        }

        .form-title {
            font-size: 2.5rem;
            color: var(--dark);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .social-login {
            display: flex;
            gap: 1rem;
            margin: 2rem 0;
        }

        .social-btn {
            flex: 1;
            padding: 0.8rem;
            border: none;
            border-radius: 12px;
            background: var(--gray);
            color: var(--dark);
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 2rem 0;
            color: #666;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #ddd;
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
            position: relative;
            overflow: hidden;
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

        .login-link {
            text-align: center;
            margin-top: 1rem;
            color: var(--dark);
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Dark Mode Toggle */
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

        /* Dark Mode Styles */
        [data-theme="dark"] {
            --light: #111111;
            --dark: #ffffff;
            --gray: rgba(255, 255, 255, 0.05);
        }

        [data-theme="dark"] .form-section {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        [data-theme="dark"] .hero-section {
            background: rgba(255, 255, 255, 0.03);
        }

        /* Responsive Adjustments */
        @media (max-width: 1024px) {
            .login-container {
                grid-template-columns: 1fr;
            }

            .hero-section {
                display: none;
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

        <div class="login-container">
            <div class="hero-section">
                <div class="hero-content">
                    <div class="brand">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83M16.62 12l-5.74 9.94" />
                        </svg>
                        PartSix
                    </div>

                    <div>
                        <h1 class="hero-title">Your Auto Journey Starts Here</h1>
                        <p class="hero-description">Create your account and unlock a world of premium auto parts and expert services. Join our growing community today.</p>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="form-header">
                    <h2 class="form-title">Create Account</h2>
                    <p>Sign up for a PartSix account</p>
                </div>

                <div class="social-login">
                    <button class="social-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z" />
                        </svg>
                        Google
                    </button>
                    <button class="social-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z" />
                        </svg>
                        Facebook
                    </button>
                </div>

                <div class="divider">or continue with email</div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group">
                        <input type="text" id="name" name="name" class="input-field" :value="old('name')" required autofocus autocomplete="name" placeholder="Full Name" />
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="input-group">
                        <input type="email" id="email" name="email" class="input-field" :value="old('email')" required autocomplete="username" placeholder="Email address" />
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        </svg>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="input-group">
                        <input type="password" id="password" name="password" class="input-field" required autocomplete="new-password" placeholder="Password" />
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="input-group">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="input-field" required autocomplete="new-password" placeholder="Confirm Password" />
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <button type="submit" class="submit-btn">
                        Create Account
                    </button>

                    <div class="login-link">
                        Already have an account? <a href="{{ route('login') }}">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleTheme() {
            const container = document.querySelector('.page-container');
            const currentTheme = container.getAttribute('data-theme');
            container.setAttribute('data-theme', currentTheme === 'light' ? 'dark' : 'light');
        }
    </script>
</x-guest-layout>