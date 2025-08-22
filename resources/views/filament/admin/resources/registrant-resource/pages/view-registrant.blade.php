@php
    use App\Models\Region;

    $regionCodes = is_array($record->region) ? $record->region : [];
    $regionNames = Region::whereIn('code', $regionCodes)->pluck('name')->toArray();
    $userRole = auth()->user()->userrole ?? null;
@endphp

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
                        <div class="flex-1">{{ $record->name }}</div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1 font-medium text-gray-600">Official Email</div>
                        <div class="flex-1">{{ $record->email }}</div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1 font-medium text-gray-600">Contact Number</div>
                        <div class="flex-1">{{ $record->contact_number }}</div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1 font-medium text-gray-600">Address</div>
                        <div class="flex-1">{{ $record->address }}</div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1 font-medium text-gray-600">Status</div>
                        <div class="flex-1">
                            @if (in_array($record->status, ['for-evaluation', 'for-review', 'for-approval']))
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-gray-700 border border-gray-400 bg-gray-100 rounded-full">Under Review</span>
                            @elseif ($record->status === 'for-revision')
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-orange-700 border border-orange-400 bg-orange-100 rounded-full">For Revision</span>
                            @elseif ($record->status === 'approved')
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-green-700 border border-green-500 bg-green-100 rounded-full">Approved</span>
                            @elseif ($record->status === 'rejected')
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-red-700 border border-red-500 bg-red-100 rounded-full">Rejected</span>
                            @elseif ($record->status === 'pending')
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-yellow-700 border border-yellow-400 bg-yellow-100 rounded-full">Pending</span>
                            @elseif ($record->status === 'revoked')
                                <span class="inline-block px-2 py-0.5 text-xs font-medium text-gray-800 border border-gray-500 bg-gray-200 rounded-full">Revoked</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right Block -->
                <div class="flex-1">
                    <div class="flex gap-4">
                        <div class="flex-1 font-medium text-gray-600">Classification</div>
                        <div class="flex-1">{{ optional($record->classification)->name }}</div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1 font-medium text-gray-600">Regions Covered</div>
                        <div class="flex-1">
                            @forelse ($regionNames as $regionName)
                                <div>{{ $regionName }}</div>
                            @empty
                                <div class="text-gray-500 italic">No regions assigned</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </x-filament::section>

        {{-- Authorized Representatives (Compact 4-column Layout) --}}
        {{-- <x-filament::section>
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
                        <div class="grid grid-cols-12 gap-2 items-start">
                            <div class="col-span-3 font-medium text-gray-600 pt-1">
                                {{ $label }}
                            </div>

                            @foreach ([1, 2, 3] as $rep)
                                <div class="col-span-3">
                                    {{ $record->{"AR{$rep}_$key"} ?? '—' }}
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </x-filament::section> --}}

        {{-- Head Officers --}}
        <x-filament::section>
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
                                    {{-- {{ $record->{"ho{$rep}_$key"} ?? '—' }} --}}
                                    @if ($key === 'designation')
                                        @if ($record->{"ho{$rep}_designation"} === 'Other')
                                            {{ $record->{"ho{$rep}_designation_other"} ?? '—' }}
                                        @else
                                            {{ $record->{"ho{$rep}_designation"} ?? '—' }}
                                        @endif
                                    @else
                                        {{ $record->{"ho{$rep}_$key"} ?? '—' }}
                                    @endif
                                    
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </x-filament::section>

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
                                    {{ $record->{"co{$rep}_$key"} ?? '—' }}
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
                                    {{ $record->{"lo{$rep}_$key"} ?? '—' }}
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </x-filament::section>

        {{-- Documents Submitted --}}
        <div class="overflow-x-auto">
            <div class="min-w-[900px] border rounded-md shadow-sm">

                {{-- Table Header --}}
                <div class="grid grid-cols-12 text-sm bg-gray-100 border-b font-semibold text-gray-800 uppercase">
                    <div class="col-span-4 px-4 py-3 text-left">Document Name</div>
                    <div class="col-span-4 px-4 py-3 text-left">Remark</div>
                    <div class="col-span-2 px-4 py-3 text-center">Status</div>
                    <div class="col-span-1 px-4 py-3 text-center">View</div>
                    <div class="col-span-1 px-4 py-3 text-center">Start Review</div>
                </div>

                {{-- Document Rows --}}
                @forelse ($record->documents as $document)
                    <div class="grid grid-cols-12 text-sm border-b hover:bg-gray-50 items-center">
                        {{-- Name --}}
                        <div class="col-span-4 px-4 py-3">
                            {{ $document->name }}
                        </div>

                        {{-- Remark --}}
                        <div class="col-span-4 px-4 py-3 text-gray-700">
                            {{-- {{ $document->remark ?? '—' }} --}}
                            {{ empty($document->remark) ? '—' : $document->remark }}
                        </div>

                        {{-- Status --}}
                        <div class="col-span-2 px-4 py-3 text-center">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-50 text-yellow-800 border-yellow-400',
                                    'for-revision' => 'bg-orange-50 text-orange-800 border-orange-400',
                                    'approved' => 'bg-green-50 text-green-800 border-green-500',
                                    'rejected' => 'bg-red-50 text-red-800 border-red-500',
                                ];
                                $statusClass = $statusColors[strtolower($document->status)] ?? 'bg-gray-50 text-gray-800 border-gray-400';
                            @endphp
                            <span class="inline-block px-3 py-1 text-xs font-semibold border rounded-full {{ $statusClass }}">
                                {{ strtoupper($document->status) }}
                            </span>
                        </div>

                        {{-- View --}}
                        <div class="col-span-1 px-4 py-3 text-center">
                            @if ($document->file_path)
                                <a href="{{ $document->file_url }}" target="_blank" class="text-blue-600 hover:underline">View</a>
                            @else
                                <span class="text-gray-400 italic">No file</span>
                            @endif
                        </div>

                        {{-- Start Review --}}
                        <div class="col-span-1 px-4 py-3 text-center">
                            
                            {{-- @if (
                                $document->status !== 'under-review' ||
                                ($document->status === 'Evaluated' && in_array($userRole, ['Reviewer', 'Approver']))
                            )
                                <form action="{{ route('documents.startReview', $document->id) }}" method="POST">
                                    @csrf
                                    <button 
                                        type="submit"
                                        class="px-3 py-1 text-xs font-semibold"
                                    >
                                        Start Review
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-400 italic">
                                    {{ $document->status === 'under-review' ? 'Under Review' : 'Done' }}
                                </span>
                            @endif --}}


                            {{-- Current --}}
                            {{-- @if (!in_array($document->status, ['under-review', 'Evaluated', 'Reviewed', 'Approved']))
                                <form action="{{ route('documents.startReview', $document->id) }}" method="POST">
                                    @csrf
                                    <button 
                                        type="submit"
                                        class="px-3 py-1 text-xs font-semibold"
                                    >
                                        Start Review
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-400 italic">
                                    {{ $document->status === 'under-review' ? 'Under Review' : 'Done' }}
                                </span>
                            @endif --}}

                            @if ($userRole === 'Evaluator')
                                @if (!in_array($document->status, ['under-review', 'Evaluated', 'Reviewed', 'Approved']))
                                    <form action="{{ route('documents.startReview', $document->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-3 py-1 text-xs font-semibold">
                                            Start Review
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400 italic">
                                        {{ $document->status === 'under-review' ? 'Under Review' : 'Done' }}
                                    </span>
                                @endif

                            @elseif ($userRole === 'Reviewer')
                                @if (!in_array($document->status, ['under-review', 'Reviewed', 'Approved']))
                                    <form action="{{ route('documents.startReview', $document->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-3 py-1 text-xs font-semibold">
                                            Start Review
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400 italic">
                                        {{ $document->status === 'under-review' ? 'Under Review' : 'Done' }}
                                    </span>
                                @endif

                            @elseif ($userRole === 'Approver')
                                @if (!in_array($document->status, ['under-review', 'Approved']))
                                    <form action="{{ route('documents.startReview', $document->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-3 py-1 text-xs font-semibold">
                                            Start Review
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400 italic">
                                        {{ $document->status === 'under-review' ? 'Under Review' : 'Done' }}
                                    </span>
                                @endif
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="px-4 py-3 text-gray-500 italic">
                        No documents submitted yet.
                    </div>
                @endforelse
            </div>
        </div>






    </div>
</x-filament::page>
