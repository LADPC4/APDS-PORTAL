<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExistingPli extends Model
{
    use HasFactory;
    
    protected $table = 'existing_plis';
    
    protected $fillable = [
        'name',
        'loan_code',
        'mas_code', 
        'insurance_code',
        'classification_id',
        'status',
        'user_in_charge',
        'CAR_region',
        'NCR_region',
        'R01_region',
        'R02_region',
        'R03_region',
        'R04A_region',
        'R04B_region',
        'R05_region',
        'R06_region',
        'R07_region',
        'R08_region',
        'R09_region',
        'R10_region',
        'R11_region',
        'R12_region',
        'R13_region',
        'CAR_provinces',
        'NCR_provinces',
        'R01_provinces',
        'R02_provinces',
        'R03_provinces',
        'R04A_provinces',
        'R04B_provinces',
        'R05_provinces',
        'R06_provinces',
        'R07_provinces',
        'R08_provinces',
        'R09_provinces',
        'R10_provinces',
        'R11_provinces',
        'R12_provinces',
        'R13_provinces',
    ];
    
    protected $casts = [
        'CAR_region' => 'boolean',
        'NCR_region' => 'boolean',
        'R01_region' => 'boolean',
        'R02_region' => 'boolean',
        'R03_region' => 'boolean',
        'R04A_region' => 'boolean',
        'R04B_region' => 'boolean',
        'R05_region' => 'boolean',
        'R06_region' => 'boolean',
        'R07_region' => 'boolean',
        'R08_region' => 'boolean',
        'R09_region' => 'boolean',
        'R10_region' => 'boolean',
        'R11_region' => 'boolean',
        'R12_region' => 'boolean',
        'R13_region' => 'boolean',
        'CAR_provinces' => 'array',
        'NCR_provinces' => 'array',
        'R01_provinces' => 'array',
        'R02_provinces' => 'array',
        'R03_provinces' => 'array',
        'R04A_provinces' => 'array',
        'R04B_provinces' => 'array',
        'R05_provinces' => 'array',
        'R06_provinces' => 'array',
        'R07_provinces' => 'array',
        'R08_provinces' => 'array',
        'R09_provinces' => 'array',
        'R10_provinces' => 'array',
        'R11_provinces' => 'array',
        'R12_provinces' => 'array',
        'R13_provinces' => 'array',
    ];
    
    /**
     * Relationship to Classification
     */
    public function classification(): BelongsTo
    {
        return $this->belongsTo(Classification::class);
    }
    
    /**
     * Relationship to User (user in charge)
     */
    public function userInCharge(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_in_charge');
    }
}