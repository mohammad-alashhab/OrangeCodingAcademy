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
</head>

<body class="font-sans antialiased">
    <div class="flex">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div id="main-content" class="flex-1 min-h-screen bg-gray-100 dark:bg-gray-900 transition-all duration-300">
            <!-- Navigation -->
            @include('layouts.navigation')

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
    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const html = document.documentElement;

        // Check localStorage for theme preference
        if (localStorage.getItem('theme') === 'dark') {
            html.classList.add('dark');
        }

        themeToggle.addEventListener('click', () => {
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    </script>

</body>

</html>