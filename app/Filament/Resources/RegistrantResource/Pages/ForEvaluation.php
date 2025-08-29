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
use App\Filament\Resources\RegistrantResource\Pages\ForReview;

use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Illuminate\Support\HtmlString;
class ForEvaluation extends ListRecords
{
    protected static string $resource = RegistrantResource::class;

    public ?string $activeTab = 'for-evaluation';

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
        // // return RegistrantResource::getModel()::where('status', 'for-evaluation')->count();
        
        // $count = RegistrantResource::getModel()::where('status', 'for-evaluation')->count();

        // return $count > 0 ? (string) $count : null;
        $user = Filament::auth()->user();

        if ($user && $user->isEvaluator()) {
            $count = RegistrantResource::getModel()::where('status', 'for-evaluation')
                ->whereHas('plis.users', function ($query) use ($user) {
                    $query->where('users.id', $user->id);
                })
                ->count();
        } else {
            $count = RegistrantResource::getModel()::where('status', 'for-evaluation')->count();
        }

        return $count > 0 ? (string) $count : null;
    }

    // protected function getTableQuery(): Builder
    // {
    //     return parent::getTableQuery()
    //         ->where('usertype', 'user')
    //         ->where('status', 'for-evaluation');
    // }

    
    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([

    //             Section::make('Submitted Documents')
    //                 ->schema([
    //                     Repeater::make('documents')
    //                         ->relationship() // assumes hasMany in model
    //                         ->disableItemCreation()
    //                         ->disableItemDeletion()
    //                         ->schema([
    //                             Grid::make(12)->schema([
    //                                 Placeholder::make('name')
    //                                     ->label('Document Name')
    //                                     ->content(fn ($record) => $record->name)
    //                                     ->columnSpan(5),

    //                                 Placeholder::make('file_path')
    //                                     ->label('Uploaded File')
    //                                     ->content(fn ($record) => $record->file_path
    //                                         ? new HtmlString('<a href="' . asset('storage/' . $record->file_path) . '" target="_blank" class="text-blue-600 underline hover:text-blue-800">View / Download File</a>')
    //                                         : 'No file uploaded')
    //                                     ->columnSpan(2),

    //                                 Grid::make(1)->schema([
    //                                     TextInput::make('remark')
    //                                         ->label('Remarks')
    //                                         ->placeholder('Remarks here...')
    //                                         ->disabled(function ($get) {
    //                                             $role = Filament::auth()->user()?->userrole;
    //                                             if ($role === 'Evaluator') {
    //                                                 return $get('eval_feedback') === true;
    //                                             }
    //                                             if ($role === 'Reviewer') {
    //                                                 return $get('rev_feedback') === true;
    //                                             }
    //                                             return false;
    //                                         })
    //                                         ->dehydrated(true),

    //                                     Checkbox::make('eval_feedback')
    //                                         ->label('Correct File (Evaluator)')
    //                                         ->live()
    //                                         ->visible(fn () => Filament::auth()->user()?->userrole === 'Evaluator'),
    //                                         // ->visible(fn () => in_array(
    //                                         //     Filament::auth()->user()?->userrole,
    //                                         //     ['Evaluator', 'Reviewer', 'Approver']
    //                                         // )),

    //                                     Checkbox::make('rev_feedback')
    //                                         ->label('Correct File (Reviewer)')
    //                                         ->live()
    //                                         ->visible(fn () => Filament::auth()->user()?->userrole === 'Reviewer'),
    //                                         // ->visible(fn () => in_array(
    //                                         //     Filament::auth()->user()?->userrole,
    //                                         //     ['Reviewer', 'Approver']
    //                                         // )),

    //                                 ])->columnSpan(5),
    //                             ]),
    //                         ])
    //                         ->columns(1)
    //                         ->columnSpan('full')
    //                 ])
    //                 ->columnSpan('full'),



    //         ]);
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
        return [
            Tables\Actions\ViewAction::make(),
            // Tables\Actions\ViewAction::make()
            //     ->label('Inspect')
            //     ->icon('heroicon-o-eye')
            //     ->color('info')
            //     ->url(fn ($record) => route('filament.admin.resources.registrants.view', ['record' => $record])),

            // Tables\Actions\EditAction::make()
            //     ->url(fn ($record) => route('filament.admin.resources.registrants.edit', [
            //         'record' => $record->getKey(),
            //     ]) . '?redirect=' . urlencode(url()->current())),

            Action::make('approve')
                ->label('Mark as Evaluated')
                ->icon('heroicon-o-check-circle')
                ->action(function ($record) {
                    // $record->update(['status' => 'for-review']);
                    
                    $record->update([
                        'status'       => 'for-review',
                        'evaluator_id' => Auth::id(), 
                        'eval_date'    => now(),      
                    ]);

                    Notification::make()
                        ->success()
                        ->title('PLI is forwarded to reviewer')
                        ->send();

                    // Refresh table
                    // $this->dispatch('refresh');

                    // Redirect to ForReview page
                    return redirect(ForReview::getUrl());
                    
                })
                ->requiresConfirmation()
                ->visible(fn () => Auth::user()?->userrole === 'Evaluator')
                ->disabled(function ($record) {
                    // Check if the user (record) has any documents with eval_feedback = 0
                    // Assuming $record->documents relationship exists
                    return $record->documents()->where('eval_feedback', false)->exists();
                })
                ->color(function ($record) {
                    return $record->documents()->where('eval_feedback', false)->exists()
                        ? 'secondary' // neutral color when disabled
                        : 'success';   // green when enabled
                }),

            Action::make('reject')
                ->label('Reject')
                ->icon('heroicon-o-x-circle')
                ->action(function ($record) {
                    $record->update(['status' => 'rejected']);

                    Notification::make()
                        ->success()
                        ->title('User Rejected')
                        ->send();

                    $this->dispatch('refresh');
                })
                ->requiresConfirmation()
                ->visible(fn () => Auth::user()?->userrole === 'Evaluator')
                ->color('danger'),
                

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
