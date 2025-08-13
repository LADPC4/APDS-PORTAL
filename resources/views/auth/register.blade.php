<x-guest-layout>
    <div class="max-w-2xl bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg my-8">
        <h2 class="text-center text-2xl font-bold text-black dark:text-white mb-6">
            Register Institution
        </h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Institution Name -->
            <div>
                <x-input-label for="name" :value="__('Institution Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Please provide the complete name of the institution. (No abbreviations)</p>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>            

            <!-- Official Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Official Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">This email address will be permanently associated with your registration and cannot be changed later.</p>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            
            <div class="mt-4 flex space-x-2">
                <!-- Classification -->
                <div class="w-1/2">
                    <x-input-label for="classification_id" :value="__('Classification')" />
                    <select id="classification_id" name="classification_id" required
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                        <option value="">Select Classification</option>
                        {{-- <option value="Banks">Banks</option>
                        <option value="Cooperatives">Cooperatives</option>
                        <option value="Cooperative Banks">Cooperative Banks</option>
                        <option value="Insurance Companies">Insurance Companies</option>
                        <option value="Teachers Association">Teachers Association</option>
                        <option value="Savings and Loans Associations">Savings and Loans Associations</option> --}}
                        
                        @foreach($classifications as $classification)
                            <option value="{{ $classification->id }}" @selected(old('classification') == $classification->id)>
                                {{ $classification->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('classification_id')" class="mt-2" />
                </div>

                <!-- Contact Number -->
                <div class="w-1/2">
                    <x-input-label for="contact_number" :value="__('Contact Number')" />
                    <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" :value="old('contact_number')" required autocomplete="tel" />
                    <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                </div>
            </div>

            <!-- Region -->
            <div class="mt-4">
                <x-input-label for="region" :value="__('Region(s)')" />
                <select id="region" name="region[]" multiple 
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                    <option value="">Select Region(s)</option>
                    @foreach($regions as $region)
                        <option value="{{ $region->code }}" @selected(collect(old('region'))->contains($region->code))>
                            {{ $region->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('region')" class="mt-2" /> 
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Main Office Address')" />
                <textarea id="address" name="address" rows="3"
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 dark:focus:ring-indigo-600">{{ old('address') }}</textarea>
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Password and Confirm Password -->
            <div class="mt-4 flex space-x-2">
                <div class="w-1/2">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <x-primary-button class="w-full justify-center bg-[#2563EB] hover:bg-[#1D4ED8]">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Home Button -->
        <div class="mt-4 text-center">
            <a href="{{ url('/') }}" class="inline-block px-4 py-2 text-sm font-medium text-black bg-secondary rounded-md hover:bg-secondary-dark dark:bg-secondary-dark dark:hover:bg-secondary">
                {{-- ←  --}}
                Back to Home
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new TomSelect('#region', {
                plugins: ['remove_button'],
                persist: false,
                create: false,
            });
        });
    </script>
</x-guest-layout>
