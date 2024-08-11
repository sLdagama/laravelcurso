<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::paginate(10);
        return view('Admin.Users.index', compact('users'));
    }

    public function create() 
    {
        return view('Admin.Users.create');
    }

    public function store(StoreUserRequest $request) 
    {
        User::create($request->validated());
        return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function edit(string $id) 
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }
        return view('Admin.Users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id) 
    {
        if (!$user = User::find($id)) {
            return back()->with('message', 'Usuário não encontrado');
        }

        $data = $request->only('name', 'email');
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuário editado com sucesso!');
    }

    public function show(string $id) 
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }
        return view('Admin.Users.show', compact('user'));
    }

    public function destroy(string $id) 
    {
        if (Gate::denies('is-admin')) {
            return redirect()->route('users.index')->with('message', 'voce não tem permissão para deletar este usuário');
        }
        // Verifica se o usuário existe
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        $user->delete();
        
        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
