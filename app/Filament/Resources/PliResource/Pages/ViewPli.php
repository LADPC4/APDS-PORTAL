<?php

namespace App\Filament\Resources\PliResource\Pages;

use App\Filament\Resources\PliResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;

class ViewPli extends ViewRecord
{
    protected static string $resource = PliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('backToList')
                // ->label('Back to Lists')
                ->label('')
                ->icon('heroicon-o-arrow-left')
                ->url(fn () => PliResource::getUrl('index'))
                ->color('gray'),

                
            \Filament\Actions\EditAction::make(),
        ];
    }

    
}