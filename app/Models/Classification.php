<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classification extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function plis()
    {
        return $this->hasMany(Pli::class);
    }
    
    public function requiredDocuments()
    {
        return $this->hasMany(ClassificationDocument::class);
    }
}
