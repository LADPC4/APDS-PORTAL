<x-filament-panels::page>
{{-- <div class="fi-section-content p-4 rounded-lg border">
    <div class="flex items-center gap-x-3">
        <img class="fi-avatar object-cover object-center fi-circular rounded-full h-10 w-10 fi-user-avatar"
             src="https://ui-avatars.com/api/?name={{ urlencode($user->name ?? 'Admin') }}&color=FFFFFF&background=09090b"
             alt="Avatar of {{ $user->name }}">

        <div class="flex-1">
            <h2 class="grid flex-1 text-base font-semibold leading-6 text-gray-950 dark:text-white">
                {{ $user->name }}
            </h2>

            <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ $user->email }}
            </p>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="my-auto">
            @csrf
            <button type="submit"
                    class="fi-icon-btn relative flex items-center justify-center rounded-lg outline-none transition duration-75 focus-visible:ring-2 -m-2 h-9 w-9 text-gray-400 hover:text-gray-500 focus-visible:ring-primary-600 dark:text-gray-500 dark:hover:text-gray-400 dark:focus-visible:ring-primary-500 fi-color-gray sm:hidden"
                    title="Sign out">
                <span class="sr-only">Sign out</span>
                <svg class="fi-icon-btn-icon h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd"
                          d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z"
                          clip-rule="evenodd"></path>
                    <path fill-rule="evenodd"
                          d="M19 10a.75.75 0 0 0-.75-.75H8.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 19 10Z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <button
                class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg  fi-btn-color-gray fi-color-gray fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm hidden sm:inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20"
                type="submit">
                <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd"
                          d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z"
                          clip-rule="evenodd"></path>
                    <path fill-rule="evenodd"
                          d="M19 10a.75.75 0 0 0-.75-.75H8.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 19 10Z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="fi-btn-label">Sign out</span>
            </button>
        </form>
    </div>
</div> --}}



    {{-- Notification Section --}}
    {{-- <section class="mt-6 p-4 rounded-lg border">
        <h2 class="text-xl font-bold mb-4">Notifications:</h2>
        <fieldset class="border border-gray-300 rounded-md pt-2 px-4 pb-4">
            <legend class="font-semibold text-gray-700">
                Accreditation Status:
                <span>
                    @switch($user->status)
                        @case('for-evaluation')
                        @case('for-review')
                        @case('for-approval')
                        @case('under-review')
                            <span class="text-gray-500">Under Review</span>
                            @break

                        @case('pending')
                            <span class="text-orange-500">Pending for Completion</span>
                            @break

                        @case('for-revision')
                            <span class="text-yellow-500">For Revision</span>
                            @break

                        @case('approved')
                            <span class="text-green-600">Approved</span>
                            @break

                        @case('rejected')
                            <span class="text-red-600">Rejected</span>
                            @break

                        @default
                            <span class="text-gray-400">Unknown</span>
                    @endswitch
                </span>
            </legend>

            <div class="mt-2 text-sm text-gray-600">
                @switch($user->status)
                    @case('for-evaluation')
                    @case('for-review')
                    @case('for-approval')
                        <p>An Administrator is validating your submitted documents.</p>
                        <p>This process usually takes 2–3 business days.</p>
                        @break

                    @case('pending')
                        <p>Please complete your required documents.</p>
                        @break

                    @case('for-revision')
                        <p>Your submission requires revision. Please check the notes and update your documents.</p>
                        @break

                    @case('approved')
                        <p>Your accreditation has been approved. Congratulations!</p>
                        @break

                    @case('rejected')
                        <p>Your accreditation was rejected. Please review the feedback and resubmit.</p>
                        @break

                    @default
                        <p>Status is unknown. Please contact support.</p>
                @endswitch
            </div>
        </fieldset>

    </section> --}}

