<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;

class ApprovedUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    public static function getNavigationLabel(): string
    {
        return 'Approved';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'PLI';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-check-circle';
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('status', 'approved');
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
            Tables\Columns\TextColumn::make('status')->badge()->color('success'),
            Tables\Columns\TextColumn::make('updated_at')->label('Approved At')->dateTime(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),

            Action::make('revoke')
                ->label('Revoke Approval')
                ->icon('heroicon-o-arrow-uturn-left')
                ->color('warning')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'for-review']);

                    Notification::make()
                        ->success()
                        ->title('Approval Revoked')
                        ->send();

                    $this->dispatch('refresh');
                }),
        ];
    }
}