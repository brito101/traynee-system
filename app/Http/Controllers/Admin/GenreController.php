<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        return view('admin.configurations.genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.configurations.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $genres = Genre::all();
        $genre = Genre::create($data);

        if ($genre->save()) {
            return redirect()
                ->route('admin.genres.index')
                ->with(compact('genres'))
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
        $genre = Genre::where('id', $id)->first();
        return view('admin.configurations.genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, $id)
    {
        $data = $request->all();
        $genres = Genre::all();
        $genre = Genre::where('id', $id)->first();

        if ($genre->update($data)) {
            return redirect()
                ->route('admin.genres.index')
                ->with(compact('genres'))
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
        $genres = Genre::all();
        $genre = Genre::where('id', $id)->first();

        if ($genre->delete()) {
            return redirect()
                ->route('admin.genres.index')
                ->with(compact('genres'))
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
