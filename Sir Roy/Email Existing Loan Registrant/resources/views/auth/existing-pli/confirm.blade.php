<x-guest-layout>
    <div class="max-w-2xl bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg my-8">
        <h2 class="text-center text-2xl font-bold text-black dark:text-white mb-6">
            Confirm Institution Details
        </h2>

        <div class="bg-blue-50 dark:bg-blue-900 p-6 rounded-lg mb-6">
            <p class="text-sm text-blue-800 dark:text-blue-200 mb-4">
                Please review the following institution details and confirm if this matches your institution:
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Institution Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Institution Name</label>
                    <p class="mt-1 text-sm text-gray-900 dark:text-white font-semibold">{{ $existingPli->name }}</p>
                </div>

                <!-- Loan Code -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Loan Code</label>
                    <p class="mt-1 text-sm text-gray-900 dark:text-white font-semibold">{{ $existingPli->loan_code }}</p>
                </div>

                <!-- Classification -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Classification</label>
                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $existingPli->classification->name ?? 'Not specified' }}</p>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $existingPli->status }}</p>
                </div>

                <!-- MAS Code -->
                @if($existingPli->mas_code)
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">MAS Code</label>
                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $existingPli->mas_code }}</p>
                </div>
                @endif

                <!-- Insurance Code -->
                @if($existingPli->insurance_code)
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Insurance Code</label>
                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $existingPli->insurance_code }}</p>
                </div>
                @endif
            </div>

            <!-- Regional Coverage -->
            @php
                $activeRegions = [];
                $regionNames = [
                    'CAR' => 'Cordillera Administrative Region',
                    'NCR' => 'National Capital Region',
                    'R01' => 'Region I: Ilocos Region',
                    'R02' => 'Region II: Cagayan Valley',
                    'R03' => 'Region III: Central Luzon',
                    'R04A' => 'Region IV-A: CALABARZON',
                    'R04B' => 'Region IV-B: MIMAROPA Region',
                    'R05' => 'Region V: Bicol Region',
                    'R06' => 'Region VI: Western Visayas',
                    'R07' => 'Region VII: Central Visayas',
                    'R08' => 'Region VIII: Eastern Visayas',
                    'R09' => 'Region IX: Zamboanga Peninsula',
                    'R10' => 'Region X: Northern Mindanao',
                    'R11' => 'Region XI: Davao Region',
                    'R12' => 'Region XII: SOCCSKSARGEN',
                    'R13' => 'Region XIII: Caraga'
                ];
                
                foreach($regionNames as $code => $name) {
                    if($existingPli->{$code . '_region'}) {
                        $activeRegions[] = $name;
                    }
                }
            @endphp

            @if(count($activeRegions) > 0)
            <div class="col-span-2 mt-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Regional Coverage</label>
                <div class="mt-1 flex flex-wrap gap-2">
                    @foreach($activeRegions as $region)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">
                            {{ $region }}
                        </span>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Email Verification Section -->
        <div class="text-center mb-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                Email Verification Required
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                To proceed with registration, we need to verify that you have access to this institution's official email address.
            </p>
            
            <div class="bg-blue-50 dark:bg-blue-900 p-4 rounded-lg mb-4">
                <p class="text-sm font-medium text-blue-800 dark:text-blue-200">
                    Verification email will be sent to:
                </p>
                <p class="text-lg font-semibold text-blue-900 dark:text-blue-100 mt-1">
                    {{ $existingPli->official_email }}
                </p>
            </div>
        </div>

        <!-- Send Verification Button -->
        <form method="POST" action="{{ route('register.existing.send-verification') }}">
            @csrf
            <div class="flex justify-center mb-4">
                <button type="submit" 
                        class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors">
                    Send Verification Email
                </button>
            </div>
        </form>

        <!-- Cancel Option -->
        <div class="text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                This is not your institution's email address?
            </p>
            <a href="{{ route('register.existing') }}" 
               class="inline-block px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-md transition-colors">
                Try Different Loan Code
            </a>
        </div>
    </div>
</x-guest-layout>