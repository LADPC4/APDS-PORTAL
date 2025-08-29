<?php

namespace App\Filament\User\Resources;

use Spatie\Activitylog\Models\Activity;
use App\Filament\User\Resources\ActivityLogResource\Pages;
use App\Filament\User\Resources\ActivityLogResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;



class ActivityLogResource extends Resource
{
    protected static ?string $model = Activity::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Activity Logs';
    protected static ?string $pluralModelLabel = 'Activity Logs';
    protected static ?string $modelLabel = 'Activity Log';
        
    public static function getNavigationSort(): ?int
    {
        return 3; // Higher than Document
    }    

    // /**
    //  * Filter table query depending on logged-in user
    //  */
    // public static function getTableQuery(): Builder
    // {
    //     $query = parent::getTableQuery();

    //     /** @var User|null $user */
    //     $user = auth()->guard('web')->user();

    //     if ($user && $user->usertype === 'admin') {
    //         return $query; // Admin sees all logs
    //     }

    //     if ($user) {
    //         return $query->where('causer_id', $user->id); // User sees only their own logs
    //     }

    //     return $query->whereRaw('0 = 1'); // fallback: show nothing if not logged in
    // }

    public static function getTableQuery(): Builder
    {
        $query = parent::getTableQuery();

        $user = auth()->guard('web')->user();

        if ($user) {
            return $query->where('subject_id', $user->id)
                        ->where('subject_type', User::class); // <-- important
        }

        return $query->whereRaw('0 = 1');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('event')
                    ->label('Event')
                    ->extraCellAttributes(['class' => 'align-top'])
                    ->sortable(),
                
                TextColumn::make('description')
                    ->label('Description')
                    ->extraCellAttributes(['class' => 'align-top'])
                    ->wrap()
                    ->width('300px')
                    ,
                
                // TextColumn::make('properties')
                //     ->label('Details')
                //     ->json()
                //     ->wrap(),

                // TextColumn::make('properties')
                //     ->label('Details')
                //     ->getStateUsing(fn(Activity $record) => json_encode($record->properties, JSON_PRETTY_PRINT))
                //     ->wrap(),

                // TextColumn::make('properties')
                //     ->label('Details')
                //     ->getStateUsing(function (Activity $record) {
                //         return collect($record->properties)->map(function ($value, $key) {
                //             // If it's an array with 'old' and 'new'
                //             if (is_array($value) && isset($value['old'], $value['new'])) {
                //                 $old = is_array($value['old']) ? json_encode($value['old']) : $value['old'];
                //                 $new = is_array($value['new']) ? json_encode($value['new']) : $value['new'];
                //                 return "$key<br>old: $old<br>new: $new";
                //             }

                //             // If value itself is array, convert to JSON
                //             if (is_array($value)) {
                //                 $value = json_encode($value);
                //             }

                //             return "$key<br>$value";
                //         })->implode('<br><br>'); // double <br> between properties
                //     })
                //     ->html() // allows <br> to render
                //     ->wrap(),

                // TextColumn::make('properties')
                //     ->label('Details')
                //     ->getStateUsing(function (Activity $record) {
                //         $formatValue = function ($val) use (&$formatValue) {
                //             // If it's a JSON string, decode it
                //             if (is_string($val) && ($json = json_decode($val, true)) !== null) {
                //                 return $formatValue($json);
                //             }

                //             // If it's an array with 'old' and 'new'
                //             if (is_array($val) && isset($val['old'], $val['new'])) {
                //                 $old = is_array($val['old']) ? json_encode($val['old']) : ($val['old'] ?? 'null');
                //                 $new = is_array($val['new']) ? json_encode($val['new']) : ($val['new'] ?? 'null');
                //                 return "old: $old<br>new: $new";
                //             }

                //             // If it's a plain array, convert to string
                //             if (is_array($val)) {
                //                 return json_encode($val);
                //             }

                //             return $val ?? 'null';
                //         };

                //         return collect($record->properties)->map(function ($value, $key) use ($formatValue) {
                //             return "$key<br>" . $formatValue($value);
                //         })->implode('<br><br>');
                //     })
                //     ->html()
                //     ->wrap(),

                TextColumn::make('properties')
                    ->label('Details')
                    ->extraCellAttributes(['class' => 'align-top'])
                    ->getStateUsing(function (Activity $record) {
                        return collect($record->properties)->map(function ($value, $label) {
                            return "<strong>{$label}</strong><br>{$value}";
                        })->implode('<br><br>');
                    })
                    ->html()
                    ->wrap(),
                
                
                TextColumn::make('causer_name')
                    ->label('Performed By')
                    ->extraCellAttributes(['class' => 'align-top'])
                    ->getStateUsing(fn(Activity $record) => $record->causer?->name ?? 'System'),

                TextColumn::make('created_at')
                    ->label('Performed At')
                    ->extraCellAttributes(['class' => 'align-top'])
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ]);
    }

    // protected static ?string $model = ActivityLog::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             //
    //         ]);
    // }

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //             //
    //         ])
    //         ->filters([
    //             //
    //         ])
    //         ->actions([
    //             Tables\Actions\EditAction::make(),
    //         ])
    //         ->bulkActions([
    //             Tables\Actions\BulkActionGroup::make([
    //                 Tables\Actions\DeleteBulkAction::make(),
    //             ]),
    //         ]);
    // }

    // public static function getRelations(): array
    // {
    //     return [
    //         //
    //     ];
    // }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivityLogs::route('/'),
            // 'create' => Pages\CreateActivityLog::route('/create'),
            // 'edit' => Pages\EditActivityLog::route('/{record}/edit'),
        ];
    }
}
