<?php

namespace App\Http\Controllers;

use App\Http\Resources\BasketResource;
use App\Models\Basket;
use App\Models\Menu;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {

        return view(
            'basket.index',
            [
                'basketMenus' => Basket::userBasketAllMenus()->get(),
                'totalPrice' => Basket::totalPrice(),
            ]
        );
    }

    public function basketPlus(Request $request)
    {
        $menu = Menu::find($request->data);
        $menuBasket = auth()->user()->baskets()->where('menu_id', $request->data)->first();

        if ($menuBasket === null) {
            $menuBasket = auth()->user()->baskets()->create(['menu_id' => $request->data, 'count' => 1]);
        } else {
            $menuBasket->count++;
            $menuBasket->save();
        }
        return new BasketResource($menuBasket);
    }

    public function basketMinus(Request $request)
    {
        $menu = Menu::find($request->data);
        $menuBasket = auth()->user()->baskets()->where('menu_id', $request->data)->first();

        if ($menuBasket->count > 0) {
            $menuBasket->count--;
            $menuBasket->save();
        } else {
            $menuBasket->delete();
        }

        return new BasketResource($menuBasket);
    }

    public function totalCount()
    {
        $baskets = Basket::userBasketAllMenus()->get();
        $sum = 0;
        foreach ($baskets as $basket) {
            $sum += $basket->count;
        }
        return $sum;
    }
}
