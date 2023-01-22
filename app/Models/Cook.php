<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cook extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'position'
    ];

    public function getImageUrlAttribute(): string
    {
        return url("/storage/{$this->image}");
    }
}
