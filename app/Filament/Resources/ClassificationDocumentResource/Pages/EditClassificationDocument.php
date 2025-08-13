<?php

namespace App\Filament\Resources\ClassificationDocumentResource\Pages;

use App\Filament\Resources\ClassificationDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClassificationDocument extends EditRecord
{
    protected static string $resource = ClassificationDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
