<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->paginate();

        return view('admin.users.index', compact('users'));
    }

    public function profile()
    {
        $user = auth()->user();

        return view('users.edit', compact('user'));
    }

    // Edita usuarios diferentes al logueado
    // Disponible sólo para el administrador
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(UpdateUser $request, $id)
    {
        $user = User::findOrFail($id);

        // Si el usuario está editando su perfil
        if ($user->id === auth()->user()->id) {
            $current_password = Hash::check($request->get('current_password'), $user->password);

            if (!$current_password) {
                flash('La contraseña actual es incorrecta')->error();
                return back();
            }
        }

        if ($request->get('new_password')) {
            $user->password = bcrypt($request->get('new_password'));
        }

        $user->name = $request->get('name');
        $user->save();

        if (auth()->user()->id === $request->route('user')) {
            // Reautentica al usuario
            auth()->login($user);
        }
        
        flash('Perfil actualizado')->success();
        return back();
    }
}
