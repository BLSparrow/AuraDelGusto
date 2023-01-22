<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngredientRequest;
use App\Models\CategoryIngredient;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredients.index', ['ingredients' => $ingredients]);
    }

    public function create()
    {
        return view('ingredients.create', ['categories' => CategoryIngredient::all()]);
    }

    public function store(StoreIngredientRequest $request)
    {
        Ingredient::create([
            'name' => $request->input('name'),
            'kcal' => $request->input('kcal'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id')
        ]);

        return redirect()->route('admin.ingredients.index')
            ->with('success', 'Данные успешно сохранены');
    }

    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', ['ingredient' => $ingredient, 'categories' => CategoryIngredient::all()]);
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $ingredient->update([
            'name' => $request->input('name'),
            'kcal' => $request->input('kcal'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id')
        ]);
        return redirect()->route('admin.ingredients.index')
            ->with('success', 'Данные успешно обновлены');
    }

    public function destroy(Ingredient $ingredient)
    {
        //удаление записи из бд
        $ingredient->delete();

        return redirect()->route('admin.ingredients.index')
            ->with('success', 'Данные успешно удалены');
    }
}
