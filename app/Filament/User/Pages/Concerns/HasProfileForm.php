<?php

namespace App\Filament\User\Pages\Concerns;

use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
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
                        
                        ->columnSpan('full'),

                    Grid::make(2)->schema([

                        Select::make('classification_id')
                            ->label('Classification')
                            ->options(\App\Models\Classification::orderBy('name')->pluck('name', 'id')->toArray())
                            ->required()
                            
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
                        ->label('Main Office Address')
                        ->required()
                        
                        ->columnSpan('full'),
                
                ])
            ]),

            Grid::make(3)->schema([
                    Fieldset::make('Authorized Representative 1')->schema([
                        TextInput::make('AR1_FN')->label('First Name')->columnSpan('full'),
                        TextInput::make('AR1_MN')->label('Middle Name')->columnSpan('full'),
                        TextInput::make('AR1_LN')->label('Last Name')->columnSpan('full'),
                        TextInput::make('AR1_Designation')->label('Designation or Position')->columnSpan('full'),
                        TextInput::make('AR1_Contact')->label('Contact Number')->columnSpan('full'),
                        TextInput::make('AR1_Email')->label('Email')->email()->columnSpan('full'),
                    ])
                    ->columnSpan(1),

                    Fieldset::make('Authorized Representative 2')->schema([
                        // TextInput::make('AR2_Name')->label('Name')->columnSpan('full'),
                        TextInput::make('AR2_FN')->label('First Name')->columnSpan('full'),
                        TextInput::make('AR2_MN')->label('Middle Name')->columnSpan('full'),
                        TextInput::make('AR2_LN')->label('Last Name')->columnSpan('full'),
                        TextInput::make('AR2_Designation')->label('Designation or Position')->columnSpan('full'),
                        TextInput::make('AR2_Contact')->label('Contact Number')->columnSpan('full'),
                        TextInput::make('AR2_Email')->label('Email')->email()->columnSpan('full'),
                    ])
                    ->columnSpan(1),

                    Fieldset::make('Authorized Representative 3')->schema([
                        // TextInput::make('AR3_Name')->label('Name')->columnSpan('full'),
                        TextInput::make('AR3_FN')->label('First Name')->columnSpan('full'),
                        TextInput::make('AR3_MN')->label('Middle Name')->columnSpan('full'),
                        TextInput::make('AR3_LN')->label('Last Name')->columnSpan('full'),
                        TextInput::make('AR3_Designation')->label('Designation or Position')->columnSpan('full'),
                        TextInput::make('AR3_Contact')->label('Contact Number')->columnSpan('full'),
                        TextInput::make('AR3_Email')->label('Email')->email()->columnSpan('full'),
                    ])
                    ->columnSpan(1),
                ]),

                Grid::make(2) // Outer grid, 2 columns for the 2 fieldsets
                    ->schema([

                        // ================= Head Officer 1 =================
                        Fieldset::make('Head Officer 1')
                            ->schema([
                                Fieldset::make('Name')
                                    ->schema([
                                        TextInput::make('ho1_fn')->label('First Name')->columnSpan('full')->required(),
                                        TextInput::make('ho1_mn')->label('Middle Name')->columnSpan('full'),
                                        TextInput::make('ho1_ln')->label('Last Name')->columnSpan('full')->required(),
                                    ])
                                    ->columnSpan(1),

                                Fieldset::make('Details')
                                    ->schema([
                                        Select::make('ho1_designation')->label('Designation')
                                            ->options([
                                                'President' => 'President',
                                                'Vice President' => 'Vice President',
                                                'Executive Vice President' => 'Executive Vice President',
                                                'Senior Vice President' => 'Senior Vice President',
                                                'Chairman/Chairwoman' => 'Chairman/Chairwoman',
                                                'General Manager' => 'General Manager',
                                                'Other' => 'Other',
                                            ])
                                            ->reactive()
                                            ->columnSpan('full')
                                            ->required()
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                // Clear the "Other" input immediately when designation is not 'Other'
                                                if ($state !== 'Other') {
                                                    $set('ho1_designation_other', null);
                                                }
                                            }),

                                        TextInput::make('ho1_designation_other')
                                            ->label('Other Designation')
                                            ->reactive()
                                            ->visible(fn ($get) => $get('ho1_designation') === 'Other')
                                            ->required(fn ($get) => $get('ho1_designation') === 'Other')
                                            ->dehydrateStateUsing(fn ($state, $get) => $get('ho1_designation') === 'Other' ? $state : null)
                                            ->columnSpan('full'),

                                        TextInput::make('ho1_contact')->label('Contact Number')->columnSpan('full')->required(),
                                        TextInput::make('ho1_email')->label('Email')->email()->columnSpan('full')->required(),
                                    ])
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(1),

                        // ================= Head Officer 2 =================
                        Fieldset::make('Head Officer 2')
                            ->schema([
                                Fieldset::make('Name')
                                    ->schema([
                                        TextInput::make('ho2_fn')->label('First Name')->columnSpan('full'),
                                        TextInput::make('ho2_mn')->label('Middle Name')->columnSpan('full'),
                                        TextInput::make('ho2_ln')->label('Last Name')->columnSpan('full'),
                                    ])
                                    ->columnSpan(1),

                                Fieldset::make('Details')
                                    ->schema([
                                        Select::make('ho2_designation')->label('Designation')
                                            ->options([
                                                'President' => 'President',
                                                'Vice President' => 'Vice President',
                                                'Executive Vice President' => 'Executive Vice President',
                                                'Senior Vice President' => 'Senior Vice President',
                                                'Chairman/Chairwoman' => 'Chairman/Chairwoman',
                                                'General Manager' => 'General Manager',
                                                'Other' => 'Other',
                                            ])
                                            ->reactive()
                                            ->columnSpan('full')
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                // Clear the "Other" input immediately when designation is not 'Other'
                                                if ($state !== 'Other') {
                                                    $set('ho2_designation_other', null);
                                                }
                                            }),

                                        TextInput::make('ho2_designation_other')
                                            ->label('Other Designation')
                                            ->reactive()
                                            ->visible(fn ($get) => $get('ho2_designation') === 'Other')
                                            ->required(fn ($get) => $get('ho2_designation') === 'Other')
                                            ->dehydrateStateUsing(fn ($state, $get) => $get('ho2_designation') === 'Other' ? $state : null)
                                            ->columnSpan('full'),

                                        TextInput::make('ho2_contact')->label('Contact Number')->columnSpan('full'),
                                        TextInput::make('ho2_email')->label('Email')->email()->columnSpan('full'),
                                    ])
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(1),
                        ]),

                Grid::make(2) // Outer grid, 2 columns for the 2 fieldsets
                    ->schema([

                        // ================= Compliance Officer 1 =================
                        Fieldset::make('Compliance Officer 1')
                            ->schema([
                                Fieldset::make('Name')
                                    ->schema([
                                        TextInput::make('co1_fn')->label('First Name')->columnSpan('full')->required(),
                                        TextInput::make('co1_mn')->label('Middle Name')->columnSpan('full'),
                                        TextInput::make('co1_ln')->label('Last Name')->columnSpan('full')->required(),
                                    ])
                                    ->columnSpan(1),

                                Fieldset::make('Details')
                                    ->schema([
                                        TextInput::make('co1_designation')->label('Designation')->columnSpan('full')->required(),
                                        TextInput::make('co1_contact')->label('Contact Number')->columnSpan('full')->required(),
                                        TextInput::make('co1_email')->label('Email')->email()->columnSpan('full')->required(),
                                    ])
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(1),

                        // ================= Compliance Officer 2 =================
                        Fieldset::make('Compliance Officer 2')
                            ->schema([
                                Fieldset::make('Name')
                                    ->schema([
                                        TextInput::make('co2_fn')->label('First Name')->columnSpan('full'),
                                        TextInput::make('co2_mn')->label('Middle Name')->columnSpan('full'),
                                        TextInput::make('co2_ln')->label('Last Name')->columnSpan('full'),
                                    ])
                                    ->columnSpan(1),

                                Fieldset::make('Details')
                                    ->schema([
                                        TextInput::make('co2_designation')->label('Designation')->columnSpan('full'),
                                        TextInput::make('co2_contact')->label('Contact Number')->columnSpan('full'),
                                        TextInput::make('co2_email')->label('Email')->email()->columnSpan('full'),
                                    ])
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(1),
                        ]),

                Grid::make(2) // Outer grid, 2 columns for the 2 fieldsets
                    ->schema([

                        // ================= Loan Officer 1 =================
                        Fieldset::make('Loan Officer 1')
                            ->schema([
                                Fieldset::make('Name')
                                    ->schema([
                                        TextInput::make('lo1_fn')->label('First Name')->columnSpan('full')->required(),
                                        TextInput::make('lo1_mn')->label('Middle Name')->columnSpan('full'),
                                        TextInput::make('lo1_ln')->label('Last Name')->columnSpan('full')->required(),
                                    ])
                                    ->columnSpan(1),

                                Fieldset::make('Details')
                                    ->schema([
                                        TextInput::make('lo1_designation')->label('Designation')->columnSpan('full')->required(),
                                        TextInput::make('lo1_contact')->label('Contact Number')->columnSpan('full')->required(),
                                        TextInput::make('lo1_email')->label('Email')->email()->columnSpan('full')->required(),
                                    ])
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(1),

                        // ================= Loan Officer 2 =================
                        Fieldset::make('Loan Officer 2')
                            ->schema([
                                Fieldset::make('Name')
                                    ->schema([
                                        TextInput::make('lo2_fn')->label('First Name')->columnSpan('full'),
                                        TextInput::make('lo2_mn')->label('Middle Name')->columnSpan('full'),
                                        TextInput::make('lo2_ln')->label('Last Name')->columnSpan('full'),
                                    ])
                                    ->columnSpan(1),

                                Fieldset::make('Details')
                                    ->schema([
                                        TextInput::make('lo2_designation')->label('Designation')->columnSpan('full'),
                                        TextInput::make('lo2_contact')->label('Contact Number')->columnSpan('full'),
                                        TextInput::make('lo2_email')->label('Email')->email()->columnSpan('full'),
                                    ])
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(1),
                        ]),

            ])
        ];
    }
}
