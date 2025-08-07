<x-filament::page>
    <div class="space-y-6">
        {{-- Institute Details --}}
        <x-filament::section>
            <x-slot name="heading">Institute Details</x-slot>
            <div class="grid gap-4">
                <div class="grid grid-cols-12 gap-2 items-center">
                    <div class="col-span-3 font-medium text-gray-600">Institute Name</div>
                    <div class="col-span-9">{{ $record->name }}</div>
                </div>
                <div class="grid grid-cols-12 gap-2 items-center">
                    <div class="col-span-3 font-medium text-gray-600">Classification</div>
                    <div class="col-span-9">{{ optional($record->classification)->name }}</div>
                </div>
                <div class="grid grid-cols-12 gap-2 items-center">
                    <div class="col-span-3 font-medium text-gray-600">Regions Covered</div>
                    <div class="col-span-9">{{ is_array($record->region) ? implode(', ', $record->region) : $record->region }}</div>
                </div>
                <div class="grid grid-cols-12 gap-2 items-center">
                    <div class="col-span-3 font-medium text-gray-600">Official Email</div>
                    <div class="col-span-9">{{ $record->email }}</div>
                </div>
                <div class="grid grid-cols-12 gap-2 items-center">
                    <div class="col-span-3 font-medium text-gray-600">Contact Number</div>
                    <div class="col-span-9">{{ $record->contact_number }}</div>
                </div>
                <div class="grid grid-cols-12 gap-2 items-center">
                    <div class="col-span-3 font-medium text-gray-600">Address</div>
                    <div class="col-span-9">{{ $record->address }}</div>
                </div>
            </div>
        </x-filament::section>

        {{-- Authorized Representatives --}}
        @foreach ([1, 2, 3] as $rep)
            <x-filament::section>
                <x-slot name="heading">Authorized Representative {{ $rep }}</x-slot>
                <div class="grid gap-4">
                    @php
                        $prefix = "AR{$rep}_";
                    @endphp

                    @foreach ([
                        'FN' => 'First Name',
                        'MN' => 'Middle Name',
                        'LN' => 'Last Name',
                        'Designation' => 'Designation',
                        'Contact' => 'Contact Number',
                        'Email' => 'Email',
                    ] as $key => $label)
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <div class="col-span-3 font-medium text-gray-600">{{ $label }}</div>
                            <div class="col-span-9">{{ $record->{$prefix . $key} }}</div>
                        </div>
                    @endforeach
                </div>
            </x-filament::section>
        @endforeach
    </div>
</x-filament::page>
