<?php

namespace App\Filament\Resources\RegistrantResource\Pages;

use App\Filament\Resources\RegistrantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class ListRegistrants extends ListRecords
{
    protected static string $resource = RegistrantResource::class;

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

    public ?string $activeTab = 'for-evaluation';

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->where('usertype', 'user')
            ->where('status', $this->activeTab);
    }

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

}
