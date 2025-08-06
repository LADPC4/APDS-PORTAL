<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'file_path',
        'status',
        'remark',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function getFileUrlAttribute(): string
    {
        return asset('storage/' . $this->file_path);
    }

    public static function createDefaultDocumentsForUser(int $userId): void
    {
        $fixedDocuments = [
            'Certificate of Incorporation/Registration',
            'Amended Articles of Incorporations and By-Laws, if any',
            'Updated General Information Sheet',
            'Certification from SEC Non-Derogatory',
            'Monitoring Clearance',
            'Certificate of Authority',
            'Certification of Good Standing',
            'Certificate of Registration',
            'Amended Articles of Cooperation and By-Laws, if any;',
            'Updated Cooperative Annual Progress Report (CAPR)',
            'CDA Certificate of Good Standing/Compliance',
            'Letter of Intent',
            'Organization profile',
            'Ownership structure',
            'Updated CV/bio-data with photo ID. Government employees must submit CSC Form 212',
            'Provide a list of products/services for DepEd personnel.',
            'Certification from President/Chairman confirming legal operation for government employees benefit.',
            'Annual Financial Statements',
            'Copy of Income Tax Return (ITR)',
            'Updated BIR Certificate of Registration (Form 2303) of TIN;',
            'List/Directory of offices, personnel, and contacts',
            'Sample amortization schedules for each loan term',
            'Subscribed statement attesting to Truth in Lending Act with expanded Disclosure Statement on Loan/Credit Transaction.',
            'Business Permits',
            'Contract of Lease or proof of ownership of offices/branches;',
            'Certification executed by both the private entity and the affiliate companies can sufficiently render all the services.',
            'Board Resolution or Secretary\'s Certificate approving APDS accreditation application and authorized personnel.',
            'Sworn declaration of no contested ownership',
            'Certificate of No Intra-Corporate Dispute',
            'Certification that there is no pending case with any regulatory agencies',
            'Such other documents as may be deemed necessary by the Department.',
        ];

        foreach ($fixedDocuments as $docName) {
            self::firstOrCreate(
                ['user_id' => $userId, 'name' => $docName],
                ['status' => 'Pending', 'remark' => null, 'file_path' => null]
            );
        }
    }
}
