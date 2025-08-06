<?php

namespace App\Filament\Resources\UserResource\Pages;

use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    

    public function getTitle(): string
    {
        return 'Admin Users';
    }

    // protected function getTableQuery(): Builder
    // {
    //     return parent::getTableQuery()
    //         ->where('usertype', 'admin');
    // }

    protected function getTableQuery(): Builder
    {
        $user = Auth::user();

        $query = parent::getTableQuery()->where('usertype', 'admin');

        if ($user->userrole === 'SuperAdmin') {
            return $query;
        }

        if ($user->userrole === 'Approver') {
            return $query->whereIn('userrole', ['Reviewer', 'Evaluator']);
        }

        if ($user->userrole === 'Reviewer') {
            return $query->where('userrole', 'Evaluator');
        }

        abort(403, 'Unauthorized');
    }

}
