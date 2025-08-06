{{-- <x-filament::page>
    {{ $this->form }}    
</x-filament::page> --}}

<x-filament::page>
    {{-- Institute Profile Fieldset --}}
    <div class="filament-forms-fieldset filament-forms-fieldset-always-showing rounded-lg border border-gray-300 p-6 mb-8 bg-white shadow-sm">
        <legend class="filament-forms-fieldset-label text-lg font-bold text-gray-900 mb-4">
            Institute Profile
        </legend>

        {{-- Institute Details Section --}}
        <div class="filament-forms-section mb-6">
            {{-- <h3 class="filament-forms-section-header text-base font-semibold text-gray-700 mb-4">
                Institute Details
            </h3> --}}

            <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 text-gray-700">
                <div>
                    <dt class="font-medium text-sm text-red-900">Institute Name</dt>
                    <dd>{{ $this->name }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-sm">Classification</dt>
                    <dd>{{ optional($this->user->classification)->name ?? 'N/A' }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-sm">Regions</dt>
                    <dd>
                        @if (!empty($this->regionNames))
                            @foreach ($this->regionNames as $region)
                                <div>{{ $region }}</div>
                            @endforeach
                        @else
                            N/A
                        @endif
                    </dd>
                </div>
                <div>
                    <dt class="font-medium text-sm">Official Email Address</dt>
                    <dd>{{ $this->email }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-sm">Contact Number</dt>
                    <dd>{{ $this->contact_number }}</dd>
                </div>
                <div class="md:col-span-2">
                    <dt class="font-medium text-sm">Address</dt>
                    <dd>{{ $this->address }}</dd>
                </div>
            </dl>
        </div>
    </div>

    {{-- Authorized Representatives Fieldset --}}
    <div class="filament-forms-fieldset filament-forms-fieldset-always-showing rounded-lg border border-gray-300 p-6 bg-white shadow-sm">
        <legend class="filament-forms-fieldset-label text-lg font-bold text-gray-900 mb-4">
            Authorized Representatives
        </legend>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach (range(1, 3) as $i)
                <div class="filament-forms-section rounded border border-gray-200 p-4 bg-gray-50">
                    <h3 class="filament-forms-section-header text-base font-semibold text-gray-700 mb-3">
                        Authorized Representative {{ $i }}
                    </h3>
                    <dl class="text-gray-700 space-y-3 text-sm">
                        <div>
                            <dt class="font-medium">Full Name</dt>
                            <dd>{{ $this->{"AR{$i}_MN"} }} {{ $this->{"AR{$i}_FN"} }} {{ $this->{"AR{$i}_LN"} }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium">Designation or Position</dt>
                            <dd>{{ $this->{"AR{$i}_Designation"} }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium">Contact Number</dt>
                            <dd>{{ $this->{"AR{$i}_Contact"} }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium">Email</dt>
                            <dd>{{ $this->{"AR{$i}_Email"} }}</dd>
                        </div>
                    </dl>
                </div>
            @endforeach
        </div>
    </div>
</x-filament::page>
