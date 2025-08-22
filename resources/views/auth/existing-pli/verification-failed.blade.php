<x-guest-layout>
    <div class="max-w-md bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg my-8">
        <div class="text-center">
            <!-- Icon -->
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900 mb-4">
                <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                Verification Failed
            </h2>

            <!-- Error Message -->
            @if(session('error'))
                <div class="bg-red-50 dark:bg-red-900 p-4 rounded-lg mb-6">
                    <p class="text-red-800 dark:text-red-200 text-sm">
                        {{ session('error') }}
                    </p>
                </div>
            @endif

            <!-- Default Message -->
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                The verification link is either invalid or has expired. Please start the registration process again with your loan code.
            </p>

            <!-- Action Buttons -->
            <div class="space-y-3">
                <a href="{{ route('register.existing') }}" 
                   class="block w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors">
                    Start Registration Again
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