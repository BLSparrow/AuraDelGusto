<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'kcal',
        'price',
        'category_id'
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }

    public function category()
    {
        return $this->belongsTo(CategoryIngredient::class);
    }
}
