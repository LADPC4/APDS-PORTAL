<x-filament-panels::page>
<div class="fi-section-content p-4 rounded-lg border">
    <div class="flex items-center gap-x-3">
        <img class="fi-avatar object-cover object-center fi-circular rounded-full h-10 w-10 fi-user-avatar"
             src="https://ui-avatars.com/api/?name={{ urlencode($user->name ?? 'Admin') }}&color=FFFFFF&background=09090b"
             alt="Avatar of {{ $user->name }}">

        <div class="flex-1">
            <h2 class="grid flex-1 text-base font-semibold leading-6 text-gray-950 dark:text-white">
                {{ $user->name }} 
            </h2>
            
            <p class="text-sm text-gray-500 dark:text-gray-400">
                <span class="font-normal text-black dark:text-white">{{ ucfirst($user->userrole) }}</span> -
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
</div>

{{-- <!-- Notification Section -->
<div class="mt-6 p-4 rounded-lg border">

    <h3 class="font-semibold text-lg">Notifications:</h3>
        <p class="mt-1">Accreditation Status:
        @if ($user->status === 'for-review')
            <span style="color: #6b7280;">Under Review</span>
        @elseif ($user->status === 'approved')
            <span style="color: #16a34a;">Approved</span>
        @elseif ($user->status === 'rejected')
            <span style="color: #dc2626;">Rejected</span>
        @else
            <span>Unknown</span>
        @endif
        </p>
    @if ($user->status === 'for-review')
        <p>An Administrator is currently validating your submitted documents.</p>
        <p>This process usually takes 2-3 business days.</p>
    @endif
</div> --}}

</x-filament-panels::page>

