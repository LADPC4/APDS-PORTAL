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
use Filament\Tables\Filters\SelectFilter;

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
                // // TextInput::make('name')
                // //     ->label('Document Name')
                // //     ->required()
                // //     ->maxLength(255),

                // // Hidden::make('user_id')
                // //     ->default(fn () => Auth::id())
                // //     ->dehydrated(),

                // // FileUpload::make('file_path')
                // //     ->label('Upload File Sample')
                // //     ->disk('public')
                // //     ->directory('uploads')
                // //     ->storeFiles() // ✅ this is required to skip temp upload validation
                // //     ->maxSize(204800) // ✅ 200MB in KB
                // //     ->rules(['file', 'max:204800']) // ✅ server-side rule
                // //     ->required()
                // //     ->getUploadedFileNameForStorageUsing(fn ($file) => $file->hashName())
                // //     ->enableOpen()
                // //     ->previewable(false),
                
                TextInput::make('name')
                    ->label('Document Name')
                    ->disabled() // user cannot change document name
                    ->required(),

                Hidden::make('user_id')
                    ->default(fn () => Auth::id())
                    ->dehydrated(),

                FileUpload::make('file_path')
                    ->label('Upload File')
                    ->disk('public')
                    ->directory('uploads')
                    ->storeFiles()
                    ->maxSize(204800) // 200 MB
                    ->rules(['file', 'max:204800'])
                    // ->required(fn ($record) => !$record->file_path) // only require if no file yet
                    ->required()
                    ->getUploadedFileNameForStorageUsing(fn ($file) => $file->hashName())
                    // ->enableOpen()
                    ->downloadable()
                    ->previewable(false)
                    ->disabled(function ($record) {
                        return Auth::user()->usertype === 'user'
                            && $record
                            // && $record->status === 'under-review';
                            
                            && in_array($record->status, [
                                'under-review',
                                'Evaluated',
                                'Reviewed',
                                'Approved'
                            ]);
                    }),

                TextInput::make('status')
                    ->label('Status')
                    ->default('Pending')
                    ->required()
                    ->disabled(fn () => Auth::user()->usertype === 'user'),

                Forms\Components\Textarea::make('remark')
                    ->label('Remark')
                    ->rows(3)
                    ->nullable()
                    ->disabled(fn () => Auth::user()->usertype === 'user'),
                    // ->visible(fn () => Auth::user()->usertype !== 'user'),
                
                // Forms\Components\FileUpload::make('file_path')
                //     ->label(fn ($record) => $record->name)
                //     ->directory('documents')
                //     ->required(),
                // Forms\Components\Textarea::make('remark')->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Document Name')->sortable()->searchable(),
                TextColumn::make('status')->label('Status')->sortable(),
                TextColumn::make('remark')->label('Remark')->limit(50),
                TextColumn::make('file_path')
                    ->label('View File')
                    ->formatStateUsing(fn ($state) => $state
                        ? '<a href="' . asset('storage/' . $state) . '" target="_blank" class="text-blue-600 underline">View</a>'
                        : '-')
                    ->html(),
                TextColumn::make('created_at')->label('Uploaded At')->dateTime()->sortable(),
                
                // TextColumn::make('name')
                //     ->label('Name')
                //     ->sortable()
                //     ->searchable(),

                // TextColumn::make('file_path')
                //     ->label('View')
                //     ->formatStateUsing(fn ($state, $record) => $state
                //         ? '<a href="' . asset('storage/' . $state) . '" target="_blank" class="text-blue-600 underline">View</a>'
                //         : '-'
                //     )
                //     ->html(),

                // TextColumn::make('created_at')
                //     ->label('Uploaded At')
                //     ->dateTime()
                //     ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Filter by Status')
                    ->options([
                        'Pending' => 'Pending',
                        'Submitted' => 'Submitted',
                        'for-revision' => 'For Revision',
                        'Approved' => 'Approved',
                        'Rejected' => 'Rejected',
                    ])
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\EditAction::make()
                    ->label(fn ($record) => $record->status === 'for-revision' ? 'Edit' : 'Upload')
                    ->visible(function ($record) {
                        return !(Auth::user()->usertype === 'user'
                        
                            // && $record->status === 'under-review');
                            && in_array($record->status, [
                                'under-review',
                                'Evaluated',
                                'Reviewed',
                                'Approved'
                            ])
                        );
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([]);
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
            // 'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
