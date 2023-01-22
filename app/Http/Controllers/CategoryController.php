<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Basket;
use App\Models\CategoryProduct;
use App\Models\Cook;
use App\Models\Menu;
use App\Services\FileService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = CategoryProduct::all();
        return view('index', ['categories' => $categories, 'menus' => Menu::all(), 'cooks' => Cook::all()]);
    }

    public function index()
    {
        $categories = CategoryProduct::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        //Save image
        $path = FileService::uploadFile($request->file('image'));

        CategoryProduct::create([
            'name' => $request->input('name'),
            'description' => $request->get('description'),
            'image' => $path,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Данные успешно сохранены');
    }

    public function edit(CategoryProduct $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, CategoryProduct $category)
    {
        $path = FileService::updateFile($request->file('image'), $category->image);
        $category->update([
            'name' => $request->input('name'),
            'description' => $request->get('description'),
            'image' => $path,
        ]);
        return redirect()->route('admin.categories.index')
            ->with('success', 'Данные успешно обновлены');
    }

    public function destroy(CategoryProduct $category)
    {
        //Удаление картинки
        FileService::deleteFile($category->image);
        //удаление записи из бд
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Данные успешно удалены');
    }
}
