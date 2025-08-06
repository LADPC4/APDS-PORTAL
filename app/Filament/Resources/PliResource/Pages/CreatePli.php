<?php

namespace App\Filament\Resources\PliResource\Pages;

use App\Filament\Resources\PliResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePli extends CreateRecord
{
    protected static string $resource = PliResource::class;
    
    protected function getRedirectUrl(): string
    {
        // return $this->getResource()::getUrl('index');  // Redirect back to the list after editing
        return static::getResource()::getUrl('view', ['record' => $this->record]);
    }
}
