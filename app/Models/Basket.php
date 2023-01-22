<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        'count',
        'user_id',
        'menu_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public static function userBasketAllMenus()
    {
        return auth()->user()->baskets();
    }

    public static function totalPrice()
    {
        return auth()->user()->baskets()->get()->map(function ($item) {
            return $item->menu->price * $item->count;
        })->sum();
    }

    public static function totalCount()
    {
        return auth()->user()->baskets()->get()->map(function ($item) {
            return $item->count;
        })->sum();
    }

    public function getPriceInRubAttribute()
    {
        return number_format(num: $this->menu->price * $this->count, thousands_separator: ' ');
    }
}
