<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistrantResource\Pages;
use App\Filament\Resources\RegistrantResource\RelationManagers;
use App\Models\Registrant;
use App\Models\Classification;
use App\Models\Region;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Filament\Facades\Filament;

class RegistrantResource extends Resource
{
    protected static ?string $model = \App\Models\User::class;
    protected static ?string $navigationGroup = 'PLIs Group'; // Put under group in nav
    protected static ?string $navigationLabel = 'PLIs Group';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    public static function shouldRegisterNavigation(): bool
    {
        return false; // Hide this page from the sidebar completely
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Grid::make(1)->schema([
                //     Fieldset::make('Institute Details')->schema([
                //         TextInput::make('name')
                //             ->label('Institute Name')
                //             ->required()
                //             ->columnSpan('full'),

                //         Grid::make(2)->schema([

                //             Select::make('classification_id')
                //                 ->label('Classification')
                //                 ->options(\App\Models\Classification::orderBy('name')->pluck('name', 'id')->toArray())
                //                 ->required()
                //                 ->searchable(),
                                
                //             Select::make('region')
                //                 ->label('Regions Covered')
                //                 ->multiple()
                //                 ->options(
                //                     Region::query()
                //                         ->orderBy('code')
                //                         ->pluck('code', 'code') // ['CAR' => 'CAR', 'R01' => 'R01', etc.]
                //                         ->toArray()
                //                 )
                //                 ->preload()
                //                 ->searchable()
                //                 ->required(),
                //         ]),

                //         Grid::make(2)->schema([
                //             TextInput::make('email')
                //                 ->label('Official Email Address')
                //                 ->disabled(true)
                //                 ->readonly(),

                //             TextInput::make('contact_number')
                //                 ->label('Contact Number')
                //                 ->required()
                //                 ,
                //         ]),

                //         TextInput::make('address')
                //             ->label('Address')
                //             ->required()
                //             ->columnSpan('full'),
                    
                //     ])
                // ]),

                // Grid::make(3)->schema([
                //         Fieldset::make('Authorized Representative 1')->schema([
                //             TextInput::make('AR1_FN')->label('First Name')->columnSpan('full'),
                //             TextInput::make('AR1_MN')->label('Middle Name')->columnSpan('full'),
                //             TextInput::make('AR1_LN')->label('Last Name')->columnSpan('full'),
                //             TextInput::make('AR1_Designation')->label('Designation or Position')->columnSpan('full'),
                //             TextInput::make('AR1_Contact')->label('Contact Number')->columnSpan('full'),
                //             TextInput::make('AR1_Email')->label('Email')->email()->columnSpan('full'),
                //         ])
                //         ->columnSpan(1),

                //         Fieldset::make('Authorized Representative 2')->schema([
                //             // TextInput::make('AR2_Name')->label('Name')->columnSpan('full'),
                //             TextInput::make('AR2_FN')->label('First Name')->columnSpan('full'),
                //             TextInput::make('AR2_MN')->label('Middle Name')->columnSpan('full'),
                //             TextInput::make('AR2_LN')->label('Last Name')->columnSpan('full'),
                //             TextInput::make('AR2_Designation')->label('Designation or Position')->columnSpan('full'),
                //             TextInput::make('AR2_Contact')->label('Contact Number')->columnSpan('full'),
                //             TextInput::make('AR2_Email')->label('Email')->email()->columnSpan('full'),
                //         ])
                //         ->columnSpan(1),

                //         Fieldset::make('Authorized Representative 3')->schema([
                //             // TextInput::make('AR3_Name')->label('Name')->columnSpan('full'),
                //             TextInput::make('AR3_FN')->label('First Name')->columnSpan('full'),
                //             TextInput::make('AR3_MN')->label('Middle Name')->columnSpan('full'),
                //             TextInput::make('AR3_LN')->label('Last Name')->columnSpan('full'),
                //             TextInput::make('AR3_Designation')->label('Designation or Position')->columnSpan('full'),
                //             TextInput::make('AR3_Contact')->label('Contact Number')->columnSpan('full'),
                //             TextInput::make('AR3_Email')->label('Email')->email()->columnSpan('full'),
                //         ])
                //         ->columnSpan(1),
                //     ]),

                

                Section::make('Submitted Documents')
                    ->schema([
                        Repeater::make('documents')
                            ->relationship() // assumes hasMany in model
                            ->disableItemCreation()
                            ->disableItemDeletion()
                            ->schema([
                                Grid::make(12)->schema([
                                    // Placeholder::make('name')
                                    //     ->label('Document Name')
                                    //     ->content(fn ($record) => $record->name)
                                    //     ->columnSpan(5),

                                    Placeholder::make('file_path')
                                        // ->label('Uploaded File')
                                        ->label(fn ($record) => $record->name)
                                        ->content(fn ($record) => $record->file_path
                                            ? new HtmlString('<a href="' . asset('storage/' . $record->file_path) . '" target="_blank" class="text-blue-600 underline hover:text-blue-800">View / Download File</a>')
                                            : 'No file uploaded')
                                        ->columnSpan(3),

                                        
                                    TextArea::make('prev_remark')
                                        ->label('Previous Remarks')
                                        ->disabled()
                                        ->rows(5)
                                        ->extraAttributes(['style' => 'resize: none; overflow-y: auto;'])
                                        ->columnSpan(4),
                                    // Grid::make(1)->schema([
                                    //     TextInput::make('remark')
                                    //         ->label('Remarks')
                                    //         ->placeholder('Remarks here...')
                                    //         ->disabled(fn ($get) => $get('eval_feedback') === true)
                                    //         ->dehydrated(true),

                                    //     Checkbox::make('eval_feedback')
                                    //         ->label('Correct File')
                                    //         ->live()
                                    //         ->visible(fn () => in_array(Filament::auth()->user()?->userrole, ['Evaluator', 'Reviewer', 'Approver'])),
                                    //         // ->visible(fn () => Filament::auth()->user()?->userrole === 'Evaluator')
                                    //         // ->afterStateUpdated(function ($state, callable $set, $record) {
                                    //         //     if ($state === true) {
                                    //         //         $record->update([
                                    //         //             'remark' => null,
                                    //         //             'status' => 'evaluated',
                                    //         //         ]);
                                    //         //         $set('remark', null);
                                    //         //         $set('status', 'evaluated');
                                    //         //     }
                                    //         // }),
                                    // ])->columnSpan(5),
                                    Grid::make(1)->schema([
                                        TextInput::make('remark')
                                            ->label('Remarks')
                                            ->placeholder('Remarks here...')
                                            ->disabled(function ($get) {
                                                $role = Filament::auth()->user()?->userrole;
                                                if ($role === 'Evaluator') {
                                                    return $get('eval_feedback') === true;
                                                }
                                                if ($role === 'Reviewer') {
                                                    return $get('rev_feedback') === true;
                                                }
                                                if ($role === 'Approver') {
                                                    return $get('app_feedback') === true;
                                                }
                                                return false;
                                            })
                                            ->dehydrated(true),

                                        Checkbox::make('eval_feedback')
                                            ->label('Correct File (Evaluator)')
                                            ->live()
                                            ->visible(fn () => Filament::auth()->user()?->userrole === 'Evaluator'),
                                            // ->visible(fn () => in_array(
                                            //     Filament::auth()->user()?->userrole,
                                            //     ['Evaluator', 'Reviewer', 'Approver']
                                            // )),

                                        Checkbox::make('rev_feedback')
                                            ->label('Correct File (Reviewer)')
                                            ->live()
                                            ->visible(fn () => Filament::auth()->user()?->userrole === 'Reviewer'),

                                        Checkbox::make('app_feedback')
                                            ->label('Correct File (Approver)')
                                            ->live()
                                            ->visible(fn () => Filament::auth()->user()?->userrole === 'Approver'),

                                    ])->columnSpan(5),
                                ]),
                            ])
                            ->columns(1)
                            ->columnSpan('full')
                    ])
                    ->columnSpan('full'),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Institution Name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('evaluator.name')
                    ->label('Evaluator')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('eval_date')
                    ->label('Eval Date')
                    ->date('M d, Y'),

                TextColumn::make('reviewer.name')
                    ->label('Reviewer')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('rev_date')
                    ->label('Review Date')
                    ->date('M d, Y'),

                TextColumn::make('approver.name')
                    ->label('Approver')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('approved_date')
                    ->label('Approved Date')
                    ->date('M d, Y'),
                //
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
            // RelationManagers\DocumentRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistrants::route('/'),
            'create' => Pages\CreateRegistrant::route('/create'),
            'edit' => Pages\EditRegistrant::route('/{record}/edit'),
            'view' => Pages\ViewRegistrant::route('/view/{record}'),
            'for-evaluation' => Pages\ForEvaluation::route('/for-evaluation'),
            'for-review' => Pages\ForReview::route('/for-review'),
            'for-approval' => Pages\ForApproval::route('/for-approval'),
            'approved' => Pages\Approved::route('/approved'),
            'rejected' => Pages\Rejected::route('/rejected'),
        ];
    }
}
