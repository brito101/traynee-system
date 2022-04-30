@extends('adminlte::page')

@section('title', '- Planos')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content')

    @php
    $heads = [['label' => 'ID', 'width' => 5], 'Título', 'Autor', 'Visualizações', ['label' => 'Ações', 'no-export' => true, 'width' => 10]];

    $list = [];

    foreach ($plans as $plan) {
        $list[] = [$plan->id, $post->code, $post->name, $post->amount, $post->status, '<nobr>' . '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar" href="payment/plans/' . $plan->id . '/edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>'];
    }

    $config = [
        'data' => $list,
        'order' => [[0, 'asc']],
        'columns' => [null, null, null, null, ['orderable' => false]],
        'language' => ['url' => asset('vendor/datatables/js/pt-BR.json')],
    ];
    @endphp

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-money-check"></i> Planos de Pagamento</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pagamento</a></li>
                        <li class="breadcrumb-item active">Planos de Pagamento</li>
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
                                <h3 class="card-title align-self-center">Planos Cadastrados</h3>
                                @can('Criar Planos de Pagamento')
                                    <a href="{{ route('admin.plans.create') }}" title="Novo Plano" class="btn btn-success"><i
                                            class="fas fa-fw fa-plus"></i>Novo Plano</a>
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
