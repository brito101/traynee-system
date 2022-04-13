@extends('adminlte::page')

@section('title', '- Relatórios de Atividades')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content')
    @can('Enviar Relatórios')
        @php
        $heads = [['label' => 'ID', 'width' => 5], 'Título', 'Arquivo', 'Empresa', 'Insituição de Ensino', 'Estagiário', ['label' => 'Ações', 'no-export' => true, 'width' => 10]];

        $list = [];

        foreach ($reports as $report) {
            $list[] = [$report->id, $report->title, $report->document, $report->company_id, $report->institution, $report->trainee, '<nobr>' . '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar" href="reports/' . $report->id . '/edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>' . '<a class="btn btn-xs btn-default text-danger mx-1 shadow" title="Excluir" href="reports/destroy/' . $report->id . '" onclick="return confirm(\'Confirma a exclusão deste relatório?\')"><i class="fa fa-lg fa-fw fa-trash"></i></a>'];
        }

        $config = [
            'data' => $list,
            'order' => [[0, 'asc']],
            'columns' => [null, null, null, null, null, null, ['orderable' => false]],
            'language' => ['url' => asset('vendor/datatables/js/pt-BR.json')],
        ];
        @endphp
    @else
        @php
        $heads = [['label' => 'ID', 'width' => 5], 'Título', 'Arquivo', 'Empresa', 'Insituição de Ensino', 'Estagiário'];

        $list = [];

        foreach ($reports as $report) {
            $list[] = [$report->id, $report->title, $report->document, $report->company_id, $report->institution, $report->trainee];
        }

        $config = [
            'data' => $list,
            'order' => [[0, 'asc']],
            'columns' => [null, null, null, null, null, null],
            'language' => ['url' => asset('vendor/datatables/js/pt-BR.json')],
        ];
        @endphp
    @endcan


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fa fa-fw fa-file-download"></i> Relatórios de Atividades</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Relatórios de Atividades</li>
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
                            <div class="d-flex flex-wrap justify-content-between col-12 align-content-center">
                                <h3 class="card-title align-self-center">Relatórios</h3>
                                @can('Enviar Relatórios')
                                    <a href="{{ route('admin.reports.create') }}" title="Novo Relatório"
                                        class="btn btn-success"><i class="fas fa-fw fa-plus"></i>Novo Relatório</a>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body">
                            <x-adminlte-datatable id="table1" :heads="$heads" :heads="$heads" :config="$config" striped
                                hoverable beautify with-buttons />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
