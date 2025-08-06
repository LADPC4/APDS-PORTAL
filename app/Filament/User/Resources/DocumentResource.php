<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\DocumentResource\Pages;
use App\Filament\User\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
        
    public static function getNavigationSort(): ?int
    {
        return 2; // Higher than dashboard
    }    

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (Auth::user()->usertype === 'user') {
            $query->where('user_id', Auth::id());
        }

        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Document Name')
                    ->required()
                    ->maxLength(255),

                Hidden::make('user_id')
                    ->default(fn () => Auth::id())
                    ->dehydrated(),

                // FileUpload::make('file_path')
                //     ->label('Upload File')
                //     ->directory('uploads')
                //     ->disk('public')
                //     ->visibility('public')
                //     ->required()
                //     // ->maxSize(10240) // 10 MB max
                //     // ->getUploadedFileNameForStorageUsing(fn ($file) => $file->hashName()), 
                //     ->getUploadedFileNameForStorageUsing(fn ($file) => $file->hashName())
                //     // ->enableDownload()
                //     ->enableOpen()
                //     ->previewable(false),

                FileUpload::make('file_path')
                    ->label('Upload File Sample')
                    ->disk('public')
                    ->directory('uploads')
                    ->storeFiles() // ✅ this is required to skip temp upload validation
                    ->maxSize(204800) // ✅ 200MB in KB
                    ->rules(['file', 'max:204800']) // ✅ server-side rule
                    ->required()
                    ->getUploadedFileNameForStorageUsing(fn ($file) => $file->hashName())
                    ->enableOpen()
                    ->previewable(false),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('file_path')
                    ->label('View')
                    ->formatStateUsing(fn ($state, $record) => $state
                        ? '<a href="' . asset('storage/' . $state) . '" target="_blank" class="text-blue-600 underline">View</a>'
                        : '-'
                    )
                    ->html(),

                TextColumn::make('created_at')
                    ->label('Uploaded At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
