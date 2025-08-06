
<!-- Header Navigation -->
<nav class="bg-[#1E3A8A] w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="flex items-center space-x-2">
                        {{-- <img src="{{ asset('images/DepEd-Logo-w.png') }}" alt="Logo" class="h-10 w-auto"> --}}
                        <span class="text-3xl font-bold tracking-wide text-white">
                            APDS-PORTAL
                        </span>
                    </a>
                </div>

                <!-- Nav Links -->
                <div class="hidden space-x-8 sm:ml-10 sm:flex">
                    {{-- <a href="/" class="inline-flex items-center h-full px-1 border-b-4 {{ request()->is('/') ? 'border-white text-white' : 'border-transparent text-white hover:border-white hover:text-gray-200' }}">
                        Home
                    </a> --}}
                    <a href="#" class="inline-flex items-center px-1 pt-1 border-b-4 {{ request()->is('faqs') ? 'border-white text-white' : 'border-transparent text-white hover:border-white hover:text-gray-200' }}">
                        FAQs
                    </a>
                    <a href="{{ route('data-privacy') }}" class="inline-flex items-center px-1 pt-1 border-b-4 {{ request()->is('dataPrivacy') ? 'border-white text-white' : 'border-transparent text-white hover:border-white hover:text-gray-200' }}">
                        Data Privacy
                    </a>
                    <a href="#" class="inline-flex items-center px-1 pt-1 border-b-4 {{ request()->is('contactUs') ? 'border-white text-white' : 'border-transparent text-white hover:border-white hover:text-gray-200' }}">
                        Contact Us
                    </a>
                </div>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-block px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-[#2563EB] hover:bg-[#1D4ED8]">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-[#1E3A8A] text-sm font-medium rounded-md text-[#1E3A8A] bg-white hover:bg-[#E0E7FF] transition">
                        Register
                    </a>
                    <a href="{{ route('login') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-[#2563EB] hover:bg-[#1D4ED8]">
                        Login
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="-mr-2 flex items-center sm:hidden" x-data="{ open: false }">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-200 hover:bg-blue-900">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Mobile Menu -->
                <div x-show="open" class="sm:hidden absolute top-16 right-0 left-0 bg-[#1E3A8A] border-t border-white z-50">
                    <div class="pt-2 pb-3 space-y-1">
                        <a href="#" class="block pl-4 pr-4 py-2 border-l-4 text-base font-medium text-white hover:bg-blue-900 hover:border-white">
                            FAQs
                        </a>
                        <a href="#" class="block pl-4 pr-4 py-2 border-l-4 text-base font-medium text-white hover:bg-blue-900 hover:border-white">
                            Data Privacy
                        </a>
                        <a href="#" class="block pl-4 pr-4 py-2 border-l-4 text-base font-medium text-white hover:bg-blue-900 hover:border-white">
                            Contact Us
                        </a>
                    </div>
                    <div class="pt-2 pb-3 space-y-1 border-t border-white">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="block pl-4 pr-4 py-2 text-base font-medium text-white hover:bg-blue-900">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block pl-4 pr-4 py-2 text-base font-medium text-white hover:bg-blue-900">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="block pl-4 pr-4 py-2 text-base font-medium text-white hover:bg-blue-900">
                                Register
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
