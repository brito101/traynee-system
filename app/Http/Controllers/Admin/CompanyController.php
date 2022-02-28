<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

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
        $companies = Company::all();
        $company = Company::create([
            'user_id' => $user = auth()->user()->id,
            'social_name' => $data['social_name'],
            'alias_name' => $data['alias_name'],
            'telephone' => $data['telephone'],
            'cell' => $data['cell'],
            // 'document_company' => $data['document_company'],
            // 'document_company_secondary' => $data['document_company_secondary'],
            // 'telephone' => $data['telephone'],
            // 'cell' => $data['cell'],
            // 'zipcode' => $data['zipcode'],
            // 'street' => $data['street'],
            // 'number' => $data['number'],
            // 'complement' => $data['complement'],
            // 'neighborhood' => $data['neighborhood'],
            // 'state' => $data['state'],
            // 'city' => $data['city'],
        ]);

        if ($company->save()) {
            return redirect()
                ->route('admin.companies.index')
                ->with(compact('companies'))
                ->with('success', 'Cadastro realizado com sucesso!');
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
        //
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
        //
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
                ->with('success', 'Exclusão realizada com sucesso!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
