<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FranchiseBrandRequest;
use App\Http\Requests\Admin\FranchiseRequest;
use App\Models\Franchise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FranchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasPermissionTo('Listar Franquias')) {
            abort(403, 'Acesso não autorizado');
        }
        $franchises = Franchise::all();
        return view('admin.franchises.index', compact('franchises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Franquias')) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.franchises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FranchiseRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Franquias')) {
            abort(403, 'Acesso não autorizado');
        }
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $name = Str::slug(mb_substr($data['alias_name'], 0, 100)) . time();
            $extenstion = $request->logo->extension();
            $nameFile = "{$name}.{$extenstion}";
            $data['logo'] = $nameFile;
            $upload = $request->logo->storeAs('franchises', $nameFile);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
            }
        }

        $franchise = Franchise::create($data);

        if ($franchise->save()) {
            return redirect()
                ->route('admin.franchises.index')
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
    public function edit($id = null)
    {
        if ($id && !Auth::user()->hasPermissionTo('Editar Franquias')) {
            abort(403, 'Acesso não autorizado');
        }

        if (is_null($id) && !Auth::user()->hasPermissionTo('Editar Franquia')) {
            abort(403, 'Acesso não autorizado');
        }

        if (is_null($id)) {
            $id = Auth::user()->franchise_id;
        }

        $franchise = Franchise::where('id', $id)->first();
        if (empty($franchise->id)) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.franchises.edit', compact('franchise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FranchiseRequest $request, $id)
    {
        if (!Auth::user()->hasAnyPermission(['Editar Franquias', 'Editar Franquia'])) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();

        if (Auth::user()->hasPermissionTo('Editar Franquias')) {
            $franchise = Franchise::where('id', $id)->first();
        }

        if (Auth::user()->hasPermissionTo('Editar Franquia')) {
            $franchise = Franchise::where('id', Auth::user()->franchise_id)->first();
        }

        if (empty($franchise->id)) {
            abort(403, 'Acesso não autorizado');
        }

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $name = Str::slug(mb_substr($franchise->alias_name, 0, 10)) . time();
            $imagePath = storage_path() . '/app/public/franchises/' . $franchise->logo;

            if (File::isFile($imagePath)) {
                unlink($imagePath);
            }

            $extenstion = $request->logo->extension();
            $nameFile = "{$name}.{$extenstion}";

            $data['logo'] = $nameFile;

            $upload = $request->logo->storeAs('franchises', $nameFile);

            if (!$upload)
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
        }

        if ($franchise->update($data)) {
            if (Auth::user()->hasPermissionTo('Editar Franquia')) {
                return redirect()
                    ->route('admin.franchises.edit')
                    ->with('success', 'Atualização realizada!');
            } else {
                return redirect()
                    ->route('admin.franchises.index')
                    ->with('success', 'Atualização realizada!');
            }
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar!');
        }
    }

    public function socialNetwork()
    {
        if (!Auth::user()->hasPermissionTo('Editar Franquia')) {
            abort(403, 'Acesso não autorizado');
        }

        $franchise = Franchise::where('id', Auth::user()->franchise_id)->first();
        if (empty($franchise->id)) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.franchises.social', compact('franchise'));
    }

    public function socialNetworkStore(FranchiseBrandRequest $request)
    {
        $data = $request->all();

        if (!Auth::user()->hasPermissionTo('Editar Franquia')) {
            abort(403, 'Acesso não autorizado');
        }

        $franchise = Franchise::where('id', Auth::user()->franchise_id)->first();
        if (empty($franchise->id)) {
            abort(403, 'Acesso não autorizado');
        }

        if ($franchise->update($data)) {
            return redirect()
                ->route('admin.franchise.social')
                ->with('success', 'Atualização realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar!');
        }
    }

    public function resume()
    {
        if (!Auth::user()->hasPermissionTo('Editar Empresa')) {
            abort(403, 'Acesso não autorizado');
        }

        $franchise = Franchise::where('id', Auth::user()->franchise_id)->first();
        if (empty($franchise->id)) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.franchises.resume', compact('franchise'));
    }


    public function resumeStore(FranchiseBrandRequest $request)
    {
        $data = $request->all();

        if (!Auth::user()->hasPermissionTo('Editar Franquia')) {
            abort(403, 'Acesso não autorizado');
        }

        $franchise = Franchise::where('id', Auth::user()->franchise_id)->first();
        if (empty($franchise->id)) {
            abort(403, 'Acesso não autorizado');
        }

        if ($franchise->update($data)) {
            return redirect()
                ->route('admin.franchise.resume')
                ->with('success', 'Edição realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar!');
        }
    }

    public function brandImages()
    {
        if (!Auth::user()->hasPermissionTo('Editar Franquia')) {
            abort(403, 'Acesso não autorizado');
        }

        $franchise = Franchise::where('id', Auth::user()->franchise_id)->first();
        if (empty($franchise->id)) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.franchises.brand', compact('franchise'));
    }

    public function brandImagesStore(FranchiseBrandRequest $request)
    {
        $data = $request->all();

        if (!Auth::user()->hasPermissionTo('Editar Franquia')) {
            abort(403, 'Acesso não autorizado');
        }

        $franchise = Franchise::where('id', Auth::user()->franchise_id)->first();
        if (empty($franchise->id)) {
            abort(403, 'Acesso não autorizado');
        }

        /** Facebook */
        if ($request->hasFile('brand_facebook') && $request->file('brand_facebook')->isValid()) {
            $name = Str::slug(mb_substr($franchise->alias_name, 0, 10)) . '-facebook' . time();
            $imagePath = storage_path() . '/app/public/franchises/' . $franchise->brand_facebook;

            if (File::isFile($imagePath)) {
                unlink($imagePath);
            }

            $extenstion = $request->brand_facebook->extension();
            $nameFile = "{$name}.{$extenstion}";

            $data['brand_facebook'] = $nameFile;

            $upload = $request->brand_facebook->storeAs('franchises', $nameFile);

            if (!$upload)
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
        }

        /** Instagram */
        if ($request->hasFile('brand_instagram') && $request->file('brand_instagram')->isValid()) {
            $name = Str::slug(mb_substr($franchise->alias_name, 0, 10))  . '-instagram' . time();
            $imagePath = storage_path() . '/app/public/franchises/' . $franchise->brand_instagram;

            if (File::isFile($imagePath)) {
                unlink($imagePath);
            }

            $extenstion = $request->brand_instagram->extension();
            $nameFile = "{$name}.{$extenstion}";

            $data['brand_instagram'] = $nameFile;

            $upload = $request->brand_instagram->storeAs('franchises', $nameFile);

            if (!$upload)
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
        }

        /** Twitter */
        if ($request->hasFile('brand_twitter') && $request->file('brand_twitter')->isValid()) {
            $name = Str::slug(mb_substr($franchise->alias_name, 0, 10)) . '-twitter' . time();
            $imagePath = storage_path() . '/app/public/franchises/' . $franchise->brand_twitter;

            if (File::isFile($imagePath)) {
                unlink($imagePath);
            }

            $extenstion = $request->brand_twitter->extension();
            $nameFile = "{$name}.{$extenstion}";

            $data['brand_twitter'] = $nameFile;

            $upload = $request->brand_twitter->storeAs('franchises', $nameFile);

            if (!$upload)
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
        }

        if ($franchise->update($data)) {
            return redirect()
                ->route('admin.franchise.brand')
                ->with('success', 'Edição realizada!');
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
        if (!Auth::user()->hasPermissionTo('Excluir Franquias')) {
            abort(403, 'Acesso não autorizado');
        }
        $franchise = Franchise::where('id', $id)->first();
        if (empty($franchise->id)) {
            abort(403, 'Acesso não autorizado');
        }
        $imagePath = storage_path() . '/app/public/franchises/' . $franchise->logo;
        $imagePathFacebook = storage_path() . '/app/public/franchises/' . $franchise->brand_facebook;
        $imagePathInstagram = storage_path() . '/app/public/franchises/' . $franchise->brand_instagram;
        $imagePathTwitter = storage_path() . '/app/public/franchises/' . $franchise->brand_twitter;

        if ($franchise->delete()) {
            if (File::isFile($imagePath)) {
                unlink($imagePath);
                $franchise->logo = null;
                $franchise->update();
            }

            if (File::isFile($imagePathFacebook)) {
                unlink($imagePathFacebook);
                $franchise->brand_facebook = null;
                $franchise->update();
            }

            if (File::isFile($imagePathInstagram)) {
                unlink($imagePathInstagram);
                $franchise->brand_instagram = null;
                $franchise->update();
            }

            if (File::isFile($imagePathTwitter)) {
                unlink($imagePathTwitter);
                $franchise->brand_twitter = null;
                $franchise->update();
            }

            return redirect()
                ->route('admin.franchises.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
