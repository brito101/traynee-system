<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DocumentTrayneeRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DocumentTrayneeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (!Auth::user()->hasPermissionTo('Enviar Documentos Comprobatórios')) {
            abort(403, 'Acesso não autorizado');
        }
        $document = Document::where('user_id', Auth::user()->id)->first();
        return view('admin.documents.edit', compact('document'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentTrayneeRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Enviar Documentos Comprobatórios')) {
            abort(403, 'Acesso não autorizado');
        }

        $document = Document::where('user_id', Auth::user()->id)->first();

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $listDocument = [
            'document_person',
            'document_registry',
            'registration',
            'historic',
            'declaration',
            'residence'
        ];

        foreach ($listDocument as $doc) {

            if ($request->hasFile($doc) && $request->file($doc)->isValid()) {
                $name = $doc . time();

                if ($document) {
                    $documentPersonPath = storage_path() . '/app/public/documents/' . $document->$doc;
                    if (File::isFile($documentPersonPath)) {
                        unlink($documentPersonPath);
                    }
                }

                $extenstion = $request->$doc->extension();
                $nameFile = "{$name}.{$extenstion}";

                $data[$doc] = $nameFile;

                $upload = $request->$doc->storeAs('documents', $nameFile);

                if (!$upload)
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', 'Falha ao fazer o upload do arquivo');
            }
        }

        if ($document) {
            $save = $document->update($data);
        } else {
            $save = Document::create($data);
        }

        if ($save) {
            return redirect()
                ->route('admin.documents.edit')
                ->with('success', 'Envio realizado!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao Enviar!');
        }
    }

    public function show($id)
    {
        if (!Auth::user()->hasRole('Franquiado')) {
            abort(403, 'Acesso não autorizado');
        }
        $document = Document::where('user_id', $id)->first();
        return view('admin.documents.show', compact('document'));
    }
}
