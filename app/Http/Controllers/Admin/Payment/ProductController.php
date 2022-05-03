<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasPermissionTo('Listar Produtos')) {
            abort(403, 'Acesso não autorizado');
        }
        $products = Product::all();
        return view('admin.payments.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Produtos')) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.payments.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Produtos')) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();
        $data['editor'] = Auth::user()->id;
        $product = Product::create($data);

        if ($product->save()) {
            return redirect()
                ->route('admin.products.index')
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
        if (!Auth::user()->hasPermissionTo('Editar Produtos')) {
            abort(403, 'Acesso não autorizado');
        }

        $product = Product::where('id', $id)->first();
        if (empty($product->id)) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.payments.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Produtos')) {
            abort(403, 'Acesso não autorizado');
        }

        $product = Product::where('id', $id)->first();
        if (empty($product->id)) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();

        if ($product->update($data)) {
            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Atualização realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
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
        if (!Auth::user()->hasPermissionTo('Excluir Produtos')) {
            abort(403, 'Acesso não autorizado');
        }

        $product = Product::where('id', $id)->first();
        if (empty($product->id)) {
            abort(403, 'Acesso não autorizado');
        }

        if ($product->delete()) {
            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
