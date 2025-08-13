<?php

namespace App\Filament\Resources\RegistrantResource\Pages;

use App\Filament\Resources\RegistrantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\Actions\Action;

class EditRegistrant extends EditRecord
{
    protected static string $resource = RegistrantResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $data;
    }

    // protected function afterSave(): void
    // {
    //     if ($redirect = request()->query('redirect')) {
    //         // Manually redirect to the previous page
    //         $this->redirect($redirect);
    //     }
    // }

    // protected function getRedirectUrl(): string
    // {
    //     // This fallback is only used if `redirect` is not present
    //     return static::getResource()::getUrl();
    // }
}
