{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-guest-layout>
    <div class="w-full max-w-md bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg">
        <h2 class="text-center text-2xl font-bold text-black dark:text-white mb-6">
            Forgot Password
        </h2>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 text-center">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <x-primary-button class="w-full justify-center bg-[#2563EB] hover:bg-[#1D4ED8]">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Navigation Buttons in One Row -->
        <div class="mt-6 flex justify-between space-x-2">
            <a href="{{ route('login') }}"
                class="w-1/2 text-center px-4 py-2 text-sm font-medium text-black bg-secondary rounded-md hover:bg-secondary-dark dark:bg-secondary-dark dark:hover:bg-secondary">
                ← Back to Login
            </a>

            <a href="{{ url('/') }}"
                class="w-1/2 text-center px-4 py-2 text-sm font-medium text-black bg-secondary rounded-md hover:bg-secondary-dark dark:bg-secondary-dark dark:hover:bg-secondary">
                Back to Home
            </a>
        </div>
    </div>
</x-guest-layout>
