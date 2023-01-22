<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id',
        'weight',
        'price',
        'kilocalories',
    ];

    public function getImageUrlAttribute(): string
    {
        return url("/storage/{$this->image}");
    }

//    public function getShortDescrAttribute()
//    {
//        return mb_substr($this->description, 0, 50) . "...";
//    }

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function baskets()
    {
        return $this->hasMany(Basket::class);
    }

    public function orderMenu()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function priceMenu($weightIng, $ingredientId)
    {
        $price = 0;
        foreach ($ingredientId as $id) {
            $ingredient = Ingredient::where('id', '=', $id)->first();
            foreach ($weightIng as $weight) {
                $price += ($weight / 1000) * $ingredient->price;
            }
        }
        return $price;
    }

    public static function kcalMenu($weightIng, $ingredientId)
    {
        $kcal = 0;
        foreach ($ingredientId as $id) {
            $ingredient = Ingredient::where('id', '=', $id)->first();
            foreach ($weightIng as $weight) {
                $kcal += ($weight / 100) * $ingredient->kcal;
            }
        }
        return $kcal;
    }

    public static function weightMenu($weightIng)
    {
        $weight = 0;

        foreach ($weightIng as $value) {
            $weight += $value;
        }

        return $weight;
    }
}
