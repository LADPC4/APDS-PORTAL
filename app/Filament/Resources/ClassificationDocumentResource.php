<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClassificationDocumentResource\Pages;
use App\Filament\Resources\ClassificationDocumentResource\RelationManagers;
use App\Models\ClassificationDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Models\Document;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Classification;
use Illuminate\Support\Facades\Auth;

class ClassificationDocumentResource extends Resource
{
    protected static ?string $model = ClassificationDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'Documents';

    protected static ?string $title = 'Documents';
    
    public static function shouldRegisterNavigation(): bool
    {
        // Safely get the user (may return null early in lifecycle or CLI)
        $user = Auth::user();

        // Show only if not a Evaluator (or unauthenticated)
        return $user?->userrole !== 'Evaluator';
    }

    public static function getNavigationSort(): ?int
    {
        return 11; 
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Form Settings';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('classification_id')
                    ->relationship('classification', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Document Name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([                    
                // Classification Name
                TextColumn::make('classification.name')
                    ->label('Classification')
                    ->sortable()
                    ->searchable(),

                // Document Name
                TextColumn::make('name')
                    ->label('Document Name')
                    ->sortable()
                    ->searchable(),

            ])
            ->filters([
                
                SelectFilter::make('classification')
                    ->label('Classification')
                    ->options(function () {
                        return Classification::orderBy('name')->pluck('name', 'id')->toArray();
                    })
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['value'])) {
                            $query->whereHas('classification', function (Builder $query) use ($data) {
                                $query->where('id', $data['value']);
                            });
                        }
                    }),
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
            'index' => Pages\ListClassificationDocuments::route('/'),
            'create' => Pages\CreateClassificationDocument::route('/create'),
            'edit' => Pages\EditClassificationDocument::route('/{record}/edit'),
        ];
    }
}
