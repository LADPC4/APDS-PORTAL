<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Document;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype',
        'status',
        // 'classification',
        'classification_id',
        'region',
        'address',
        'contact_number',
        'userrole',   
        'assigned_pli',
        // evaluation workflow
        'evaluator_id',
        'eval_date',
        'reviewer_id',
        'rev_date',
        'approver_id',
        'approved_date',

        // AR 1
        'AR1_FN', 'AR1_MN', 'AR1_LN', 'AR1_Designation', 'AR1_Contact', 'AR1_Email',
        // AR 2
        'AR2_FN', 'AR2_MN', 'AR2_LN', 'AR2_Designation', 'AR2_Contact', 'AR2_Email',
        // AR 3
        'AR3_FN', 'AR3_MN', 'AR3_LN', 'AR3_Designation', 'AR3_Contact', 'AR3_Email',

        // HO1 & HO2
        'ho1_fn','ho1_mn','ho1_ln','ho1_designation', 'ho1_designation_other', 'ho1_contact','ho1_email',
        'ho2_fn','ho2_mn','ho2_ln','ho2_designation', 'ho2_designation_other', 'ho2_contact','ho2_email',

        // CO1 & CO2
        'co1_fn','co1_mn','co1_ln','co1_designation','co1_contact','co1_email',
        'co2_fn','co2_mn','co2_ln','co2_designation','co2_contact','co2_email',

        // LO1 & LO2
        'lo1_fn','lo1_mn','lo1_ln','lo1_designation','lo1_contact','lo1_email',
        'lo2_fn','lo2_mn','lo2_ln','lo2_designation','lo2_contact','lo2_email',


    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // protected function casts(): array
    // {
    //     return [
    //         'email_verified_at' => 'datetime',
    //         'password' => 'hashed',
    //     ];
    // }    

    public function isEvaluator(): bool
    {
        return $this->userrole === 'Evaluator';
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'region' => 'array',  // << Here is the cast you need to add
    ];

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function plis()
    {
        return $this->belongsToMany(Pli::class);
    }

    protected static function booted()
    {
        static::created(function ($user) {
            if ($user->usertype === 'user') {
                Document::createDefaultDocumentsForUser($user->id);
            }
        });
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function evaluator()
    {
        return $this->belongsTo(User::class, 'evaluator_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }
}
