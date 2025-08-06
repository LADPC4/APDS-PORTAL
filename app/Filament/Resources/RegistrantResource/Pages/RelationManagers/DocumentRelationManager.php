<?php

namespace App\Filament\Resources\RegistrantResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\RelationManagers\RelationManager;

class DocumentRelationManager extends RelationManager
{
    protected static string $relationship = 'documents';
    protected static ?string $title = 'Uploaded Documents';

    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('name')->required()->label('Document Name'),
            FileUpload::make('file_path')
                ->label('File')
                ->disk('public')
                ->directory('documents')
                ->required(),
        ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Document Name'),
                TextColumn::make('file_path')
                    ->label('Download')
                    ->formatStateUsing(fn ($state) => basename($state))
                    ->url(fn ($record) => $record->file_url, true)
                    ->openUrlInNewTab(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
