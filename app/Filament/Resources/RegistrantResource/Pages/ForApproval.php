<?php

namespace App\Filament\Resources\RegistrantResource\Pages;

use App\Filament\Resources\RegistrantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\Pli;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Classification;
use Filament\Facades\Filament;
use App\Filament\Resources\RegistrantResource\Pages\Approved;


class ForApproval extends ListRecords
{
    protected static string $resource = RegistrantResource::class;

    public ?string $activeTab = 'for-approval';

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }

    public static function getNavigationGroup(): ?string
    {
        return 'PLIs List';
    }

    public static function getNavigationBadge(): ?string
    {
        // return RegistrantResource::getModel()::where('status', 'for-approval')->count();
        
        // $count = RegistrantResource::getModel()::where('status', 'for-approval')->count();

        // return $count > 0 ? (string) $count : null;

        
        $user = Filament::auth()->user();

        if ($user && $user->isEvaluator()) {
            $count = RegistrantResource::getModel()::where('status', 'for-approval')
                ->whereHas('plis.users', function ($query) use ($user) {
                    $query->where('users.id', $user->id);
                })
                ->count();
        } else {
            $count = RegistrantResource::getModel()::where('status', 'for-approval')->count();
        }

        return $count > 0 ? (string) $count : null;
    }

    // protected function getTableQuery(): Builder
    // {
    //     return parent::getTableQuery()
    //         ->where('usertype', 'user')
    //         ->where('status', 'for-approval');
    // }

    public function table(Table $table): Table
    {
        return $table
            ->columns($this->getTableColumns())
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
            ->actions($this->getTableActions());
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('email')
                ->sortable()
                ->searchable(),
            
            Tables\Columns\TextColumn::make('classification.name')
                ->label('Classification')
                ->searchable()
                ->sortable()
                ->toggleable(),

            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state) => match ($state) {
                    'for-evaluation' => 'gray',      // 1st stage - neutral color
                    'for-review'     => 'warning',   // 2nd stage - yellow/orange
                    'for-approval'   => 'info',      // 3rd stage - blue
                    'approved'       => 'success',   // Final approved - green
                    'rejected'       => 'danger',    // Final rejected - red
                    default          => 'secondary', // Fallback
                }),

            Tables\Columns\TextColumn::make('evaluator.name')
                ->label('Evaluator')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),

            Tables\Columns\TextColumn::make('eval_date')
                ->label('Eval Date')
                ->date('M d, Y')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),

            Tables\Columns\TextColumn::make('reviewer.name')
                ->label('Reviewer')
                ->sortable()
                ->searchable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),

            Tables\Columns\TextColumn::make('rev_date')
                ->label('Rev Date')
                ->date('M d, Y')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Requested At')
                ->dateTime()
                ->sortable(),
        ];
    }

    protected function getTableActions(): array
    {
        $user = Auth::user();
        $isEvaluator = $user?->userrole === 'Evaluator';
        $isReviewer = $user?->userrole === 'Reviewer';
        
        return [
            Action::make('approve')
                ->label('Approve')
                ->icon('heroicon-o-check-circle')
                ->action(function ($record) {
                    
                    $record->update([
                        'status'       => 'approved',
                        'approver_id' => Auth::id(), 
                        'approved_date'    => now(),      
                    ]);

                    Notification::make()
                        ->success()
                        ->title('PLI is approved!')
                        ->send();

                    // $this->dispatch('refresh');
                    
                    return redirect(RegistrantResource::getUrl('approved'));
                })
                ->requiresConfirmation()
                ->visible(fn () => Auth::user()?->userrole === 'Approver')
                ->color('success')
                ->disabled(function ($record) {
                    return $record->documents()->where('app_feedback', false)->exists();
                })
                ->color(function ($record) {
                    return $record->documents()->where('app_feedback', false)->exists()
                        ? 'secondary' // neutral color when disabled
                        : 'success';   // green when enabled
                })
                ,

            Action::make('reject')
                ->label('Reject')
                ->icon('heroicon-o-x-circle')
                ->action(function ($record) {
                    $record->update(['status' => 'rejected']);

                    Notification::make()
                        ->success()
                        ->title('User Rejected')
                        ->send();

                    // $this->dispatch('refresh');
                    
                    // return redirect(Approved::getUrl());
                    return redirect(RegistrantResource::getUrl('rejected'));
                })
                ->requiresConfirmation()
                ->color('danger')
                // ->visible(! $isEvaluator)                
                // ->visible(fn () => !($isEvaluator || $isReviewer))
                
                ->visible(fn () => Auth::user()?->userrole === 'Approver')
                ,

            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make()
                // ->visible(! $isEvaluator)                
                // ->visible(fn () => !($isEvaluator || $isReviewer))
                
                ->visible(fn () => Auth::user()?->userrole === 'Approver')
                ,
        ];
    }

    protected function getTableQuery(): Builder
    {
        $query = parent::getTableQuery()
            ->where('usertype', 'user')
            ->where('status', $this->activeTab);

        $user = Auth::user();

        if ($user && $user->userrole === 'Evaluator') {
            // Get PLIs assigned to the evaluator
            $pliIds = $user->plis()->pluck('plis.id');

            // Get all user IDs associated with those PLIs
            $userIds = Pli::whereIn('id', $pliIds)
                ->with('users')
                ->get()
                ->pluck('users')
                ->flatten()
                ->where('usertype', 'user') // Only include registrants
                ->pluck('id')
                ->unique();

            // Limit query to users assigned to those PLIs
            $query->whereIn('id', $userIds);
        }

        return $query;
    }

}
