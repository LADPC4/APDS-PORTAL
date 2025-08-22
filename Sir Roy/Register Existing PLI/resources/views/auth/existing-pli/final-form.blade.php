<x-guest-layout>
    <div class="max-w-2xl bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg my-8">
        <h2 class="text-center text-2xl font-bold text-black dark:text-white mb-6">
            Complete Registration
        </h2>

        <!-- Institution Info Display -->
        <div class="bg-green-50 dark:bg-green-900 p-4 rounded-lg mb-6">
            <h3 class="text-lg font-semibold text-green-900 dark:text-green-100 mb-2">Institution Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <span class="text-green-700 dark:text-green-300">Name:</span>
                    <span class="font-medium text-green-900 dark:text-green-100 ml-2">{{ $existingPli->name }}</span>
                </div>
                <div>
                    <span class="text-green-700 dark:text-green-300">Loan Code:</span>
                    <span class="font-medium text-green-900 dark:text-green-100 ml-2">{{ $existingPli->loan_code }}</span>
                </div>
                <div>
                    <span class="text-green-700 dark:text-green-300">Classification:</span>
                    <span class="font-medium text-green-900 dark:text-green-100 ml-2">{{ $existingPli->classification->name ?? 'Not specified' }}</span>
                </div>
                <div>
                    <span class="text-green-700 dark:text-green-300">Status:</span>
                    <span class="font-medium text-green-900 dark:text-green-100 ml-2">{{ $existingPli->status }}</span>
                </div>
            </div>
            
            <!-- Regional Coverage Display -->
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
            <div class="mt-4">
                <span class="text-green-700 dark:text-green-300 text-sm">Regional Coverage:</span>
                <div class="mt-2 flex flex-wrap gap-2">
                    @foreach($activeRegions as $region)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                            {{ $region }}
                        </span>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <form method="POST" action="{{ route('register.existing.store') }}">
            @csrf

            <!-- Contact Information -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Contact Information</h3>
                
                <!-- Email and Contact Number -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <x-input-label for="email" :value="__('Official Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">This will be your login email</p>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="contact_number" :value="__('Contact Number')" />
                        <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" :value="old('contact_number')" required autocomplete="tel" />
                        <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                    </div>
                </div>

                <!-- Address -->
                <div>
                    <x-input-label for="address" :value="__('Address')" />
                    <textarea id="address" name="address" rows="3" required
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 dark:focus:ring-indigo-600">{{ old('address') }}</textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
            </div>

            <!-- Password Fields -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Account Security</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <x-primary-button class="w-full justify-center bg-[#2563EB] hover:bg-[#1D4ED8]">
                    {{ __('Complete Registration') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Back Button -->
        <div class="text-center">
            <a href="{{ route('register.existing.confirm') }}" 
               class="inline-block px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white">
                Back to Confirmation
            </a>
        </div>
    </div>
</x-guest-layout>