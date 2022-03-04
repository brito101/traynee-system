<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasPermissionTo('Listar Empresas')) {
            abort(403, 'Acesso não autorizado');
        }
        $companies = Company::all();
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Empresas')) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Empresas')) {
            abort(403, 'Acesso não autorizado');
        }
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $name = Str::slug(mb_substr($data['alias_name'], 0, 100)) . time();
            $extenstion = $request->logo->extension();
            $nameFile = "{$name}.{$extenstion}";
            $data['logo'] = $nameFile;
            $upload = $request->logo->storeAs('companies', $nameFile);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
            }
        }

        $company = Company::create($data);

        if ($company->save()) {
            return redirect()
                ->route('admin.companies.index')
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
        if (!Auth::user()->hasPermissionTo('Editar Empresas')) {
            abort(403, 'Acesso não autorizado');
        }
        $company = Company::where('id', $id)->first();
        if (empty($company->id)) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Empresas')) {
            abort(403, 'Acesso não autorizado');
        }
        $data = $request->all();
        $company = Company::where('id', $id)->first();
        if (empty($company->id)) {
            abort(403, 'Acesso não autorizado');
        }

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $name = Str::slug(mb_substr($company->alias_name, 0, 10)) . time();
            $imagePath = storage_path() . '/app/public/companies/' . $company->logo;

            if (File::isFile($imagePath)) {
                unlink($imagePath);
            }

            $extenstion = $request->logo->extension();
            $nameFile = "{$name}.{$extenstion}";

            $data['logo'] = $nameFile;

            $upload = $request->logo->storeAs('companies', $nameFile);

            if (!$upload)
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
        }

        if ($company->update($data)) {
            return redirect()
                ->route('admin.companies.index')
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
        if (!Auth::user()->hasPermissionTo('Excluir Empresas')) {
            abort(403, 'Acesso não autorizado');
        }
        $company = Company::where('id', $id)->first();
        if (empty($company->id)) {
            abort(403, 'Acesso não autorizado');
        }
        $imagePath = storage_path() . '/app/public/companies/' . $company->logo;

        if ($company->delete()) {
            if (File::isFile($imagePath)) {
                unlink($imagePath);
                $company->logo = null;
                $company->update();
            }

            return redirect()
                ->route('admin.companies.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
