<x-guest-layout>
    <div class="max-w-md bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg my-8">
        <div class="text-center">
            <!-- Icon -->
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 mb-4">
                <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                Verification Email Sent
            </h2>

            <!-- Message -->
            <div class="text-gray-600 dark:text-gray-400 mb-6">
                <p class="mb-4">
                    We've sent a verification email to:
                </p>
                <p class="font-semibold text-blue-600 dark:text-blue-400 text-lg">
                    {{ $existingPli->official_email }}
                </p>
                <p class="mt-4 text-sm">
                    Please check your inbox and click the verification link to continue with your registration.
                </p>
            </div>

            <!-- Instructions -->
            <div class="bg-yellow-50 dark:bg-yellow-900 p-4 rounded-lg mb-6">
                <p class="text-yellow-800 dark:text-yellow-200 text-sm">
                    <strong>Important:</strong> The verification link will expire in 60 minutes. 
                    If you don't see the email, please check your spam folder.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3">
                <form method="POST" action="{{ route('register.existing.send-verification') }}">
                    @csrf
                    <button type="submit" 
                            class="block w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors">
                        Resend Verification Email
                    </button>
                </form>
                
                <a href="{{ route('register.existing') }}" 
                   class="block w-full px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-md transition-colors">
                    Try Different Loan Code
                </a>
                
                <a href="{{ url('/') }}" 
                   class="block w-full px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 font-medium rounded-md transition-colors dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>