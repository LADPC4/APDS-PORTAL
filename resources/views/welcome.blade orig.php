<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DPLIAS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen flex flex-col">
    <!-- Header -->
    @include('layouts.page-navigation')


    <!-- ✅ Main Welcome Section -->
    <main class="bg-gradient-to-b from-indigo-50 to-white flex items-center justify-center px-6 h-[80vh]">
        <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <section class="text-center md:text-left">
                <h1 class="text-5xl font-extrabold text-gray-800 mb-6 leading-tight">
                    DepEd Private <br>
                    Lending Institutions <br>
                    Accreditation System
                </h1>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="{{ route('login') }}" class="bg-[#034f8b] hover:bg-[#0364b1] text-white font-semibold py-3 px-6 rounded-lg flex items-center gap-2">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="border-2 border-[#034f8b] text-[#034f8b] hover:bg-indigo-50 font-semibold py-3 px-6 rounded-lg flex items-center gap-2">
                        Register
                    </a>
                </div>
            </section>
            <section class="flex justify-center">
                {{-- <img src="{{ asset('images/S4.png') }}" alt="Illustration" class="w-full max-w-lg object-cover" loading="lazy"> --}}
            </section>
        </div>
    </main>
    

    <!-- Footer always at bottom -->
    <x-footer :compact="$compactFooter ?? false" />

</body>
</html>
