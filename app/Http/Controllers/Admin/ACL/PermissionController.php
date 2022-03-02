<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.acl.permissions.index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.acl.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Permission::where('name', $request->name)->get();
        if ($check->count() > 0) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Nome da permissão já está em uso!');
        }
        $data = $request->all();
        $permission = Permission::create($data);
        if ($permission->save()) {
            return redirect()
                ->route('admin.permission.index')
                ->with('success', 'Permissão cadastrada!');
        } else {
            return redirect()
                ->route('admin.permission.index')
                ->withInput()
                ->with('error', 'Falha ao cadastrar a permissão!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::where('id', $id)->first();
        if (empty($permission->id)) {
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }
        return view('admin.acl.permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $check = Permission::where('name', $request->name)->where('id', '!=', $id)->get();
        if ($check->count() > 0) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'O nome desta permissão já está em uso!');
        }
        $data = $request->all();
        $permission = Permission::where('id', $id)->first();
        if ($permission->update($data)) {
            return redirect()
                ->route('admin.permission.index')
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
        $permission = Permission::where('id', $id)->first();

        if ($permission->delete()) {
            return redirect()
                ->route('admin.permission.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
