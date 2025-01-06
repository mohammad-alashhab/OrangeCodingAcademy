<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-duotone-solid.css" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-thin.css" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-solid.css" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-regular.css" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-light.css" />

    <!-- In your head section or before closing body tag -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.7/dist/cdn.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        #sidebar {
            transition: transform 0.3s ease-in-out;
        }

        #main-content {
            transition: margin-left 0.3s ease-in-out;
        }
    </style>
    <style>
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
    </style>
</head>

<body class="font-sans antialiased">
    <div class="flex">
        <!-- Sidebar -->
        @include('layouts.admin.sidebar')

        <!-- Main Content -->
        <div id="main-content" class="flex-1 min-h-screen bg-gray-100 dark:bg-gray-900 transition-all duration-300">
            <!-- Navigation -->
            @include('layouts.admin.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sidebar = document.getElementById("sidebar");
            const mainContent = document.getElementById("main-content");
            const navbarToggle = document.getElementById("navbar-sidebar-toggle");
            const sidebarToggleButtons = document.querySelectorAll("#navbar-sidebar-toggle");

            sidebarToggleButtons.forEach((button) => {
                button.addEventListener("click", () => {
                    sidebar.classList.toggle("-translate-x-full");

                    if (sidebar.classList.contains("-translate-x-full")) {
                        mainContent.style.marginLeft = "0";
                    } else {
                        mainContent.style.marginLeft = "16rem";
                    }
                });
            });

            if (window.innerWidth >= 768) {
                sidebar.classList.remove("-translate-x-full");
                mainContent.style.marginLeft = "16rem";
            } else {
                sidebar.classList.add("-translate-x-full");
                mainContent.style.marginLeft = "0";
            }
        });
    </script>

</body>

</html>