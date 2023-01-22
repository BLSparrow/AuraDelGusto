<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Resources\MenuResource;
use App\Models\Basket;
use App\Models\CategoryProduct;
use App\Models\Ingredient;
use App\Models\Menu;
use App\Services\FileService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menus()
    {
        return view('menu.allMenu', ['menus' => Menu::all()]);
    }

    public function getMenuByCategory(CategoryProduct $category)
    {
        return view('menu.allMenu', ['menus' => Menu::where('category_id', '=', $category->id)->get(), 'category' => CategoryProduct::where('id', '=', $category->id)->first()]);
    }

    public function showMenuInModal(Request $request)
    {
        $menuId = $request->data['menuId'];
        $menu = Menu::where('id', '=', $menuId)->first();
        return new MenuResource($menu);
    }

    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', ['menus' => $menus]);
    }

    public function create()
    {
        $categories = CategoryProduct::all();
        $ingredients = Ingredient::all();
        return view('menu.create', compact('categories', 'ingredients'));
    }

    public function store(StoreMenuRequest $request)
    {
        //Save image
        $path = FileService::uploadFile($request->file('image'));
        $menu = Menu::create([
            'name' => $request->input('name'),
            'description' => $request->get('description'),
            'image' => $path,
            'category_id' => $request->get('category_id'),
            'weight' => Menu::weightMenu($request->input('weightIng', 0)),
            'price' => Menu::priceMenu($request->input('weightIng', 0), $request['ingredient_id']),
            'kilocalories' => Menu::kcalMenu($request->input('weightIng', 0), $request['ingredient_id']),
        ]);

        $menu->ingredients()->attach($request['ingredient_id']);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Данные успешно сохранены');
    }

    public function edit(Menu $menu)
    {
        $categories = CategoryProduct::all();
        $ingredients = Ingredient::all();
        return view('menu.edit', compact('menu', 'categories', 'ingredients'));
    }


    public function update(Request $request, Menu $menu)
    {
        $path = FileService::updateFile($request->file('image'), $menu->image);
        $menu->update([
            'name' => $request->input('name'),
            'description' => $request->get('description'),
            'image' => $path,
            'category_id' => $request->get('category_id'),
            'weight' => $request->input('weight'),
            'price' => $request->input('price'),
            'kilocalories' => $request->input('kilocalories'),
        ]);


        if (isset($request['ingredient_id'])) {

            $menu->ingredients()->sync($request['ingredient_id']);

            return redirect()->route('admin.menus.index')
                ->with('success', 'Данные успешно обновлены');

        } else {
            return redirect()->route('admin.menus.edit', $menu)
                ->with('error', 'Вы не выбрали состав!');
        }
    }


    public function destroy(Menu $menu)
    {
        //Удаление картинки
        FileService::deleteFile($menu->image);
        //удаление записи из бд
        $menu->delete();

        return redirect()->route('admin.menus.index')
            ->with('success', 'Данные успешно удалены');
    }
}
