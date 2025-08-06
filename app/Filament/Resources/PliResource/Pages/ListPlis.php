<?php

namespace App\Filament\Resources\PliResource\Pages;

use App\Filament\Resources\PliResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListPlis extends ListRecords
{
    protected static string $resource = PliResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }

    public function getTitle(): string
    {
        return 'PLIs Code & Region';
    }

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $query = parent::getTableQuery();
        $user = Auth::user();

        if ($user && $user->userrole === 'Evaluator') {
            $query = $query->whereHas('users', function ($q) use ($user) {
                $q->where('users.id', $user->id);
            });
        }

        return $query;
    }
}
