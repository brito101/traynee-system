<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role(['Administrador', 'Empresário', 'Estagiário'])->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('admin.users.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);

        if ($user->save()) {
            if (!empty($request->role)) {
                $user->syncRoles($request->roles);
            } else {
                $user->syncRoles('Estagiário');
            }
            return redirect()
                ->route('admin.users.index')
                ->with('success', 'Cadastro realizado!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genres = Genre::all();
        $user = User::where('id', $id)->first();
        if (empty($user->id)) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.users.edit', compact('user', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $user = User::where('id', $id)->first();
        if (empty($user->id)) {
            abort(403, 'Acesso não autorizado');
        }
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $user->password;
        }
        if ($user->update($data)) {
            return redirect()
                ->route('admin.users.index')
                ->with('success', 'Atualização realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        if (empty($user->id)) {
            abort(403, 'Acesso não autorizado');
        }
        if ($user->delete()) {
            return redirect()
                ->route('admin.users.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
