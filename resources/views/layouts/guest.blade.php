{{-- <!DOCTYPE html>
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
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'APDS-PORTAL') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    {{-- <style>
        .tom-select .ts-control > input {
            padding: 2px 0 !important;
        }
    </style> --}}


    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
{{-- <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] font-sans antialiased min-h-screen flex flex-col"> --}}
<body class="bg-gradient-to-b from-indigo-50 to-white dark:bg-[#0a0a0a] text-[#1b1b18] font-sans antialiased min-h-screen flex flex-col">
        

    <!-- ✅ Include the navigation bar -->
    @include('layouts.page-navigation')

    {{-- <!-- Logo / Optional Top Section -->
    <div class="pt-6 sm:pt-0 flex justify-center">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </div> --}}

    <!-- Auth Content Card -->
    <div class="w-full mx-auto min-h-[90vh] dark:bg-gray-800 shadow-lg rounded-xl"> 
        <div class="flex items-center justify-center min-h-[80vh]">
            {{ $slot }}
        </div>
    </div>

    <!-- Footer -->
    <div class="mt-auto">
        <x-footer :compact="$compactFooter ?? false" />
    </div>

</body>
</html>

