<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Document extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'file_path',
        'status',
        'remark',        
        'eval_feedback',
        'rev_feedback',
        'app_feedback',
        'prev_remark',
    ];

    protected $casts = [
        'eval_feedback' => 'boolean',
        'rev_feedback' => 'boolean',
        'app_feedback' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function getFileUrlAttribute(): string
    {
        return asset('storage/' . $this->file_path);
    }

    protected static function booted()
    {
        
        static::saving(function (Document $doc) {
            $currentUser = Auth::user();

            if ($currentUser?->usertype === 'user') {   
                $doc->remark = '';

                // Prevent changes if document is under review
                if (
                    $doc->exists &&
                    // $doc->getOriginal('status') === 'for-review'
                    in_array($doc->getOriginal('status'), [
                        'under-review', 
                        'Evaluated', 
                        'Reviewed', 
                        'Approved'
                    ])
                ) {
                    // Keep original file and name
                    $doc->file_path = $doc->getOriginal('file_path');
                    $doc->name = $doc->getOriginal('name');

                    // Also keep status
                    $doc->status = $doc->getOriginal('status');

                    return false; // Stop saving completely
                }

                // User upload logic for allowed cases
                if (!empty($doc->file_path)) {
                    $doc->status = 'Submitted';
                }
            } 
            else {

                $role = $currentUser?->userrole;

                if ($role === 'Evaluator') {
                    if ($doc->eval_feedback === true) {
                        $doc->status = 'Evaluated';
                        $doc->remark = null; // clear remark if correct file
                    } else {
                        if (!empty($doc->remark)) {
                            $doc->status = 'for-revision';
                        } elseif (empty($doc->file_path)) {
                            $doc->status = 'Pending';
                        } elseif (!empty($doc->file_path)) {
                            $doc->status = 'under-review';
                        }
                    }
                }

                if ($role === 'Reviewer') {
                    if (!empty($doc->remark)) {
                        $doc->eval_feedback = false;
                    }
                    if ($doc->rev_feedback === true) {
                        $doc->status = 'Reviewed';
                        $doc->remark = null;
                    } else {
                        if (!empty($doc->remark)) {
                            $doc->status = 'for-revision';
                        } elseif (empty($doc->file_path)) {
                            $doc->status = 'Pending';
                        } elseif (!empty($doc->file_path)) {
                            $doc->status = 'under-review';
                        }
                    }
                }

                if ($role === 'Approver') {
                    if (!empty($doc->remark)) {
                        $doc->app_feedback = false;
                    }
                    if ($doc->app_feedback === true) {
                        $doc->status = 'Approved';
                        $doc->remark = null;
                    } else {
                        if (!empty($doc->remark)) {
                            $doc->status = 'for-revision';
                        } elseif (empty($doc->file_path)) {
                            $doc->status = 'Pending';
                        } elseif (!empty($doc->file_path)) {
                            $doc->status = 'under-review';
                        }
                    }
                }
                

                // ✅ Append remark to prev_remark if changed
                if ($doc->isDirty('remark') && !empty($doc->remark)) {
                    $admin = $currentUser?->name ?? 'Admin';
                    $timestamp = now()->format('M d, Y');

                    $newRemark = "[{$role}] {$admin} - [{$timestamp}] \n[Remark]: " . $doc->remark;

                    // prepend so newest is on top
                    $doc->prev_remark = $newRemark . "\n" . ($doc->prev_remark ?? '');

                    // keep remark if you want, or clear it after moving to history
                    // $doc->remark = null;
                }
            }
        });


        static::saved(function (Document $doc) {
            $user = $doc->user;

            if ($user) {
                $documents = $user->documents();

                // Check if user still has pending/revision documents
                $hasPendingOrRevision = $documents->whereIn('status', ['Pending', 'for-revision'])->exists();

                if ($hasPendingOrRevision) {
                    // Downgrade to pending if any document requires attention
                    if ($user->status !== 'pending') {
                        $user->status = 'pending';
                        $user->saveQuietly();
                    }
                    return; // stop here
                }

                // ✅ No pending/revision documents left, decide next step
                if ($user->eval_date === null) {
                    if ($user->status !== 'for-evaluation') {
                        $user->status = 'for-evaluation';
                        $user->saveQuietly();
                    }
                } elseif ($user->rev_date === null) {
                    if ($user->status !== 'for-review') {
                        $user->status = 'for-review';
                        $user->saveQuietly();
                    }
                } elseif ($user->approved_date === null) {
                    if ($user->status !== 'for-approval') {
                        $user->status = 'for-approval';
                        $user->saveQuietly();
                    }
                } else {
                    // If everything is completed, mark as approved/final
                    if ($user->status !== 'approved') {
                        // $user->status = 'approved';
                        $user->saveQuietly();
                    }
                }

                //     // If user status is already advanced, only update if documents require downgrade
                //     if (in_array($user->status, ['for-review', 'for-approval', 'approved'])) {
                //         // Check if any documents have statuses that require lowering user status
                //         $hasPendingOrRevision = $documents->whereIn('status', ['Pending', 'for-revision'])->exists();

                //         if ($hasPendingOrRevision && $user->status !== 'pending') {
                //             $user->status = 'pending';
                //             $user->saveQuietly();
                //         }
                //         // Else don't reset user status downward
                //         return;
                //     }

                //     // Else run your existing logic:
                //     if ($documents->whereIn('status', ['Pending', 'for-revision'])->exists()) {
                //         if ($user->status !== 'pending') {
                //             $user->status = 'pending';
                //             $user->saveQuietly();
                //         }
                //         return;
                //     } else {
                //     if ($user->status !== 'completed') {   // or whatever status you need
                //         $user->status = 'completed';
                //         $user->saveQuietly();
                //     }
                // }

                //     // Default fallback
                //     if ($user->status !== 'for-evaluation') {
                //         $user->status = 'for-evaluation';
                //         $user->saveQuietly();
                //     }
            }
        });

    }

    public function classificationDocument()
    {
        return $this->belongsTo(ClassificationDocument::class);
    }


    public static function createDefaultDocumentsForUser(int $userId): void
    {
        $user = User::findOrFail($userId);

        if (!$user->classification_id) {
            return; // Skip if no classification
        }

        $classificationDocs = ClassificationDocument::where('classification_id', $user->classification_id)->get();

        foreach ($classificationDocs as $classDoc) {
            self::firstOrCreate(
                [
                    'user_id' => $userId,
                    'classification_document_id' => $classDoc->id
                ],
                [
                    'name' => $classDoc->name,
                    'status' => 'Pending',
                    'remark' => null,
                    'file_path' => null
                ]
            );
        }
    }
}
