{{-- <x-filament-panels::page>

</x-filament-panels::page> --}}

{{-- <x-filament-panels::page>
    <form wire:submit.prevent="submit" class="w-full space-y-6">
        {{ $this->form }}

        <x-filament::button type="submit">
            Save Changes
        </x-filament::button>
    </form>
</x-filament-panels::page> --}}

<x-filament::page>
    {{ $this->form }}
    
    <div class="flex items-center justify-end gap-3 mt-6">
        {{-- ✅ Cancel Button --}}
        <x-filament::button
            tag="a"
            href="{{ route('filament.user.pages.profile-view') }}"
            color="gray"
        >
            Cancel
        </x-filament::button>

        {{-- ✅ Save/Submit Button --}}
        <x-filament::button
            wire:click="submit"
            type="submit"
        >
            Save
        </x-filament::button>
    </div>
</x-filament::page>