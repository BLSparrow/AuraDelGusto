<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function getImageUrlAttribute(): string
    {
        return url("/storage/{$this->image}");
    }
}
