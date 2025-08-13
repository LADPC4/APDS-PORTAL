<?php

namespace App\Filament\Resources\RegistrantResource\Pages;

use App\Filament\Resources\RegistrantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Pli;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Classification;

class ListRegistrants extends ListRecords
{
    protected static string $resource = RegistrantResource::class;

    public ?string $activeTab = 'for-evaluation';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public static function shouldRegisterNavigation(array $parameters = []): bool
    {
        return false; // Hide this page from the sidebar completely
    }

    // protected function getTableQuery(): Builder
    // {
    //     return parent::getTableQuery()
    //         ->where('usertype', 'user')
    //         ->where('status', $this->activeTab);
    // }

    protected function getTableFilters(): array
    {
        return [];
    }
    
    protected function getTableTabs(): array
    {
        return [
            'for-evaluation' => Tables\Table::makeTab('Evaluation'),
            'for-review' => Tables\Table::makeTab('Review'),
            'for-approval' => Tables\Table::makeTab('Approval'),
            'approved' => Tables\Table::makeTab('Accredited'),
            'rejected' => Tables\Table::makeTab('Rejected'),
        ];
    }

    protected function getTableQueryStringOptions(): array
    {
        return [
            'activeTab' => ['default' => 'for-evaluation'],
        ];
    }

    protected function getTableQuery(): Builder
    {
        $query = parent::getTableQuery()
            ->where('usertype', 'user')
            ->where('status', $this->activeTab);

        $user = Auth::user();

        if ($user && $user->userrole === 'Evaluator') {
            // Get PLIs assigned to the evaluator
            $pliIds = $user->plis()->pluck('plis.id');

            // Get all user IDs associated with those PLIs
            $userIds = Pli::whereIn('id', $pliIds)
                ->with('users')
                ->get()
                ->pluck('users')
                ->flatten()
                ->where('usertype', 'user') // Only include registrants
                ->pluck('id')
                ->unique();

            // Limit query to users assigned to those PLIs
            $query->whereIn('id', $userIds);
        }

        return $query;
    }

}
