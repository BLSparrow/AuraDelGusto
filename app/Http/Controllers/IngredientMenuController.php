<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Menu;

class IngredientMenuController extends Controller
{
    public function attachIngredient(Menu $menu, Ingredient $ingredient)
    {
        $menu->ingredients()->attach($ingredient);
        return back();
    }

    public function detachIngredient(Menu $menu, Ingredient $ingredient)
    {
        $menu->ingredients()->detach($ingredient);
        return back();
    }
}
