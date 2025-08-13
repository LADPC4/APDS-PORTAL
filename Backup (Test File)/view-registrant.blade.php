@php
    use App\Models\Region;

    $regionCodes = is_array($record->region) ? $record->region : [];
    $regionNames = Region::whereIn('code', $regionCodes)->pluck('name')->toArray();
@endphp

<x-filament::page>
    <div class="space-y-6">
        {{-- Institute Details --}}
        <x-filament::section>
            <x-slot name="heading">Institute Details</x-slot>
            <div class="grid gap-4">
                <div class="grid grid-cols-12 gap-2 items-start">
                    <div class="col-span-3 font-medium text-gray-600">Institute Name</div>
                    <div class="col-span-9">{{ $record->name }}</div>
                </div>
                <div class="grid grid-cols-12 gap-2 items-start">
                    <div class="col-span-3 font-medium text-gray-600">Official Email</div>
                    <div class="col-span-9">{{ $record->email }}</div>
                </div>
                <div class="grid grid-cols-12 gap-2 items-start">
                    <div class="col-span-3 font-medium text-gray-600">Contact Number</div>
                    <div class="col-span-9">{{ $record->contact_number }}</div>
                </div>
                <div class="grid grid-cols-12 gap-2 items-start">
                    <div class="col-span-3 font-medium text-gray-600">Address</div>
                    <div class="col-span-9">{{ $record->address }}</div>
                </div>
                <div class="grid grid-cols-12 gap-2 items-start">
                    <div class="col-span-3 font-medium text-gray-600">Status</div>
                    <div class="col-span-9">{{ $record->status }}</div>
                </div>
                <div class="grid grid-cols-12 gap-2 items-start">
                    <div class="col-span-3 font-medium text-gray-600">Classification</div>
                    <div class="col-span-9">{{ optional($record->classification)->name }}</div>
                </div>
                <div class="grid grid-cols-12 gap-2 items-start">
                    <div class="col-span-3 font-medium text-gray-600">Regions Covered</div>
                    <div class="col-span-9 space-y-1">
                        @forelse ($regionNames as $regionName)
                            <div>{{ $regionName }}</div>
                        @empty
                            <div class="text-gray-500 italic">No regions assigned</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </x-filament::section>

        {{-- Authorized Representatives (Compact 4-column Layout) --}}
        <x-filament::section>
            <x-slot name="heading">Authorized Representatives</x-slot>

            <div class="overflow-x-auto">
                <div class="min-w-[800px] grid gap-4">
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
                        <div class="grid grid-cols-12 gap-2 items-start">
                            {{-- Label --}}
                            <div class="col-span-3 font-medium text-gray-600 pt-1">
                                {{ $label }}
                            </div>

                            {{-- Values for Rep 1 to 3 --}}
                            @foreach ([1, 2, 3] as $rep)
                                <div class="col-span-3">
                                    {{ $record->{"AR{$rep}_$key"} ?? '—' }}
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </x-filament::section>
    </div>
</x-filament::page>
