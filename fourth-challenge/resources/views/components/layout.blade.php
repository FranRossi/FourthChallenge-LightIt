<!doctype html>
<html class="h-full bg-gray-100">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://unpkg.com/@vuepic/vue-datepicker@latest"></script>
    <link rel="stylesheet" href="https://unpkg.com/@vuepic/vue-datepicker@latest/dist/main.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
{{--    Dropdown SELECT2--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



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

                            <a href="/airlines" class="text-white hover:bg-indigo-500 hover:bg-opacity-75 rounded-md px-3 py-2 text-sm font-medium">Airlines</a>

                            <a href="/flights" class="text-white hover:bg-indigo-500 hover:bg-opacity-75 rounded-md px-3 py-2 text-sm font-medium">Flights</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
            {{ $slot }}
        <x-flash/>
    </body>

</html>
