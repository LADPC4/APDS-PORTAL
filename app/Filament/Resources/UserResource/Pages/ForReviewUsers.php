<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;

class ForReviewUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    public static function getNavigationLabel(): string
    {
        return 'For Review';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'PLI';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-eye';
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('status', 'for-review');
    }

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
                    'for-review' => 'warning',
                    'approved' => 'success',
                    'rejected' => 'danger',
                    default => 'gray',
                }),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Requested At')
                ->dateTime()
                ->sortable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('approve')
                ->label('Approve')
                ->icon('heroicon-o-check-circle')
                ->action(function ($record) {
                    $record->update(['status' => 'approved']);

                    Notification::make()
                        ->success()
                        ->title('User Approved')
                        ->send();

                    $this->dispatch('refresh');
                })
                ->requiresConfirmation()
                ->color('success'),

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
                ->color('danger'),

            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
        ];
    }
}