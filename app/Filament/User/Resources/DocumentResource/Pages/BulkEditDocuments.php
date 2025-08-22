<?php

namespace App\Filament\User\Resources\DocumentResource\Pages;

use App\Filament\User\Resources\DocumentResource;
use App\Models\Document;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BulkEditDocuments extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $resource = DocumentResource::class;
    protected static string $view = 'filament.user.resources.document-resource.pages.bulk-edit-documents';

    public array $formData = [];

    public function mount()
    {
        $ids = explode(',', request()->get('records', ''));

        $documents = Document::whereIn('id', $ids)
            ->whereNotIn('status', ['under-review', 'Evaluated', 'Reviewed', 'Approved'])
            ->get();

        $this->formData = $documents->map(function ($doc) {
            return [
                'id' => $doc->id,
                'name' => $doc->name,
                'user_id' => $doc->user_id,
                'status' => $doc->status,
                'remark' => $doc->remark,
                // 'file_path' => $doc->file_path, // load existing path if any
                // 'file_path' => $doc->file_path ? [$doc->file_path] : [],
            ];
        })->toArray();
    }

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Repeater::make('formData')
                    ->statePath('formData')
                    ->default($this->formData)
                    ->disableItemCreation()
                    ->disableItemDeletion()
                    ->disableItemMovement()
                    ->columns(2)
                    ->schema([
                        // TextInput::make('name')
                        //     ->label('Document Name')
                        //     ->disabled()
                        //     ->required(),

                        Hidden::make('user_id')
                            ->default(fn () => Auth::id())
                            ->dehydrated(),


                        FileUpload::make('file_path')
                            // ->label('Upload File')
                            ->label(fn ($get) => $get('name'))
                            ->disk('public')
                            ->directory('uploads')
                            ->maxSize(204800)
                            ->required()
                            ->getUploadedFileNameForStorageUsing(fn ($file) => $file->hashName())
                            // ->downloadable(fn ($record) => $record && $record['file_path'] ? asset('storage/' . $record['file_path']) : null)
                            ->previewable(false)
                            ->default(fn ($record) => $record['file_path'] ?? null)
                            ->dehydrated(false) // disable auto dehydration
                            ->afterStateUpdated(function ($state, callable $set, $get) {
                                if ($state) {
                                    // move file to permanent storage
                                    $storedPath = $state->store('uploads', 'public');
                                    $set('file_path', $storedPath); // update repeater state
                                }
                            })
                            ->columnSpanFull()
                            ,

                        TextInput::make('status')
                            ->label('Status')
                            ->default('Pending')
                            ->disabled()
                            ->required(),

                        Textarea::make('remark')
                            ->label('Remark')
                            ->rows(3)
                            ->disabled()
                            ->nullable(),
                    ]),
            ]);
    }

    public function save()
    {
        foreach ($this->formData as $row) {
            $document = Document::find($row['id']);
            if (!$document) continue;

            $document->file_path = $row['file_path'] ?? $document->file_path;
            $document->status = 'Pending';
            // $document->remark = $row['remark'] ?? $document->remark;

            $newRemark = 'Resubmitted';
            $previousRemark = $document->remark;

            $document->fill([
                'file_path' => $row['file_path'] ?? $document->file_path,
                'status' => 'Submitted',
                // 'remark' => !empty($previousRemark)
                //     ? $newRemark . "\nPrevious Remark - " . $previousRemark
                //     : $newRemark,
                'remark' => null
            ]);

            $document->saveQuietly();

            // $document->save();
        }


        // After saving all documents, update the user's status
        $userIds = collect($this->formData)->pluck('user_id')->unique();

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
                // Get all documents of the user
                $documents = $user->documents();

                // Check if any of the documents are 'Pending' or 'for-revision'
                $hasPendingOrRevision = $documents->whereIn('status', ['Pending', 'for-revision'])->exists();

                // If no documents are in 'Pending' or 'for-revision', set the user's status to 'for-evaluation'
                if (!$hasPendingOrRevision) {
                    if ($user->eval_date == null) {
                        $user->status = 'for-evaluation';
                        $user->saveQuietly(); // Save quietly to avoid triggering further events
                    } elseif ($user->rev_date == null) {
                        $user->status = 'for-review';
                        $user->saveQuietly(); // Save quietly to avoid triggering further events
                    } elseif ($user->approved_date == null) {
                        $user->status = 'for-approval';
                        $user->saveQuietly(); // Save quietly to avoid triggering further events
                    }
                } else {
                    // Otherwise, set the user's status to 'pending'
                    if ($user->status !== 'pending') {
                        $user->status = 'pending';
                        $user->saveQuietly(); // Save quietly to avoid triggering further events
                    }
                }
            }
        }


        Notification::make()
            ->title('Documents uploaded successfully.')
            ->success()
            ->send();

        return redirect(DocumentResource::getUrl('index'));
    }
}
