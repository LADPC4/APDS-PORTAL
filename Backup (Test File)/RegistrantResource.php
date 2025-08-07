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
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Fieldset;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                // TextInput::make('name')->required(),
                // TextInput::make('email')->email()->required(),
                // Select::make('status')
                //     ->options([
                //         'for-evaluation' => 'For Evaluation',
                //         'for-review' => 'For Review',
                //         'for-approval' => 'For Approval',
                //         'approved' => 'Approved',
                //         'rejected' => 'Rejected',
                //     ])
                //     ->required(),

                
                Grid::make(1)->schema([
                    Fieldset::make('Institute Details')->schema([
                        TextInput::make('name')
                            ->label('Institute Name')
                            ->required()
                            
                            ->columnSpan('full'),

                        Grid::make(2)->schema([
                            // Select::make('classification')
                            //     ->label('Classification')
                            //     ->options([
                            //         'Banks' => 'Banks',
                            //         'Cooperatives' => 'Cooperatives',
                            //         'Cooperative Banks' => 'Cooperative Banks',
                            //         'Insurance Companies' => 'Insurance Companies',
                            //         'Teachers Association' => 'Teachers Association',
                            //         'Savings and Loans Associations' => 'Savings and Loans Associations',
                            //     ])
                            //     ->required()
                            //     ,
                            

                            Select::make('classification_id')
                                ->label('Classification')
                                ->options(function () {
                                    return Classification::query()
                                        ->orderBy('name')
                                        ->pluck('name', 'id')
                                        ->toArray();
                                })
                                ->required()
                                ->searchable()
                                ->preload(),

                            // Select::make('region')
                            //     ->label('Region')
                            //     ->options([
                            //         'CAR'   => 'Cordillera Administrative Region',
                            //         'NCR'   => 'National Capital Region',
                            //         'R01'   => 'Region I: Ilocos Region',
                            //         'R02'   => 'Region II: Cagayan Valley',
                            //         'R03'   => 'Region III: Central Luzon',
                            //         'R04A'  => 'Region IV-A: CALABARZON',
                            //         'R04B'  => 'Region IV-B: MIMAROPA Region',
                            //         'R05'   => 'Region V: Bicol Region',
                            //         'R06'   => 'Region VI: Western Visayas',
                            //         'R07'   => 'Region VII: Central Visayas',
                            //         'R08'   => 'Region VIII: Eastern Visayas',
                            //         'R09'   => 'Region IX: Zamboanga Peninsula',
                            //         'R10'   => 'Region X: Northern Mindanao',
                            //         'R11'   => 'Region XI: Davao Region',
                            //         'R12'   => 'Region XII: SOCCSKSARGEN',
                            //         'R13'   => 'Region XIII: Caraga',
                            //     ])
                            //     ->required()
                            //     ,

                            
                            Select::make('region')
                                ->label('Regions Covered')
                                ->multiple()
                                ->options(
                                    Region::query()
                                        ->orderBy('code')
                                        ->pluck('code', 'code') // ['CAR' => 'CAR', 'R01' => 'R01', etc.]
                                        ->toArray()
                                )
                                ->preload()
                                ->searchable()
                                ->required(),
                        ]),

                        Grid::make(2)->schema([
                            TextInput::make('email')
                                ->label('Official Email Address')
                                // ->disabled(true)
                                ->readonly(),

                            TextInput::make('contact_number')
                                ->label('Contact Number')
                                ->required()
                                ,
                        ]),

                        TextInput::make('address')
                            ->label('Address')
                            ->required()
                            
                            ->columnSpan('full'),
                    
                    ])
                ]),

                Grid::make(3)->schema([
                    Fieldset::make('Authorized Representative 1')->schema([
                        TextInput::make('AR1_Name')->label('Name')->columnSpan('full'),
                        TextInput::make('AR1_Designation')->label('Designation or Position')->columnSpan('full'),
                        TextInput::make('AR1_Contact')->label('Contact Number')->columnSpan('full'),
                        TextInput::make('AR1_Email')->label('Email')->email()->columnSpan('full'),
                    ])
                    ->columnSpan(1),

                    Fieldset::make('Authorized Representative 2')->schema([
                        TextInput::make('AR2_Name')->label('Name')->columnSpan('full'),
                        TextInput::make('AR2_Designation')->label('Designation or Position')->columnSpan('full'),
                        TextInput::make('AR2_Contact')->label('Contact Number')->columnSpan('full'),
                        TextInput::make('AR2_Email')->label('Email')->email()->columnSpan('full'),
                    ])
                    ->columnSpan(1),

                    Fieldset::make('Authorized Representative 3')->schema([
                        TextInput::make('AR3_Name')->label('Name')->columnSpan('full'),
                        TextInput::make('AR3_Designation')->label('Designation or Position')->columnSpan('full'),
                        TextInput::make('AR3_Contact')->label('Contact Number')->columnSpan('full'),
                        TextInput::make('AR3_Email')->label('Email')->email()->columnSpan('full'),
                    ])
                    ->columnSpan(1),
                ]),

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
                //
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
            'index' => Pages\ListRegistrants::route('/'),
            'create' => Pages\CreateRegistrant::route('/create'),
            'edit' => Pages\EditRegistrant::route('/{record}/edit'),
            'for-evaluation' => Pages\ForEvaluation::route('/for-evaluation'),
            'for-review' => Pages\ForReview::route('/for-review'),
            'for-approval' => Pages\ForApproval::route('/for-approval'),
            'approved' => Pages\Approved::route('/approved'),
            'rejected' => Pages\Rejected::route('/rejected'),
        ];
    }
}
