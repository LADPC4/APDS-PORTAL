<?php

namespace App\Filament\Resources\RegistrantResource\Pages;

use App\Filament\Resources\RegistrantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\Actions\Action;
use Filament\Facades\Filament;

class EditRegistrant extends EditRecord
{
    protected static string $resource = RegistrantResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        $role = Filament::auth()->user()?->userrole;

        return match ($role) {
            'Evaluator' => RegistrantResource::getUrl('for-evaluation'),
            'Reviewer'  => RegistrantResource::getUrl('for-review'),
            'Approver'  => RegistrantResource::getUrl('for-approval'),
            default     => parent::getRedirectUrl(),
        };
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
