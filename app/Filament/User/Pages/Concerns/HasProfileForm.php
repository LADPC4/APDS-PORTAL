<?php

namespace App\Filament\User\Pages\Concerns;

use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use App\Models\Classification;
use App\Models\Region;

trait HasProfileForm
{
    public function getProfileFormSchema(bool $isDisabled = false): array
    {
        return [
            
    Forms\Components\Section::make('Institute Profile')
        ->schema([
            Grid::make(1)->schema([
                Fieldset::make('Institute Details')->schema([
                    TextInput::make('name')
                        ->label('Institute Name')
                        ->required()
                        ->disabled($isDisabled)
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
                        //     ->disabled($isDisabled),

                        Select::make('classification_id')
                            ->label('Classification')
                            ->options(\App\Models\Classification::orderBy('name')->pluck('name', 'id')->toArray())
                            ->required()
                            ->disabled($isDisabled)
                            ->searchable(),

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
                        //     ->disabled($isDisabled),
                            
                        Select::make('region')
                            ->label('Regions Covered')
                            ->multiple()
                            ->options(
                                Region::query()
                                    ->orderBy('code')
                                    ->pluck('code', 'code') // ['CAR' => 'CAR', 'R01' => 'R01', etc.]
                                    ->toArray()
                            )
                            ->disabled($isDisabled)
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
                            ->disabled($isDisabled),
                    ]),

                    TextInput::make('address')
                        ->label('Address')
                        ->required()
                        ->disabled($isDisabled)
                        ->columnSpan('full'),
                
                ])
            ]),

            Grid::make(3)->schema([
                Fieldset::make('Authorized Representative 1')->schema([
                    TextInput::make('AR1_Name')->label('Name')->disabled($isDisabled)->columnSpan('full'),
                    TextInput::make('AR1_Designation')->label('Designation or Position')->disabled($isDisabled)->columnSpan('full'),
                    TextInput::make('AR1_Contact')->label('Contact Number')->disabled($isDisabled)->columnSpan('full'),
                    TextInput::make('AR1_Email')->label('Email')->email()->disabled($isDisabled)->columnSpan('full'),
                ])
                ->columnSpan(1),

                Fieldset::make('Authorized Representative 2')->schema([
                    TextInput::make('AR2_Name')->label('Name')->disabled($isDisabled)->columnSpan('full'),
                    TextInput::make('AR2_Designation')->label('Designation or Position')->disabled($isDisabled)->columnSpan('full'),
                    TextInput::make('AR2_Contact')->label('Contact Number')->disabled($isDisabled)->columnSpan('full'),
                    TextInput::make('AR2_Email')->label('Email')->email()->disabled($isDisabled)->columnSpan('full'),
                ])
                ->columnSpan(1),

                Fieldset::make('Authorized Representative 3')->schema([
                    TextInput::make('AR3_Name')->label('Name')->disabled($isDisabled)->columnSpan('full'),
                    TextInput::make('AR3_Designation')->label('Designation or Position')->disabled($isDisabled)->columnSpan('full'),
                    TextInput::make('AR3_Contact')->label('Contact Number')->disabled($isDisabled)->columnSpan('full'),
                    TextInput::make('AR3_Email')->label('Email')->email()->disabled($isDisabled)->columnSpan('full'),
                ])
                ->columnSpan(1),
            ]),

        ])
        ];
    }
}
