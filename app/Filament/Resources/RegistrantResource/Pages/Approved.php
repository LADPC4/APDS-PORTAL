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


class Approved extends ListRecords
{
    protected static string $resource = RegistrantResource::class;

    public ?string $activeTab = 'approved';

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

    // protected function getTableQuery(): Builder
    // {
    //     return parent::getTableQuery()
    //         ->where('usertype', 'user')
    //         ->where('status', 'approved');
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
                ->searchable(),

            Tables\Columns\TextColumn::make('eval_date')
                ->label('Eval Date')
                ->date('M d, Y'),

            Tables\Columns\TextColumn::make('reviewer.name')
                ->label('Reviewer')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('rev_date')
                ->label('Eval Date')
                ->date('M d, Y'),

            Tables\Columns\TextColumn::make('approver.name')
                ->label('Approver')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('approved_date')
                ->label('Approved Date')
                ->date('M d, Y'),

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
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make()
                ->visible(fn () => !($isEvaluator || $isReviewer)),

            Action::make('generateTcaa')
                ->label('Generate TCAA')
                ->icon('heroicon-o-document-arrow-down')
                ->color('success')
                ->visible(function () use ($user) {
                    return $user && in_array($user->userrole, ['SuperAdmin', 'Approver']);
                })
                ->requiresConfirmation()
                ->modalHeading('Generate TCAA Document')
                ->modalDescription(function ($record) {
                    $pliCount = $record->plis()->count();
                    if ($pliCount > 1) {
                        return 'This user has multiple PLIs. Please select the PLI and TCAA type to generate:';
                    } else {
                        return 'Select which TCAA document type to generate:';
                    }
                })
                ->modalSubmitActionLabel('Generate')
                ->form(function ($record) {
                    $userPlis = $record->plis()->get();
                    $pliOptions = $userPlis->pluck('name', 'id')->toArray();
                    
                    $formFields = [];
                    
                    // If user has multiple PLIs, show PLI selection
                    if ($userPlis->count() > 1) {
                        $formFields[] = \Filament\Forms\Components\Select::make('pli_id')
                            ->label('Select PLI')
                            ->options($pliOptions)
                            ->required()
                            ->native(false);
                    }
                    
                    // Always show TCAA type selection
                    $formFields[] = \Filament\Forms\Components\Select::make('tcaa_type')
                        ->label('TCAA Document Type')
                        ->options([
                            'loans' => 'TCAA for Loans',
                            'insurance' => 'TCAA for Insurance Premia and Membership Dues/Contributions',
                        ])
                        ->required()
                        ->native(false);
                    
                    return $formFields;
                })
                ->action(function (array $data, $record) {
                    $tcaaService = new \App\Services\TcaaService();
                    
                    // Determine which PLI to use
                    if (isset($data['pli_id'])) {
                        // Multiple PLIs - user selected one
                        $pliId = $data['pli_id'];
                    } else {
                        // Single PLI - get the first (and only) one
                        $pliId = $record->plis()->first()->id;
                    }
                    
                    $pli = \App\Models\Pli::findOrFail($pliId);
                    $downloadUrl = $tcaaService->generateTcaaUrl($pli, $data['tcaa_type']);
                    
                    // Redirect to download
                    return redirect($downloadUrl);
                }),

            Action::make('revoke')
                ->label('Revoke Approval')
                ->icon('heroicon-o-arrow-uturn-left')
                ->color('warning')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'for-approval']);

                    Notification::make()
                        ->success()
                        ->title('Approval Revoked')
                        ->send();

                    $this->dispatch('refresh');
                })
                ->visible(fn () => !($isEvaluator || $isReviewer)),
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
