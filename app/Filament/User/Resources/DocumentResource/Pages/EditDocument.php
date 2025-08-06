<?php

namespace App\Filament\User\Resources\DocumentResource\Pages;

use App\Filament\User\Resources\DocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDocument extends EditRecord
{
    protected static string $resource = DocumentResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\DeleteAction::make(),
    //     ];
    // }
    
    // public function authorize(): bool
    // {
    //     return auth()->user()->usertype !== 'user' || $this->record->user_id === auth()->id();
    // }
}
