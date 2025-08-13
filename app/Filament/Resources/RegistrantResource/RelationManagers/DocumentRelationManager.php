<?php

namespace App\Filament\Resources\RegistrantResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DocumentRelationManager extends RelationManager
{
    protected static string $relationship = 'documents';

    protected static ?string $recordTitleAttribute = 'name';

    public function mutateFormDataBeforeSave(array $data): array
    {
        // If file_path is present (user uploaded a file)
        if (!empty($data['file_path'])) {
            $data['status'] = 'Submitted'; // or 'Submitted' if you want
        }
        return $data;
    }


    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Document Name')
                ->disabled()
                ->required(),

            FileUpload::make('file_path')
                ->label('Upload File')
                ->disk('public')
                ->directory('uploads')
                ->storeFiles()
                ->maxSize(204800) // 200 MB
                ->rules(['file', 'max:204800'])
                ->getUploadedFileNameForStorageUsing(fn ($file) => $file->hashName())
                ->enableOpen()
                ->previewable(false),

            Select::make('status')
                ->label('Status')
                ->options([
                    'Pending' => 'Pending',
                    'Approved' => 'Approved',
                    'Rejected' => 'Rejected',
                ])
                ->default('Pending')
                ->required(),

            Textarea::make('remark')
                ->label('Remark')
                ->rows(3)
                ->nullable(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Document Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('status')
                    ->label('Status'),

                TextColumn::make('remark')
                    ->label('Remark')
                    ->limit(50),

                TextColumn::make('file_path')
                    ->label('View File')
                    ->formatStateUsing(fn ($state) => $state
                        ? '<a href="' . asset('storage/' . $state) . '" target="_blank" class="text-blue-600 underline">View</a>'
                        : '-')
                    ->html(),

                TextColumn::make('created_at')
                    ->label('Uploaded At')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }
}
