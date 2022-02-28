@extends('adminlte::page')

@section('title', '- Empresas')
@section('plugins.Datatables', true)

@section('content')
    @php
    $heads = ['ID', 'Nome', ['label' => 'Telefone', 'width' => 40], ['label' => 'Ações', 'no-export' => true, 'width' => 5]];
    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar"><i class="fa fa-lg fa-fw fa-pen"></i></button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow delete-item" title="Excluir"><i class="fa fa-lg fa-fw fa-trash"></i></button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalhes"><i class="fa fa-lg fa-fw fa-search"></i></button>';

    $list = [];

    foreach ($companies as $company) {
        $list[] = [$company->id, $company->alias_name, $company->telephone, '<nobr>' . $btnEdit . '<a class="btn btn-xs btn-default text-danger mx-1 shadow delete-item" title="Excluir" href="companies/destroy/' . $company->id . '"><i class="fa fa-lg fa-fw fa-trash"></i></a>' . $btnDetails];
    }

    $config = [
        'data' => $list,
        'order' => [[0, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
        'language' => ['url' => asset('vendor/datatables/js/pt-BR.json')],
    ];
    @endphp

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="far fa-fw fa-building"></i> Empresas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Empresas</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @include('components.alert')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Empresas Cadastradas</h3>
                        </div>
                        <div class="card-body">
                            <x-adminlte-datatable id="table1" :heads="$heads" :heads="$heads" head-theme="light"
                                theme="dark" :config="$config" striped hoverable beautify with-buttons />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
