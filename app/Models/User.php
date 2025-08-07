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

        // AR 1
        'AR1_FN', 'AR1_MN', 'AR1_LN', 'AR1_Designation', 'AR1_Contact', 'AR1_Email',
        // AR 2
        'AR2_FN', 'AR2_MN', 'AR2_LN', 'AR2_Designation', 'AR2_Contact', 'AR2_Email',
        // AR 3
        'AR3_FN', 'AR3_MN', 'AR3_LN', 'AR3_Designation', 'AR3_Contact', 'AR3_Email',
        // 'AR1_Name', 'AR1_Designation', 'AR1_Contact', 'AR1_Email',
        // 'AR2_Name', 'AR2_Designation', 'AR2_Contact', 'AR2_Email',
        // 'AR3_Name', 'AR3_Designation', 'AR3_Contact', 'AR3_Email',
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

    // public function isReviewer(): bool
    // {
    //     return $this->userrole === 'Reviewer';
    // }

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

    // public function assignedUsers()
    // {
    //     return $this->belongsToMany(User::class, 'pli_user', 'user_id', 'pli_id')  // adjust if incorrect
    //         ->withTimestamps();
    // }
    
}
