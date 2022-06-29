@extends('adminlte::page')

@section('title', '- Avaliações')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content')
    @if (auth()->user()->can('Editar Avaliações') &&
        auth()->user()->can('Excluir Avaliações'))
        @php
            $heads = [['label' => 'ID', 'width' => 5], 'Candidato', 'Vaga', 'Empresa', 'Status Avaliação da Empresa', 'Compatibilidade para a vaga', ['label' => 'Ações', 'no-export' => true, 'width' => 10]];

            $list = [];

            foreach ($evaluations as $evaluation) {
                $list[] = [$evaluation->id, $evaluation->getTrainee(), $evaluation->vacancy->title, $evaluation->vacancy->company->alias_name, $evaluation->status, $evaluation->getCompability(), '<nobr>' . '<a class="btn btn-xs btn-default text-success mx-1 shadow" title="Liberar" href="evaluations/' . $evaluation->id . '/release"><i class="fa fa-lg fa-fw fa-thumbs-up"></i></a>' . '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar" href="evaluations/' . $evaluation->id . '/edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>' . '<a class="btn btn-xs btn-default text-danger mx-1 shadow" title="Excluir" href="evaluations/destroy/' . $evaluation->id . '" onclick="return confirm(\'Confirma a exclusão desta alocação?\')"><i class="fa fa-lg fa-fw fa-trash"></i></a>'];
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
            $heads = [['label' => 'ID', 'width' => 5], 'Candidato', ['label' => 'Ações', 'no-export' => true, 'width' => 10]];

            $list = [];

            foreach ($evaluations as $evaluation) {
                $list[] = [$evaluation->id, $evaluation->trainee, '<nobr>' . '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar" href="evaluations/' . $evaluation->id . '/edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>' . '<a class="btn btn-xs btn-default text-danger mx-1 shadow" title="Excluir" href="evaluations/destroy/' . $evaluation->id . '" onclick="return confirm(\'Confirma a exclusão desta alocação?\')"><i class="fa fa-lg fa-fw fa-trash"></i></a>'];
            }

            $config = [
                'data' => $list,
                'order' => [[0, 'asc']],
                'columns' => [null, null, ['orderable' => false]],
                'language' => ['url' => asset('vendor/datatables/js/pt-BR.json')],
            ];
        @endphp
    @endif

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fa fa-fw fa-handshake"></i> Avaliações</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Avaliações</li>
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
                                <h3 class="card-title align-self-center">Alocações Cadastradas</h3>
                                @can('Criar Avaliações')
                                    <a href="{{ route('admin.allocations.create') }}" title="Nova Alocação"
                                        class="btn btn-success"><i class="fas fa-fw fa-plus"></i>Nova Alocação</a>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body">
                            <x-adminlte-datatable id="table1" :heads="$heads" :heads="$heads" :config="$config"
                                striped hoverable beautify with-buttons />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
