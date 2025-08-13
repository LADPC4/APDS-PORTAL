<x-guest-layout>
    <div class="max-w-md bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg my-8">
        <h2 class="text-center text-2xl font-bold text-black dark:text-white mb-6">
            Enter Loan Code
        </h2>

        <form method="POST" action="{{ route('register.existing.validate') }}">
            @csrf

            <div class="mb-6">
                <x-input-label for="loan_code" :value="__('Loan Code')" />
                <x-text-input id="loan_code" 
                    class="block mt-1 w-full" 
                    type="text" 
                    name="loan_code" 
                    :value="old('loan_code')" 
                    required 
                    autofocus 
                    placeholder="Enter your institution's loan code" />
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Please enter the loan code assigned to your institution.
                </p>
                <x-input-error :messages="$errors->get('loan_code')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <x-primary-button class="w-full justify-center bg-[#2563EB] hover:bg-[#1D4ED8]">
                    {{ __('Validate Loan Code') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Back Buttons -->
        <div class="flex gap-2">
            <a href="{{ route('register') }}" 
               class="flex-1 text-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white">
                Back to Choice
            </a>
            <a href="{{ url('/') }}" 
               class="flex-1 text-center px-4 py-2 text-sm font-medium text-black bg-gray-100 rounded-md hover:bg-gray-200 dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                Back to Home
            </a>
        </div>
    </div>
</x-guest-layout>