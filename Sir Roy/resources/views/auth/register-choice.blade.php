<x-guest-layout>
    <div class="max-w-md bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg my-8">
        <h2 class="text-center text-2xl font-bold text-black dark:text-white mb-6">
            Choose Registration Type
        </h2>

        <div class="space-y-4">
            <!-- New Institution Registration -->
            <a href="{{ route('register.new') }}" 
               class="block w-full p-6 bg-blue-50 dark:bg-blue-900 border border-blue-200 dark:border-blue-700 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-800 transition-colors">
                <div class="text-center">
                    <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-100 mb-2">
                        New Institution
                    </h3>
                    <p class="text-sm text-blue-700 dark:text-blue-300">
                        Register a new institution that doesn't have a loan code yet
                    </p>
                </div>
            </a>

            <!-- Existing PLI Registration -->
            <a href="{{ route('register.existing') }}" 
               class="block w-full p-6 bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 rounded-lg hover:bg-green-100 dark:hover:bg-green-800 transition-colors">
                <div class="text-center">
                    <h3 class="text-lg font-semibold text-green-900 dark:text-green-100 mb-2">
                        Existing Institution
                    </h3>
                    <p class="text-sm text-green-700 dark:text-green-300">
                        Register with an existing loan code for institutions already in our system
                    </p>
                </div>
            </a>
        </div>

        <!-- Home Button -->
        <div class="mt-6 text-center">
            <a href="{{ url('/') }}" class="inline-block px-4 py-2 text-sm font-medium text-black bg-gray-200 rounded-md hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white">
                Back to Home
            </a>
        </div>
    </div>
</x-guest-layout>