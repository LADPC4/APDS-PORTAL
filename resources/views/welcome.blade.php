<x-guest-layout>
    <!-- ✅ Main Welcome Section -->
    <main class="flex items-center justify-center px-6 h-[100vh]">
        <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <section class="text-center md:text-left">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-6 leading-tight">
                    Partner Organization<br>
                    Registration, Transactions,<br>
                    and Accreditation Link
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

</x-guest-layout>
