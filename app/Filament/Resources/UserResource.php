<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Auth;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    public static function getNavigationLabel(): string
    {
        return 'Admins';
    }    

    public static function getNavigationGroup(): ?string
    {
        return 'Admin Management';
    }

    public static function canCreate(): bool
    {
        return in_array(Auth::user()?->userrole, ['SuperAdmin', 'Approver', 'Reviewer']);
    }

    public static function canEdit(Model $record): bool
    {
        return in_array(Auth::user()?->userrole, ['SuperAdmin', 'Approver', 'Reviewer']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('password')->password()->required()->visibleOn('create'),

                Select::make('usertype')
                    ->options(function () {
                        $loggedUser = Auth::user();

                        if ($loggedUser?->userrole === 'SuperAdmin') {
                            return [
                                'admin' => 'Admin',
                                'user' => 'User',
                            ];
                        }

                        return [
                            'admin' => 'Admin',
                        ];
                    })
                    ->default(function () {
                        return 'admin'; // Always default to admin
                    })
                    ->required(),

                Select::make('userrole')
                    ->options(function () {
                        $loggedUser = Auth::user();

                        if ($loggedUser?->userrole === 'SuperAdmin') {
                            return [
                                'None' => 'None',
                                'SuperAdmin' => 'SuperAdmin',
                                'Evaluator' => 'Evaluator',
                                'Reviewer' => 'Reviewer',
                                'Approver' => 'Approver',
                            ];
                        }

                        if ($loggedUser?->userrole === 'Approver') {
                            return [
                                'None' => 'None',
                                'Evaluator' => 'Evaluator',
                                'Reviewer' => 'Reviewer',
                                'Approver' => 'Approver',
                            ];
                        }

                        if ($loggedUser?->userrole === 'Reviewer') {
                            return [
                                'Evaluator' => 'Evaluator',
                            ];
                        }

                        return [
                            'None' => 'None',
                        ];
                    })
                    ->default(function () {
                        $loggedUser = Auth::user();
                        return $loggedUser?->userrole === 'Evaluator' ? 'Reviewer' : 'None';
                    })
                    ->required(),

                Select::make('plis')
                    ->label('Assigned PLIs')
                    ->multiple()
                    ->relationship('plis', 'name')
                    ->searchable()
                    ->preload()
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([                
                TextColumn::make('usertype')
                    ->label('User Type')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('userrole')
                    ->label('Admin Role')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('name')
                    ->label('Admin Name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('plis.name')
                    ->label('Assigned PLIs')
                    ->formatStateUsing(function ($state, $record) {
                        return $record->plis->pluck('name')->join(', ');
                    })
                    ->wrap()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('userrole')
                    ->label('Admin Role')
                    ->options([
                        'None' => 'None',
                        'Evaluator' => 'Evaluator',
                        'Reviewer' => 'Reviewer',
                        'Approver' => 'Approver',
                    ]),
                
                SelectFilter::make('plis')
                    ->label('Assigned PLIs')
                    ->multiple()
                    ->options(function () {
                        return \App\Models\Pli::orderBy('name')->pluck('name', 'id')->toArray();
                    })
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['values'])) {
                            foreach ($data['values'] as $pliId) {
                                $query->whereHas('plis', function ($q) use ($pliId) {
                                    $q->where('plis.id', $pliId);
                                });
                            }
                        }
                    }),
            ])
            ->defaultSort('name')
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function shouldRegisterNavigation(): bool
    {
        // Safely get the user (may return null early in lifecycle or CLI)
        $user = Auth::user();

        // Show only if not a Evaluator (or unauthenticated)
        return $user?->userrole !== 'Evaluator';
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'for-review' => Pages\ForReviewUsers::route('/for-review'),
            'approved' => Pages\ApprovedUsers::route('/approved'),
            'rejected' => Pages\RejectedUsers::route('/rejected'),
        ];
    }
}
