<?php

namespace App\Filament\Resources\RegistrantResource\Pages;

use App\Filament\Resources\RegistrantResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Facades\Filament;

class ViewRegistrant extends ViewRecord
{
    protected static string $resource = RegistrantResource::class;
    protected static ?string $title = 'Registrant Details';
    protected static string $view = 'filament.admin.resources.registrant-resource.pages.view-registrant';

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         \Filament\Actions\EditAction::make()
    //             ->label('Add Remarks'),
    //     ];
    // }
    
    protected function getHeaderActions(): array
    {
        $user = Filament::auth()->user();
        $role = $user?->userrole;  // or however you access the role
        $status = $this->record->status;

        // Show EditAction only if:
        // - user role is NOT Evaluator
        // OR
        // - user role is Evaluator AND status is 'for-evaluation'
        if ($role === 'Evaluator' && $status !== 'for-evaluation') {
            return [];
        }

        if ($role === 'Reviewer' && $status !== 'for-review') {
            return [];
        }

        if ($role === 'Approver' && $status !== 'for-approval') {
            return [];
        }

        // if ($role === 'Reviewer' && !in_array($status, ['for-evaluation', 'for-review'])) {
        //     return [];
        // }

        return [
            \Filament\Actions\EditAction::make()
                ->label('Add Remarks'),
        ];
    }
}