{{-- <section class="mt-6 p-6 rounded-lg border bg-white">
    <h2 class="text-xl font-bold mb-6">Application Progress</h2>
    @php
        $documents = $user->documents;
        $hasDocForRevision = $documents->where('status', 'for-revision')->isNotEmpty();

        // Define steps in order
        $steps = [
            'Pending',
            'Under Evaluation',
            'Evaluation Pending',
            'Under Review',
            'Review Pending',
            'Under Approval',
            'Approval Pending',
            'Final Decision',
        ];

        // Determine current step
        if ($user->status === 'pending' && $hasDocForRevision) {
            // Special pending cases
            if ($user->evaluator_id === null) {
                $currentStep = 3; // Evaluation Pending
                $subStatusNote = 'Evaluation Pending: Registrant action required. Please address the remarks and resubmit the corrected documents.';
            } elseif ($user->reviewer_id === null) {
                $currentStep = 5; // Review Pending
                $subStatusNote = 'Review Pending: Registrant action required. Please address the remarks and resubmit the corrected documents.';
            } elseif ($user->approver_id === null) {
                $currentStep = 7; // Approval Pending
                $subStatusNote = 'Approval Pending: Registrant action required. Please address the remarks and resubmit the corrected documents.';
            } else {
                $currentStep = 1; // fallback, shouldn't happen
                $subStatusNote = null;
            }
        } else {
            // Normal workflow
            $currentStep = match($user->status) {
                'pending' => 1,
                'for-evaluation' => 2,
                'for-review' => 4,
                'for-approval' => 6,
                'approved', 'rejected' => 8,
                default => 1,
            };
            $subStatusNote = null;
        }

        // Notes for each step
        $stepNotes = [
            'Pending' => 'Registrant action required. Please submit all necessary documents.',
            'Under Evaluation' => 'Your profile and submitted documents are currently under evaluation.',
            'Evaluation Pending' => 'Registrant action required. Please address the remarks and resubmit the corrected documents.',
            'Under Review' => 'Your profile and documents have been forwarded for review.',
            'Review Pending' => 'Registrant action required. Please address the remarks and resubmit the corrected documents.',
            'Under Approval' => 'Your profile and documents are under approval process.',
            'Approval Pending' => 'Registrant action required. Please address the remarks and resubmit the corrected documents.',
            'Final Decision' => $user->status === 'approved'
                ? 'Your application has been approved.'
                : 'Your application has been rejected.',
        ];
    @endphp


    <div class="relative flex justify-between">
        <div class="absolute top-5 left-0 right-0 h-0.5 bg-gray-300"></div>

        <div class="absolute top-5 left-0 h-0.5 bg-green-500 transition-all duration-500"
             style="width: calc((100% - 2.5rem) / {{ count($steps) - 1 }} * {{ $currentStep - 1 }} + 0.5rem);">
        </div>

        @foreach ($steps as $index => $step)
            <div class="flex flex-col items-center relative z-10 w-full">
                <div class="w-10 h-10 flex items-center justify-center rounded-full font-semibold
                    {{ $index + 1 < $currentStep ? 'bg-green-500 text-white' : '' }}
                    {{ $index + 1 === $currentStep ? 'bg-blue-600 text-white' : '' }}
                    {{ $index + 1 > $currentStep ? 'bg-gray-300 text-gray-600' : '' }}">
                    
                    @if ($index + 1 < $currentStep)
                        ✓
                    @else
                        {{ $index + 1 }}
                    @endif
                </div>
                <span class="mt-2 text-sm font-medium text-center
                    {{ $index + 1 === $currentStep ? 'text-blue-600' : 'text-gray-600' }}">
                    {{ $step }}
                </span>
            </div>
        @endforeach
    </div>
    <div class="mt-6 p-4 bg-gray-50 border rounded-lg text-sm text-gray-700">
        @if($subStatusNote)
            {{ $subStatusNote }}
        @else
            {{ $stepNotes[$steps[$currentStep-1]] ?? '' }}
        @endif
    </div>
</section> --}}



