<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTableRequest;
use App\Models\Table;
use App\Services\FileService;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('tables.index', ['tables' => $tables]);
    }

    public function create()
    {
        return view('tables.create');
    }

    public function store(StoreTableRequest $request)
    {
        //Save image
        $path = FileService::uploadFile($request->file('image'));

        Table::create([
            'number' => $request->input('number'),
            'image' => $path,
            'quantity' => $request->input('quantity'),
        ]);

        return redirect()->route('admin.tables.index')
            ->with('success', 'Данные успешно сохранены');
    }

    public function edit(Table $table)
    {
        return view('tables.edit', ['table' => $table]);
    }

    public function update(Request $request, Table $table)
    {
        $path = FileService::updateFile($request->file('image'), $table->image);
        $table->update([
            'number' => $request->input('number'),
            'image' => $path,
            'quantity' => $request->input('quantity'),
        ]);
        return redirect()->route('admin.tables.index')
            ->with('success', 'Данные успешно обновлены');
    }

    public function destroy(Table $table)
    {
        //Удаление картинки
        FileService::deleteFile($table->image);
        //удаление записи из бд
        $table->delete();

        return redirect()->route('admin.tables.index')
            ->with('success', 'Данные успешно удалены');
    }
}
