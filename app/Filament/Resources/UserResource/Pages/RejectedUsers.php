<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;

class RejectedUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    public static function getNavigationLabel(): string
    {
        return 'Rejected';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'PLI';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-x-circle';
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('status', 'rejected');
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
            Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('status')->badge()->color('danger'),
            Tables\Columns\TextColumn::make('updated_at')->label('Rejected At')->dateTime(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ViewAction::make(),

            Action::make('reconsider')
                ->label('Reconsider')
                ->icon('heroicon-o-arrow-path')
                ->color('primary')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'for-review']);

                    Notification::make()
                        ->success()
                        ->title('User Reconsidered')
                        ->send();

                    $this->dispatch('refresh');
                }),
        ];
    }
}