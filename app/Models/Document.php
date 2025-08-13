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
    ];

    protected $casts = [
        'eval_feedback' => 'boolean',
        'rev_feedback' => 'boolean',
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
                // $doc->remark = '—';
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

                // if ($doc->eval_feedback === true) {
                //     $doc->status = 'Evaluated';
                // } else {
                //     // When unchecked
                //     $doc->status = 'under-review';
                // }

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
            }
        });

        // static::saved(function (Document $doc) {
        //     $user = $doc->user;

        //     if ($user) {
        //         $documents = $user->documents();

        //         if ($documents->whereIn('status', ['Pending', 'for-revision'])->exists()) {
        //             if ($user->status !== 'pending') {
        //                 $user->status = 'pending';
        //                 $user->saveQuietly();
        //             }
        //             return;
        //         }

        //         if ($documents->where('status', 'for-review')->exists()) {
        //             if ($user->status !== 'for-review') {
        //                 $user->status = 'for-review';
        //                 $user->saveQuietly();
        //             }
        //             return;
        //         }

        //         if ($documents->where('status', 'for-approval')->exists()) {
        //             if ($user->status !== 'for-approval') {
        //                 $user->status = 'for-approval';
        //                 $user->saveQuietly();
        //             }
        //             return;
        //         }

        //         // Default fallback
        //         if ($user->status !== 'for-evaluation') {
        //             $user->status = 'for-evaluation';
        //             $user->saveQuietly();
        //         }
        //     }
        // });

        static::saved(function (Document $doc) {
    $user = $doc->user;

    if ($user) {
        $documents = $user->documents();

        // If user status is already advanced, only update if documents require downgrade
        if (in_array($user->status, ['for-review', 'for-approval', 'approved'])) {
            // Check if any documents have statuses that require lowering user status
            $hasPendingOrRevision = $documents->whereIn('status', ['Pending', 'for-revision'])->exists();

            if ($hasPendingOrRevision && $user->status !== 'pending') {
                $user->status = 'pending';
                $user->saveQuietly();
            }
            // Else don't reset user status downward
            return;
        }

        // Else run your existing logic:
        if ($documents->whereIn('status', ['Pending', 'for-revision'])->exists()) {
            if ($user->status !== 'pending') {
                $user->status = 'pending';
                $user->saveQuietly();
            }
            return;
        }

        if ($documents->where('status', 'for-review')->exists()) {
            if ($user->status !== 'for-review') {
                $user->status = 'for-review';
                $user->saveQuietly();
            }
            return;
        }

        if ($documents->where('status', 'for-approval')->exists()) {
            if ($user->status !== 'for-approval') {
                $user->status = 'for-approval';
                $user->saveQuietly();
            }
            return;
        }

        // Default fallback
        if ($user->status !== 'for-evaluation') {
            $user->status = 'for-evaluation';
            $user->saveQuietly();
        }
    }
});

        
            // static::saving(function (Document $doc) {
            //     $currentUser = Auth::user();

            //     if ($currentUser?->usertype === 'user') {
            //         // User upload logic
            //         if (!empty($doc->file_path)) {
            //             $doc->status = 'Submitted';
            //         }
            //     } else {
            //         // Admin save logic
            //         if (!empty($doc->remark)) {
            //             $doc->status = 'for-revision';
            //         } elseif (empty($doc->file_path)) {
            //             $doc->status = 'Pending';
            //         }

            //         if ($doc->eval_feedback === true) {
            //             $doc->status = 'Evaluated';
            //         }
            //     }
            // });
            
            // static::saved(function (Document $doc) {
            //     $user = $doc->user;

            //     if ($user) {
            //         $hasPendingOrRevision = $user->documents()
            //             ->whereIn('status', ['Pending', 'for-revision'])
            //             ->exists();

            //         if ($hasPendingOrRevision) {
            //             if ($user->status !== 'pending') {
            //                 $user->status = 'pending';
            //                 $user->saveQuietly();
            //             }
            //         } else {
            //             if ($user->status !== 'for-evaluation') {
            //                 $user->status = 'for-evaluation';
            //                 $user->saveQuietly();
            //             }
            //         }
            //     }
            // });
        }

    public function classificationDocument()
    {
        return $this->belongsTo(ClassificationDocument::class);
    }

    // public static function createDefaultDocumentsForUser(int $userId): void
    // {
    //     $fixedDocuments = [
    //         // a. For SEC registered entities:
    //         'Certificate of Incorporation/Registration',
    //         'Amended Articles of Incorporations and By-Laws, if any',
    //         'Updated General Information Sheet',
    //         'Certification from SEC Non-Derogatory',
    //         'Monitoring Clearance',

    //         // b. For BSP registered entities:
    //         'Certificate of Authority',
    //         'Certification of Good Standing',
            
    //         // c. For IC registered entities:
    //         'Certificate of Registration',
    //         'Amended Articles of Cooperation and By-Laws, if any;',
    //         'Updated Cooperative Annual Progress Report (CAPR)',
    //         'CDA Certificate of Good Standing/Compliance',
    //         'Letter of Intent',
    //         'Organization profile',
    //         'Ownership structure',
    //         'Updated CV/bio-data with photo ID. Government employees must submit CSC Form 212',
    //         'Provide a list of products/services for DepEd personnel.',
    //         'Certification from President/Chairman confirming legal operation for government employees benefit.',
    //         'Annual Financial Statements',
    //         'Copy of Income Tax Return (ITR)',
    //         'Updated BIR Certificate of Registration (Form 2303) of TIN;',
    //         'List/Directory of offices, personnel, and contacts',
    //         'Sample amortization schedules for each loan term',
    //         'Subscribed statement attesting to Truth in Lending Act with expanded Disclosure Statement on Loan/Credit Transaction.',
    //         'Business Permits',
    //         'Contract of Lease or proof of ownership of offices/branches;',
    //         'Certification executed by both the private entity and the affiliate companies can sufficiently render all the services.',
    //         'Board Resolution or Secretary\'s Certificate approving APDS accreditation application and authorized personnel.',
    //         'Sworn declaration of no contested ownership',
    //         'Certificate of No Intra-Corporate Dispute',
    //         'Certification that there is no pending case with any regulatory agencies',
    //         'Such other documents as may be deemed necessary by the Department.',
    //     ];

    //     foreach ($fixedDocuments as $docName) {
    //         self::firstOrCreate(
    //             ['user_id' => $userId, 'name' => $docName],
    //             ['status' => 'Pending', 'remark' => null, 'file_path' => null]
    //         );
    //     }
    // }

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
