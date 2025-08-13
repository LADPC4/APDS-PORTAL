<x-guest-layout>
    <div class="max-w-md bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg my-8">
        <div class="text-center">
            <!-- Icon -->
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900 mb-4">
                <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                Registration Canceled
            </h2>

            <!-- Message -->
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                Your registration has been canceled. The institution details did not match your expectations.
            </p>

            <!-- Action Buttons -->
            <div class="space-y-3">
                <a href="{{ route('register.existing') }}" 
                   class="block w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors">
                    Try Different Loan Code
                </a>
                
                <a href="{{ route('register') }}" 
                   class="block w-full px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-md transition-colors">
                    Choose Different Registration Type
                </a>
                
                <a href="{{ url('/') }}" 
                   class="block w-full px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 font-medium rounded-md transition-colors dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>