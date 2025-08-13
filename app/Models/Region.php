<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'provinces'];

    protected $casts = [
        'provinces' => 'array',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function plis()
    {
        return $this->hasMany(Pli::class);
    }

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}
