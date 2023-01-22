<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function usersAll()
    {
        return UserResource::collection(User::all());
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        if (($request->input('newPassword') && $request->input('password')) !== null) {
            $current_password = Auth::user()->password;
            if (Hash::check($request->input('password'), $current_password)) {
                $user_id = Auth::user()->id;
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($request->input('newPassword'));
                $obj_user->save();
            }
        }

        $user->update([
            'name' => $request->input('name'),
            'tel' => $request->input('tel'),
            'address' => $request->input('address'),
            'email' => $request->input('email')
        ]);

        return redirect()->route('profile')
            ->with('success', 'Данные успешно обновлены');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Данные успешно удалены');
    }
}
