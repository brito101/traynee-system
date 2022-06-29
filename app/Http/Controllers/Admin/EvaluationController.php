<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Evaluation;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasPermissionTo('Listar Avaliações')) {
            abort(403, 'Acesso não autorizado');
        }

        if (Auth::user()->hasRole('Franquiado')) {
            $companies = Company::where('affiliation_id', Auth::user()->affiliation_id)->pluck('id');
        } elseif (Auth::user()->hasRole('Empresário')) {
            $companies = Company::where('id', Auth::user()->company_id)->pluck('id');
        } else {
            $companies = Company::all()->pluck('id');
        }

        $vacancies = Vacancy::whereIn('company_id', $companies)->pluck('id');
        $evaluations = Evaluation::whereIn('vacancy_id', $vacancies)->get();
        return view('admin.evaluations.index', compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
