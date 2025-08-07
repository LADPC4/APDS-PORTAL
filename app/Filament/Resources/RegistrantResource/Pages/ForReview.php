<?php

namespace App\Filament\Resources\RegistrantResource\Pages;

use App\Filament\Resources\RegistrantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\Pli;

class ForReview extends ListRecords
{
    protected static string $resource = RegistrantResource::class;

    public ?string $activeTab = 'for-review';

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }

    public static function getNavigationGroup(): ?string
    {
        return 'PLIs List';
    }

    // protected function getTableQuery(): Builder
    // {
    //     return parent::getTableQuery()
    //         ->where('usertype', 'user')
    //         ->where('status', 'for-review');
    // }

    public function table(Table $table): Table
    {
        return $table
            ->columns($this->getTableColumns())
            ->actions($this->getTableActions());
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('email')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state) => match ($state) {
                    'for-evaluation' => 'gray',      // 1st stage - neutral color
                    'for-review'     => 'warning',   // 2nd stage - yellow/orange
                    'for-approval'   => 'info',      // 3rd stage - blue
                    'approved'       => 'success',   // Final approved - green
                    'rejected'       => 'danger',    // Final rejected - red
                    default          => 'secondary', // Fallback
                }),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Requested At')
                ->dateTime()
                ->sortable(),
        ];
    }

    protected function getTableActions(): array
    {
        $user = Auth::user();
        $isEvaluator = $user?->userrole === 'Evaluator';

        return [

            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make()
                ->visible(! $isEvaluator),
            Action::make('warning')
                ->label('Escalate to Approver')
                ->icon('heroicon-o-check-circle')
                ->action(function ($record) {
                    $record->update(['status' => 'for-approval']);

                    Notification::make()
                        ->success()
                        ->title('PLI escalated to approver')
                        ->send();

                    $this->dispatch('refresh');
                })
                ->requiresConfirmation()
                ->color('success')
                ->visible(! $isEvaluator),

            Action::make('reject')
                ->label('Reject')
                ->icon('heroicon-o-x-circle')
                ->action(function ($record) {
                    $record->update(['status' => 'rejected']);

                    Notification::make()
                        ->success()
                        ->title('User Rejected')
                        ->send();

                    $this->dispatch('refresh');
                })
                ->requiresConfirmation()
                ->color('danger')
                ->visible(! $isEvaluator),
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
