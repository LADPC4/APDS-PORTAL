<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pli extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'name', 'loan_code', 'mas_code', 'insurance_code', 'classification_id', 'in_charge', 'status',
        'region',
        'CAR', 'CAR_Prov', 
        'NCR', 'NCR_Prov', 
        'R01', 'R01_Prov', 
        'R02', 'R02_Prov', 
        'R03', 'R03_Prov', 
        'R04A', 'R04A_Prov', 
        'R04B', 'R04B_Prov', 
        'R05', 'R05_Prov', 
        'R06', 'R06_Prov', 
        'R07', 'R07_Prov', 
        'R08', 'R08_Prov', 
        'R09', 'R09_Prov', 
        'R10', 'R10_Prov',
        'R11', 'R11_Prov',
        'R12', 'R12_Prov',
        'R13', 'R13_Prov',
    ];

    protected $casts = [
        'region' => 'array',
        'CAR_Prov' => 'array',
        'NCR_Prov' => 'array',
        'R01_Prov' => 'array',
        'R02_Prov' => 'array',
        'R03_Prov' => 'array',
        'R04A_Prov' => 'array',
        'R04B_Prov' => 'array',
        'R05_Prov' => 'array',
        'R06_Prov' => 'array',
        'R07_Prov' => 'array',
        'R08_Prov' => 'array',
        'R09_Prov' => 'array',
        'R10_Prov' => 'array',
        'R11_Prov' => 'array',
        'R12_Prov' => 'array',
        'R13_Prov' => 'array',
    ];

    // Accessor for total regions
    public function getTotalAttribute(): int
    {
        $regions = ['CAR', 'NCR', 'R01', 'R02', 'R03', 'R04A', 'R04B', 'R05', 'R06', 'R07', 'R08', 'R09', 'R10', 'R11', 'R12', 'R13'];
        return collect($regions)->filter(fn($region) => $this->$region === 1)->count();
    }

    // Accessor for region names list
    public function getRegionsAttribute(): array
    {
        return collect([
            'CAR', 'NCR', 'R01', 'R02', 'R03', 'R04A', 'R04B', 'R05',
            'R06', 'R07', 'R08', 'R09', 'R10', 'R11', 'R12', 'R13'
        ])->filter(fn($region) => $this->$region === 1)->values()->toArray();
    }

    // Accessor for all provinces list
    public function getProvincesAttribute(): array
    {
        $all = [];

        foreach (['CAR', 'NCR', 'R01', 'R02', 'R03', 'R04A', 'R04B', 'R05',
                  'R06', 'R07', 'R08', 'R09', 'R10', 'R11', 'R12', 'R13'] as $region) {
            $prov = $this->{$region . '_Prov'};
            if (is_array($prov)) {
                $all = array_merge($all, $prov);
            }
        }

        return array_unique($all);
    }

    public function inChargeUsers()
    {
        return $this->belongsToMany(User::class, 'pli_user_in_charge');
    }

    public function getInChargeAttribute()
    {
        return $this->users->pluck('name')->join(', ');
    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'pli_user', 'pli_id', 'user_id');
    }
    
    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function isOwnedBy(User $user): bool
    {
        return $this->users()->where('user_id', $user->id)->exists();
    }
}
