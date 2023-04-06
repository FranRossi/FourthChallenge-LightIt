<!doctype html>
<html class="h-full bg-gray-100">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <meta charset="utf-8">

    <title>AirTour</title>

    <style>
        html {
            scroll-behavior: smooth;
        }

        .clamp {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .clamp.one-line {
            -webkit-line-clamp: 1;
        }
    </style>
</head>

    <body class="h-full">
        <nav class="bg-indigo-600">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="/cities" class="bg-indigo-700 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Cities</a>

                            <a href="#" class="text-white hover:bg-indigo-500 hover:bg-opacity-75 rounded-md px-3 py-2 text-sm font-medium">Team</a>

                            <a href="#" class="text-white hover:bg-indigo-500 hover:bg-opacity-75 rounded-md px-3 py-2 text-sm font-medium">Projects</a>

                            <a href="#" class="text-white hover:bg-indigo-500 hover:bg-opacity-75 rounded-md px-3 py-2 text-sm font-medium">Calendar</a>

                            <a href="#" class="text-white hover:bg-indigo-500 hover:bg-opacity-75 rounded-md px-3 py-2 text-sm font-medium">Reports</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                <a href="#" class="bg-indigo-700 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>

                <a href="#" class="text-white hover:bg-indigo-500 hover:bg-opacity-75 block rounded-md px-3 py-2 text-base font-medium">Team</a>

                <a href="#" class="text-white hover:bg-indigo-500 hover:bg-opacity-75 block rounded-md px-3 py-2 text-base font-medium">Projects</a>

                <a href="#" class="text-white hover:bg-indigo-500 hover:bg-opacity-75 block rounded-md px-3 py-2 text-base font-medium">Calendar</a>

                <a href="#" class="text-white hover:bg-indigo-500 hover:bg-opacity-75 block rounded-md px-3 py-2 text-base font-medium">Reports</a>
            </div>
            <div class="border-t border-indigo-700 pt-4 pb-3">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-white">Tom Cook</div>
                        <div class="text-sm font-medium text-indigo-300">tom@example.com</div>
                    </div>
                    <button type="button" class="ml-auto flex-shrink-0 rounded-full border-2 border-transparent bg-indigo-600 p-1 text-indigo-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600">
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-indigo-500 hover:bg-opacity-75">Your Profile</a>

                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-indigo-500 hover:bg-opacity-75">Settings</a>

                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-indigo-500 hover:bg-opacity-75">Sign out</a>
                </div>
            </div>
        </div>
    </nav>
        {{ $slot }}

        <x-flash/>
    </body>
</html>
