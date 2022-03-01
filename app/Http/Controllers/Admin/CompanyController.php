<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $companies = Company::all();

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $name = $data['document_company'] . Str::of($data['alias_name'])->kebab();
            $extenstion = $request->logo->extension();
            $nameFile = "{$name}.{$extenstion}";
            $data['logo'] = $nameFile;
            $upload = $request->logo->storeAs('companies', $nameFile);

            if (!$upload)
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer o upload da imagem');
        }

        $company = Company::create($data);

        if ($company->save()) {
            return redirect()
                ->route('admin.companies.index')
                ->with(compact('companies'))
                ->with('success', 'Cadastro realizado!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao cadastrar!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('id', $id)->first();
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
        $data = $request->all();
        $companies = Company::all();
        $company = Company::where('id', $id)->first();

        $data['logo'] = $company->logo;

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $name = $company->document_company . Str::of($company->alias_name)->kebab();

            $imagePath = storage_path() . '/app/public/companies/' . $company->logo;
            if (Storage::exists($imagePath)) {
                unlink($imagePath);
            }

            $extenstion = $request->logo->extension();
            $nameFile = "{$name}.{$extenstion}";

            $data['logo'] = $nameFile;

            $upload = $request->logo->storeAs('companies', $nameFile);

            if (!$upload)
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer o upload da imagem');
        }

        if ($company->update($data)) {
            return redirect()
                ->route('admin.companies.index')
                ->with(compact('companies'))
                ->with('success', 'Atualização realizada!');
        } else {
            return redirect()
                ->back()
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

        $companies = Company::all();
        $company = Company::where('id', $id);

        if ($company->delete()) {
            return redirect()
                ->route('admin.companies.index')
                ->with(compact('companies'))
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
