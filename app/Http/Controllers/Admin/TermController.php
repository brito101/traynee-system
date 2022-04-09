<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TermRequest;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasPermissionTo('Listar Termos')) {
            abort(403, 'Acesso não autorizado');
        }
        $terms = Term::all();
        return view('admin.terms.index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Termos')) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TermRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Termos')) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $term = Term::create($data);

        if ($term->save()) {
            return redirect()
                ->route('admin.terms.index')
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
        if (!Auth::user()->hasPermissionTo('Editar Termos')) {
            abort(403, 'Acesso não autorizado');
        }

        $term = Term::where('id', $id)->first();
        if (empty($term->id)) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.terms.edit', compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TermRequest $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Termos')) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();
        $term = Term::where('id', $id)->first();
        if (empty($term->id)) {
            abort(403, 'Acesso não autorizado');
        }
        if ($term->update($data)) {
            return redirect()
                ->route('admin.terms.index')
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
        if (!Auth::user()->hasPermissionTo('Excluir Termos')) {
            abort(403, 'Acesso não autorizado');
        }
        $term = Term::where('id', $id)->first();
        if (empty($term->id)) {
            abort(403, 'Acesso não autorizado');
        }
        if ($term->delete()) {
            return redirect()
                ->route('admin.terms.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }

    public function termsGenerate()
    {
        if (!Auth::user()->hasPermissionTo('Gerar Termos')) {
            abort(403, 'Acesso não autorizado');
        }

        if (Auth::user()->hasRole('Franquiado')) {
            $terms = Term::whereIn('participant_primary', ['Franquia', 'Empresa', 'Estagiário'])->get();
        } else {
            $terms = Term::all();
        }

        return view('admin.terms.term', compact('terms'));
    }

    public function termsPdf(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Gerar Termos')) {
            abort(403, 'Acesso não autorizado');
        }
        $data = $request->all();

        $term = Term::where('title', $request['title'])->first();
        if (empty($term->id)) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.terms.pdf', compact('data', 'term'));
    }
}
