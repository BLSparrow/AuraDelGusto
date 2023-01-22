<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryIngredient extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name',];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