{{-- <section class="p-6 rounded-lg border bg-white"> --}}
<x-filament::section>
    <x-slot name="heading">
        Accreditation Status:
            @switch($user->status)
                @case('for-evaluation')
                @case('for-review')
                @case('for-approval')

                @case('pending')
                    <span class="text-orange-500">Action Required!</span>
                    @break

                @case('approved')
                    <span class="text-green-600">Approved</span>
                    @break

                @case('rejected')
                    <span class="text-red-600">Rejected</span>
                    @break

                @default
                    <span class="text-gray-400">Unknown</span>
            @endswitch
        </span>
    </x-slot>

    @php
        $documents = $user->documents;
        $hasDocForRevision = $documents->where('status', 'for-revision')->isNotEmpty();

        // Base steps
        $steps = [
            'Pending',
            'Under Evaluation',
            'Under Review',
            'Under Approval',
            'Result',
        ];

        // Determine if a special step should be inserted
        $specialStep = null;
        $subStatusNote = null;

        if ($user->status === 'pending' && $hasDocForRevision) {
            if ($user->evaluator_id === null) {
                $specialStep = 'Registrant-Evaluation Pending';
                $subStatusNote = 'Registrant action required. Please address the remarks and resubmit the corrected documents.';
            } elseif ($user->reviewer_id === null) {
                $specialStep = 'Registrant-Review Pending';
                $subStatusNote = 'Registrant action required. Please address the remarks and resubmit the corrected documents.';
            } elseif ($user->approver_id === null) {
                $specialStep = 'Registrant-Approval Pending';
                $subStatusNote = 'Registrant action required. Please address the remarks and resubmit the corrected documents.';
            }
        }

        // Insert the special step only if it exists
        if ($specialStep) {
            switch ($specialStep) {
                case 'Registrant-Evaluation Pending':
                    array_splice($steps, 1, 0, [$specialStep]);
                    break;
                case 'Registrant-Review Pending':
                    array_splice($steps, 2, 0, [$specialStep]);
                    break;
                case 'Registrant-Approval Pending':
                    array_splice($steps, 3, 0, [$specialStep]);
                    break;
            }
        }

        // Determine current step index
        $currentStep = match($user->status) {
            'pending' => 1,
            'for-evaluation' => 2,
            'for-review' => 3,
            'for-approval' => 4,
            'approved', 'rejected' => count($steps),
            default => 1,
        };

        // Highlight special step if exists
        if ($specialStep) {
            $currentStep = array_search($specialStep, $steps) + 1;
        }

        // Step notes
        $stepNotes = [
            'Pending' => 'Registrant action required. Please submit all necessary documents.',
            'Under Evaluation' => 'Your profile and submitted documents are currently under evaluation.',
            'Evaluation Pending' => 'Registrant action required. Please address the remarks and resubmit the corrected documents.',
            'Under Review' => 'Your profile and documents have been forwarded for review.',
            'Review Pending' => 'Registrant action required. Please address the remarks and resubmit the corrected documents.',
            'Under Approval' => 'Your profile and documents are under approval process.',
            'Approval Pending' => 'Registrant action required. Please address the remarks and resubmit the corrected documents.',
            'Result' => $user->status === 'approved'
                ? 'Your application has been approved.'
                : 'Your application has been rejected.',
        ];
    @endphp

    <div class="relative flex justify-between">
        {{-- Connector line --}}
        <div class="absolute top-5 left-0 right-0 h-0.5 bg-gray-300"></div>
        <div class="absolute top-5 left-0 h-0.5 bg-green-500 transition-all duration-500"
             style="width: calc((100% - 2.5rem) / {{ count($steps) - 1 }} * {{ $currentStep - 1 }} + 0.5rem);">
        </div>

        @foreach ($steps as $index => $step)
            <div class="flex flex-col items-center relative z-10 w-full">
                {{-- Step Circle --}}
                <div class="w-10 h-10 flex items-center justify-center rounded-full font-semibold
                    {{ $index + 1 < $currentStep ? 'bg-green-500 text-white' : '' }}
                    {{ $index + 1 === $currentStep ? 'bg-yellow-600 text-white' : '' }}
                    {{ $index + 1 > $currentStep ? 'bg-gray-300 text-gray-600' : '' }}">
                    @if ($step === 'Result')
                        @if ($user->status === 'approved')
                            <span class="text-white">✓</span>
                            {{-- <div class="w-10 h-10 flex items-center justify-center rounded-full bg-green-500 font-semibold"></div> --}}
                        @elseif ($user->status === 'rejected')
                            <span class="text-white">✗</span>
                            {{-- <div class="w-10 h-10 flex items-center justify-center rounded-full bg-red-600 font-semibold"></div> --}}
                        @else
                            {{ $index + 1 }}
                        @endif
                    @elseif ($index + 1 < $currentStep)
                        ✓
                    @elseif ($step === $specialStep)
                        {{-- Show action icon for special step --}}
                        !
                    @else
                        {{ $index + 1 }}
                    @endif
                </div>

                {{-- Step Label --}}
                <span class="mt-2 text-sm font-medium text-center
                    {{ $index + 1 === $currentStep ? 'text-blue-600' : 'text-gray-600' }}">
                    {{ $step }}
                </span>
            </div>
        @endforeach
    </div>

    {{-- Step Note --}}
    <div class="mt-6 p-4 bg-gray-50 border rounded-lg text-sm text-gray-700">
        {{ $subStatusNote ?? $stepNotes[$steps[$currentStep-1]] ?? '' }}
    </div>
    
</x-filament::section>
{{-- </section> --}}




</x-filament-panels::page>
