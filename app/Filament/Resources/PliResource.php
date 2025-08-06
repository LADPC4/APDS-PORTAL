<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PliResource\Pages;
use App\Filament\Resources\PliResource\RelationManagers;
use App\Models\Pli;
use App\Models\User;
use App\Models\Classification;
use App\Models\Region;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Tables\Filters\Layout;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Component;

class PliResource extends Resource
{
    protected static ?string $model = Pli::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'PLIs Code & Region';
    }    

    
    // protected static ?string $title = 'PLIs Code & Region';

    public static function form(Form $form): Form
    {
        $regions = [
            'CAR', 'NCR', 'R01', 'R02', 'R03', 'R04A', 'R04B',
            'R05', 'R06', 'R07', 'R08', 'R09', 'R10',
            'R11', 'R12', 'R13'
        ];

        return $form
            ->schema([
            Section::make('Basic Information')
                ->schema([
                    // Full-width PLI Name
                    Grid::make()
                        ->schema([
                            TextInput::make('name')
                                ->label('Name of PLI')
                                ->required()
                                ->columnSpanFull(),
                        ]),

                    // Two-column grid for short fields
                    Grid::make(2)
                        ->schema([
                            TextInput::make('loan_code')->label('Loan Code')->nullable(),
                            TextInput::make('mas_code')->label('MAS Code')->nullable(),
                            TextInput::make('insurance_code')->label('Insurance Code')->nullable(),
                            // TextInput::make('classification')->label('Classification')->nullable(),

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
                            //     ->required(),

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

                            Select::make('users')
                                ->label('In-Charge')
                                ->multiple()
                                ->relationship('users', 'name', fn ($query) =>
                                    $query->where('usertype', 'admin')
                                    // ->whereIn('userrole', ['Reviewer', 'Evaluator'])
                                    ->where('userrole', 'Evaluator')
                                )
                                ->visible(function (Component $component): bool {
                                    $user = Auth::user();

                                    // Always visible in 'view' context
                                    if (request()->routeIs('filament.admin.resources.plis.view')) {
                                        return true;
                                    }

                                    // Hide in edit/create for Evaluators
                                    return $user?->userrole !== 'Evaluator';
                                })
                                ->searchable()
                                ->preload(),

                                
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


                            Select::make('status')
                                ->label('Status')
                                ->options([
                                    'Active' => 'Active',
                                    'Inactive' => 'Inactive',
                                ])
                                ->required(),
                        ]),
                ]),

            // Section::make('Regional Configuration')
            //     ->schema([
            //         Grid::make(2)->schema([
            //             // Left column: Toggles
            //             Group::make(
            //                 collect($regions)->map(fn ($region) =>
            //                     Toggle::make($region)
            //                         ->label("{$region} Region")
            //                         ->reactive()
            //                 )->toArray()
            //             )->columnSpan(1),

            //             // Right column: Repeaters
            //             Group::make(
            //                 collect($regions)->map(fn ($region) =>
            //                     Repeater::make("{$region}_Prov")
            //                         ->label("{$region} Provinces")
            //                         ->addActionLabel("Add another Province in {$region}")
            //                         ->schema([
            //                             Grid::make()
            //                                 ->schema([
            //                                     TextInput::make('value')
            //                                         ->label('Province Name')
            //                                         ->inlineLabel()
            //                                         ->columnSpanFull(),
            //                                 ])
            //                         ])
            //                         ->columns(1)
            //                         ->grid(1)
            //                         ->collapsible()
            //                         ->collapsed()
            //                         // ->itemLabel(fn () => null)
            //                         ->itemLabel(fn (array $state): ?string => $state['value'] ?? null)
            //                         ->visible(fn ($get) => $get($region) === true)
            //                         ->columnSpanFull() // helps stretch inside group
            //                 )->toArray()
            //             )->columnSpan(1),
            //         ]),
            //     ]),
            // Section::make('Regional Configuration')
            //     ->schema([
            //         Select::make('region')
            //             ->label('Regions Covered')
            //             ->multiple()
            //             ->options(
            //                 Region::query()
            //                     ->orderBy('code')
            //                     ->pluck('code', 'code') // ['CAR' => 'CAR', 'R01' => 'R01', etc.]
            //                     ->toArray()
            //             )
            //             ->preload()
            //             ->searchable()
            //             ->required(),
            //     ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('name')
                ->label('Name of PLI')
                ->sortable()
                ->searchable(),
            TextColumn::make('loan_code')
                ->label('Loan Code')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('mas_code')
                ->label('MAS Code')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('insurance_code')
                ->label('Insurance Code')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            // TextColumn::make('classification_id')
            //     ->label('Classification')
            //     ->searchable()
            //     ->sortable()
            //     ->toggleable(),
            TextColumn::make('classification.name')
                ->label('Classification')
                ->searchable()
                ->sortable()
                ->toggleable(),
            TextColumn::make('status')
                ->label('Status')
                ->badge()
                ->color(fn (string $state) => match ($state) {
                    'Active' => 'success',
                    'Inactive' => 'danger',
                    default => 'gray',
                })
                ->searchable()
                ->sortable()
                ->toggleable(),
            TextColumn::make('in_charge')
                ->label('In-Charge')
                ->wrap()
                ->toggleable(),
            TextColumn::make('region')
                ->label('Active Regions')
                ->formatStateUsing(fn ($state, $record) => implode(', ', $record->region ?? []))
                ->wrap()
                ->toggleable(),
            TextColumn::make('created_at')
                ->label('Created')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true), // Hidden by default
            TextColumn::make('updated_at')
                ->label('Updated')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('name')
            ->filters([
                SelectFilter::make('loan_code')
                    ->label('Loan Code')
                    ->options(function () {
                        return Pli::query()
                            ->select('loan_code')
                            ->whereNotNull('loan_code')
                            ->distinct()
                            ->orderBy('loan_code')
                            ->pluck('loan_code', 'loan_code') // ['LC001' => 'LC001']
                            ->toArray();
                    }),
                SelectFilter::make('mas_code')
                    ->label('MAS Code')
                    ->options(function () {
                        return Pli::query()
                            ->select('mas_code')
                            ->whereNotNull('mas_code')
                            ->distinct()
                            ->orderBy('mas_code')
                            ->pluck('mas_code', 'mas_code') // ['LC001' => 'LC001']
                            ->toArray();
                    }),
                SelectFilter::make('insurance_code')
                    ->label('Insurance Code')
                    ->options(function () {
                        return Pli::query()
                            ->select('insurance_code')
                            ->whereNotNull('insurance_code')
                            ->distinct()
                            ->orderBy('insurance_code')
                            ->pluck('insurance_code', 'insurance_code') // ['LC001' => 'LC001']
                            ->toArray();
                    }),
                // SelectFilter::make('classification')
                //     ->label('Classification')
                //     ->options(function () {
                //         return \App\Models\Pli::query()
                //             ->select('classification')
                //             ->distinct()
                //             ->orderBy('classification')
                //             ->pluck('classification', 'classification') // key => value pairs
                //             ->toArray();
                //     }),

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
                
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'Active' => 'Active',
                        'Inactive' => 'Inactive',
                    ]),
                SelectFilter::make('users')  // the relation name
                    ->label('In-Charge')
                    ->multiple() // if you want to filter by multiple users
                    ->options(function () {
                        return User::query()
                            ->where('usertype', 'admin')
                            ->where('userrole', 'Evaluator')
                            ->orderBy('name')
                            ->pluck('name', 'id')
                            ->toArray();
                    })
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['values'])) {
                            foreach ($data['values'] as $userId) {
                                $query->whereHas('users', function ($q) use ($userId) {
                                    $q->where('users.id', $userId);
                                });
                            }
                        }
                    }),
                    // Show all selected user
                    // ->query(function (Builder $query, array $data) {
                    //     if (!empty($data['values'])) {
                    //         $query->whereHas('users', function ($q) use ($data) {
                    //             $q->whereIn('users.id', $data['values']);
                    //         });
                    //     }
                    // }),
                // SelectFilter::make('regions')
                //     ->label('Regions')
                //     ->multiple()
                //     ->options(function () {
                //         $regions = [
                //             'CAR', 'NCR', 'R01', 'R02', 'R03', 'R04A', 'R04B',
                //             'R05', 'R06', 'R07', 'R08', 'R09', 'R10',
                //             'R11', 'R12', 'R13',
                //         ];

                //         // Query to find which region columns are active in any Pli record
                //         $activeRegions = collect($regions)->filter(function ($region) {
                //             return Pli::where($region, true)->exists();
                //         });

                //         // Return array like ['CAR' => 'CAR', ...]
                //         return $activeRegions->mapWithKeys(fn($r) => [$r => $r])->toArray();
                //     })
                //     ->query(function (Builder $query, array $data) {
                //         if (!empty($data['values'])) {
                //             foreach ($data['values'] as $region) {
                //                 $query->where($region, true);
                //             }
                //         }
                //     }),
                SelectFilter::make('region')
                    ->label('Regions')
                    ->multiple()
                    ->options(
                        Region::orderBy('code')->pluck('code', 'code')->toArray()
                    )
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['values'])) {
                            $query->whereJsonContains('region', $data['values']);
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('toggleStatus')
                    ->label(fn ($record) => $record->status === 'Active' ? 'Deactivate' : 'Activate')
                    ->icon(fn ($record) => $record->status === 'Active' ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn ($record) => $record->status === 'Active' ? 'danger' : 'success')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update([
                            'status' => $record->status === 'Active' ? 'Inactive' : 'Active',
                        ]);
                    }),
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
            'index' => Pages\ListPlis::route('/'),
            'create' => Pages\CreatePli::route('/create'),
            'view' => Pages\ViewPli::route('/{record}'),
            'edit' => Pages\EditPli::route('/{record}/edit'),
        ];
    }
}
