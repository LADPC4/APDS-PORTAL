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

                        Select::make('classification_id')
                            ->label('Classification')
                            ->options(\App\Models\Classification::orderBy('name')->pluck('name', 'id')->toArray())
                            ->required()
                            ->disabled($isDisabled)
                            ->searchable(),
                            
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
                        ->label('Main Office Address')
                        ->required()
                        ->disabled($isDisabled)
                        ->columnSpan('full'),
                
                ])
            ]),

            Grid::make(3)->schema([
                    Fieldset::make('Authorized Representative 1')->schema([
                        TextInput::make('AR1_FN')->label('First Name')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR1_MN')->label('Middle Name')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR1_LN')->label('Last Name')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR1_Designation')->label('Designation or Position')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR1_Contact')->label('Contact Number')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR1_Email')->label('Email')->email()->disabled($isDisabled)->columnSpan('full'),
                    ])
                    ->columnSpan(1),

                    Fieldset::make('Authorized Representative 2')->schema([
                        // TextInput::make('AR2_Name')->label('Name')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR2_FN')->label('First Name')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR2_MN')->label('Middle Name')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR2_LN')->label('Last Name')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR2_Designation')->label('Designation or Position')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR2_Contact')->label('Contact Number')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR2_Email')->label('Email')->email()->disabled($isDisabled)->columnSpan('full'),
                    ])
                    ->columnSpan(1),

                    Fieldset::make('Authorized Representative 3')->schema([
                        // TextInput::make('AR3_Name')->label('Name')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR3_FN')->label('First Name')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR3_MN')->label('Middle Name')->disabled($isDisabled)->columnSpan('full'),
                        TextInput::make('AR3_LN')->label('Last Name')->disabled($isDisabled)->columnSpan('full'),
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
