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

        .form-description {
            color: #666;
            margin-bottom: 2rem;
        }

        .verification-text {
            color: #666;
            text-align: center;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
        }

        .submit-btn {
            padding: 1rem 2rem;
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

        .logout-link {
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition);
        }

        .logout-link:hover {
            text-decoration: underline;
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

            .form-actions {
                flex-direction: column;
                gap: 1rem;
            }

            .submit-btn {
                width: 100%;
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
                <h2 class="form-title">Verify Email</h2>
            </div>

            <p class="verification-text">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </p>

            @if (session('status') == 'verification-link-sent')
            <div class="verification-text text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
            @endif

            <div class="form-actions">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="submit-btn">
                        {{ __('Resend Verification Email') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="ml-2">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-link">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
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