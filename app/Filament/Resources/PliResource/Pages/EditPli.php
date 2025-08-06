<?php

namespace App\Filament\Resources\PliResource\Pages;

use App\Filament\Resources\PliResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPli extends EditRecord
{
    protected static string $resource = PliResource::class;

    protected function getRedirectUrl(): string
    {
        // return $this->getResource()::getUrl('index');  // Redirect back to the list after editing
        return static::getResource()::getUrl('view', ['record' => $this->record]);
    }
    
    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\DeleteAction::make(),
    //     ];
    // }

}
