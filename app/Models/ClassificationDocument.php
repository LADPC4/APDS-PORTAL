<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassificationDocument extends Model
{
    use HasFactory;

    protected $fillable = ['classification_id', 'name'];

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }
}
