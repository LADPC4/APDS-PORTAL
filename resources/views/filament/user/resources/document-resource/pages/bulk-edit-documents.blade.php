{{-- <x-filament::page>
    <form wire:submit.prevent="save" class="space-y-6">
        {{ $this->form }}

        <x-filament::button type="submit">
            Save Changes
        </x-filament::button>
    </form>
</x-filament::page> --}}

{{-- 
<x-filament::page>
    <form wire:submit.prevent="save" class="space-y-6">
        @foreach (\App\Models\Document::whereIn('id', $records)->get() as $doc)
            <fieldset class="p-4 border rounded-md space-y-4">
                <legend class="font-bold">{{ $doc->name }}</legend>

                {{ $this->form->fill([
                    'name' => $doc->name,
                    'user_id' => $doc->user_id,
                    'file_path' => $doc->file_path,
                    'status' => $doc->status,
                    'remark' => $doc->remark,
                ]) }}

                {{ $this->form }}
            </fieldset>
        @endforeach

        <x-filament::button type="submit">
            Save Changes
        </x-filament::button>
    </form>
</x-filament::page> --}}

<x-filament::page>
    <form wire:submit.prevent="save" class="space-y-6">
        {{ $this->form }}
        <x-filament::button type="submit">
            Save Changes
        </x-filament::button>
    </form>
</x-filament::page>
