<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EvaluationRequest;
use App\Models\Company;
use App\Models\Evaluation;
use App\Models\User;
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
        if (!Auth::user()->hasPermissionTo('Criar Avaliações')) {
            abort(403, 'Acesso não autorizado');
        }

        if (Auth::user()->hasRole('Franquiado')) {
            $companies = Company::where('affiliation_id', Auth::user()->affiliation_id)->get();
            $trainees = User::role('Estagiário')->whereIn('state', $companies->pluck('state'))->orderBy('created_at', 'desc')->get();
        } else {
            $companies = Company::all();
            $trainees = User::role('Estagiário')->get();
        }

        $vacancies = Vacancy::whereIn('company_id', $companies->pluck('id'))->get();

        return view('admin.evaluations.create', compact('trainees', 'vacancies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvaluationRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Avaliações')) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();

        if (Auth::user()->hasRole('Franquiado')) {
            $companies = Company::where('affiliation_id', Auth::user()->affiliation_id)->pluck('id');
        } else {
            $companies = Company::all()->pluck('id');
        }

        $vacancy = Vacancy::whereIn('company_id', $companies)->where('id', $request->vacancy_id)->first();
        $trainee = User::role('Estagiário')->where('id', $request->trainee)->first();

        if (empty($vacancy->id) || empty($trainee->id)) {
            abort(403, 'Acesso não autorizado');
        }

        $data['editor'] = Auth::user()->id;

        $evaluation = Evaluation::create($data);

        if ($evaluation->save()) {
            return redirect()
                ->route('admin.evaluations.index')
                ->with('success', 'Cadastro realizado!');
        } else {
            return redirect()
                ->back()
                ->withInput()
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
        if (!Auth::user()->hasPermissionTo('Excluir Avaliações')) {
            abort(403, 'Acesso não autorizado');
        }

        if (Auth::user()->hasRole('Franquiado')) {
            $companies = Company::where('affiliation_id', Auth::user()->affiliation_id)->pluck('id');
        } else {
            $companies = Company::all()->pluck('id');
        }

        $vacancies = Vacancy::whereIn('company_id', $companies)->pluck('id');
        $evaluation = Evaluation::where('id', $id)->whereIn('vacancy_id',  $vacancies)->first();

        if (empty($evaluation->id)) {
            abort(403, 'Acesso não autorizado');
        }

        if ($evaluation->delete()) {
            return redirect()
                ->route('admin.evaluations.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
