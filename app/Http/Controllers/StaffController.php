<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffRequest;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $managers = Staff::all();
        return view('staff.index', ['managers' => $managers]);
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(StoreStaffRequest $request)
    {
        if (auth('admin')->attempt($request->only(['email', 'password']))) {
            return back()->withErrors([
                'errorRegister' => 'Пользователь с такими данными уже существует!',
            ]);
        }

        Staff::create([
            'login' => $request->input('login'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => 2
        ]);

        return redirect()->route('admin.staff.index')
            ->with('success', 'Данные успешно сохранены');
    }

    public function edit(Staff $staff)
    {
        return view('staff.edit', ['staff' => $staff]);
    }

    public function update(Request $request, Staff $staff)
    {
        if (!Hash::check($request->input('password'), $staff->password)) {
            $staff->update([
                'login' => $request->input('login'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role_id' => 2
            ]);
            return redirect()->route('admin.staff.index')
                ->with('success', 'Данные успешно обновлены');
        } else {
            return back()->withErrors([
                'updateError' => 'Новый пароль не должен совпадать со старым!',
            ]);
        }
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('admin.staff.index')
            ->with('success', 'Данные успешно удалены');
    }

}
