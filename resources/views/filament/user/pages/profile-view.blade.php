<x-filament::page>
    <div class="space-y-6">
        {{-- Institute Details --}}
        <x-filament::section>
            <x-slot name="heading">Institute Details</x-slot>
            <div class="w-full flex gap-6">
                <!-- Left Block -->
                <div class="flex-1">
                    <div class="flex gap-4">
                        <div class="flex-1 font-medium text-gray-600">Institute Name</div>
                        <div class="flex-1">{{ $this->name }}</div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1 font-medium text-gray-600">Official Email</div>
                        <div class="flex-1">{{ $this->email }}</div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1 font-medium text-gray-600">Contact Number</div>
                        <div class="flex-1">{{ $this->contact_number }}</div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1 font-medium text-gray-600">Main Office Address</div>
                        <div class="flex-1">{{ $this->address }}</div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1 font-medium text-gray-600">Status</div>
                        <div class="flex-1">
                            @if (in_array($this->status, ['for-evaluation', 'for-review', 'for-approval']))
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-gray-700 border border-gray-400 bg-gray-100 rounded-full">Under Review</span>
                            @elseif ($this->status === 'for-revision')
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-orange-700 border border-orange-400 bg-orange-100 rounded-full">For Revision</span>
                            @elseif ($this->status === 'approved')
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-green-700 border border-green-500 bg-green-100 rounded-full">Approved</span>
                            @elseif ($this->status === 'rejected')
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-red-700 border border-red-500 bg-red-100 rounded-full">Rejected</span>
                            @elseif ($this->status === 'pending')
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-yellow-700 border border-yellow-400 bg-yellow-100 rounded-full">Pending</span>
                            @elseif ($this->status === 'revoked')
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-gray-800 border border-gray-500 bg-gray-200 rounded-full">Revoked</span>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="flex gap-4">
                        <div class="flex-1 text-sm text-gray-800">
                            @if (in_array($this->status, ['for-evaluation', 'for-review', 'for-approval']))
                                The documents are under review. Document upload is temporarily disabled.
                            @elseif ($this->status === 'for-revision')
                                The user needs to comply with incomplete requirements or address remarks on the submitted documents.
                            @elseif ($this->status === 'pending')
                                Waiting for the user to complete all document requirements.
                            @else
                                —
                            @endif
                        </div>
                    </div> --}}
                </div>

                <!-- Right Block -->
                <div class="flex-1">
                    <div class="flex gap-4">
                        <div class="flex-1 font-medium text-gray-600">Classification</div>
                        <div class="flex-1">{{ optional($this->user->classification)->name ?? 'N/A' }}</div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1 font-medium text-gray-600">Regions Covered</div>
                        <div class="flex-1">
                            @if (!empty($this->regionNames))
                                @foreach ($this->regionNames as $region)
                                    <div>{{ $region }}</div>
                                @endforeach
                            @else
                                <div class="text-gray-500 italic">No regions assigned</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </x-filament::section>

        {{-- Authorized Representatives --}}
        <x-filament::section>
            <x-slot name="heading">Authorized Representatives</x-slot>

            <div class="overflow-x-auto">
                <div class="min-w-[800px] grid">
                    @php
                        $fields = [
                            'FN' => 'First Name',
                            'MN' => 'Middle Name',
                            'LN' => 'Last Name',
                            'Designation' => 'Designation',
                            'Contact' => 'Contact Number',
                            'Email' => 'Email',
                        ];
                    @endphp

                    @foreach ($fields as $key => $label)
                        <div class="grid grid-cols-12 items-start">
                            <div class="col-span-3 font-medium text-gray-600 pt-1">
                                {{ $label }}
                            </div>

                            @foreach ([1, 2, 3] as $rep)
                                <div class="col-span-3">
                                    {{ $this->{"AR{$rep}_$key"} ?? '—' }}
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            
            @if ($this->status === 'approved')
                <div class="pt-4 text-sm text-gray-600 italic">
                    Based on the recommendation of the Board in line with the Terms and Condition 
                    of the APDS Accreditation and Re-accreditation. 
                    <br>
                    Any edits or changes are subject to admin approval, 
                    and uploading of approval documents from the Board is required.
                </div>
            @endif
        </x-filament::section>

        {{-- Head Officers --}}
        {{-- <x-filament::section>
            <x-slot name="heading">Head Officers</x-slot>

            <div class="overflow-x-auto">
                <div class="min-w-[800px] grid">
                    @php
                        $fields = [
                            'fn' => 'First Name',
                            'mn' => 'Middle Name',
                            'ln' => 'Last Name',
                            'designation' => 'Designation',
                            'contact' => 'Contact Number',
                            'email' => 'Email',
                        ];
                    @endphp

                    @foreach ($fields as $key => $label)
                        <div class="grid grid-cols-12 items-start">
                            <div class="col-span-4 font-medium text-gray-600 pt-1">
                                {{ $label }}
                            </div>

                            @foreach ([1, 2] as $rep)
                                <div class="col-span-4">
                                    @if ($key === 'designation')
                                        @if ($this->{"ho{$rep}_designation"} === 'Other')
                                            {{ $this->{"ho{$rep}_designation_other"} ?? '—' }}
                                        @else
                                            {{ $this->{"ho{$rep}_designation"} ?? '—' }}
                                        @endif
                                    @else
                                        {{ $this->{"ho{$rep}_$key"} ?? '—' }}
                                    @endif
                                    
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </x-filament::section> --}}

        {{-- Compliance Officers --}}
        <x-filament::section>
            <x-slot name="heading">Compliance Officers</x-slot>

            <div class="overflow-x-auto">
                <div class="min-w-[800px] grid">
                    @php
                        $fields = [
                            'fn' => 'First Name',
                            'mn' => 'Middle Name',
                            'ln' => 'Last Name',
                            'designation' => 'Designation',
                            'contact' => 'Contact Number',
                            'email' => 'Email',
                        ];
                    @endphp

                    @foreach ($fields as $key => $label)
                        <div class="grid grid-cols-12 items-start">
                            <div class="col-span-4 font-medium text-gray-600 pt-1">
                                {{ $label }}
                            </div>

                            @foreach ([1, 2] as $rep)
                                <div class="col-span-4">
                                    {{ $this->{"co{$rep}_$key"} ?? '—' }}
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </x-filament::section>

        {{-- Loan Officers --}}
        <x-filament::section>
            <x-slot name="heading">Loan Officers</x-slot>

            <div class="overflow-x-auto">
                <div class="min-w-[800px] grid">
                    @php
                        $fields = [
                            'fn' => 'First Name',
                            'mn' => 'Middle Name',
                            'ln' => 'Last Name',
                            'designation' => 'Designation',
                            'contact' => 'Contact Number',
                            'email' => 'Email',
                        ];
                    @endphp

                    @foreach ($fields as $key => $label)
                        <div class="grid grid-cols-12 items-start">
                            <div class="col-span-4 font-medium text-gray-600 pt-1">
                                {{ $label }}
                            </div>

                            @foreach ([1, 2] as $rep)
                                <div class="col-span-4">
                                    {{ $this->{"lo{$rep}_$key"} ?? '—' }}
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </x-filament::section>
    </div>
</x-filament::page>
