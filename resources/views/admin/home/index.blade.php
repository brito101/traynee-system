@extends('adminlte::page')

@section('title', '- Dashboard')
@if (!Auth::user()->hasRole('Estagiário'))
    @section('plugins.Chartjs', true)
@endif

@if (Auth::user()->hasRole('Empresário|Estagiário'))
    @section('plugins.Datatables', true)
    @section('plugins.DatatablesPlugins', true)
@endif

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (Auth::user()->hasRole('Programador|Administrador'))
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-shield"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Administradores</span>
                                <span class="info-box-number">{{ $administrators }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-handshake"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Franquias</span>
                                <span class="info-box-number">{{ $affiliations }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Franquiados</span>
                                <span class="info-box-number">{{ $affiliates }}</span>
                            </div>
                        </div>
                    </div>
                @endif
                @if (Auth::user()->hasRole('Programador|Administrador|Franquiado'))
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-building"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Empresas</span>
                                <span class="info-box-number">{{ $companies }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-briefcase"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Empresários</span>
                                <span class="info-box-number">{{ $businessmen }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Estagiários</span>
                                <span class="info-box-number">{{ $trainee->count() }}</span>
                            </div>
                        </div>
                    </div>
                @endif

                @if (Auth::user()->hasRole('Empresário'))
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-briefcase"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Vagas</span>
                                <span
                                    class="info-box-number">{{ $vacancies->where('company_id', Auth::user()->company_id)->count() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Estagiários</span>
                                <span class="info-box-number">{{ $trainee->count() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-check"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Candidatos</span>
                                <span class="info-box-number">
                                    {{ $candidates->whereIn('vacancy_id', $companies->vacancy->pluck('id'))->count() }}
                                </span>
                            </div>
                        </div>
                    </div>

                    @php
                        $heads = [['label' => 'ID', 'width' => 5], 'Nome', 'Cursando', 'Gênero', 'Idade', 'Cidade', ['label' => 'Visualizar', 'no-export' => true, 'width' => 10]];

                        $list = [];

                        foreach ($trainee as $person) {
                            $list[] = [$person->id, $person->name, $person->acadmics->pluck('name')->implode('/'), $person->genre['name'], $person->age(), $person->city . '-' . $person->state, '<nobr>' . '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Visualizar" href="admin/trainee/' . $person->id . '"><i class="fa fa-lg fa-fw fa-eye"></i></a>'];
                        }

                        $config = [
                            'data' => $list,
                            'order' => [[0, 'asc']],
                            'columns' => [null, null, null, null, null, null, ['orderable' => false]],
                            'language' => ['url' => asset('vendor/datatables/js/pt-BR.json')],
                        ];
                    @endphp

                    <div class="col-12">
                        @include('components.alert')

                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex flex-wrap justify-content-between col-12 align-content-center">
                                    <h3 class="card-title align-self-center">Estagiários</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <x-adminlte-datatable id="table1" :heads="$heads" :heads="$heads" :config="$config" striped
                                    hoverable beautify with-buttons />
                            </div>
                        </div>
                    </div>
                @endif

                @if (Auth::user()->hasRole('Estagiário'))
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-building"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Empresas</span>
                                <span class="info-box-number">{{ $companies }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-briefcase"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Vagas</span>
                                <span class="info-box-number">{{ $vacancies->count() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-check"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Candidaturas</span>
                                <span
                                    class="info-box-number">{{ $candidates->where('user_id', Auth::user()->id)->count() }}</span>
                            </div>
                        </div>
                    </div>

                    @php
                        $heads = [['label' => 'ID', 'width' => 5], 'Título', 'Empresa', 'Nível', 'Período', 'Cidade', 'Candidatura', ['label' => 'Ações', 'no-export' => true, 'width' => 10]];

                        $list = [];

                        foreach ($vacancies as $vacancy) {
                            $list[] = [$vacancy->id, $vacancy->title, $vacancy->company['alias_name'], $vacancy->scholarity['name'], $vacancy->period, $vacancy->city . '-' . $vacancy->state, $vacancy->trainee(), '<nobr>' . '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Visualizar" href="admin/vacancies/' . $vacancy->id . '"><i class="fa fa-lg fa-fw fa-eye"></i></a>'];
                        }

                        $config = [
                            'data' => $list,
                            'order' => [[0, 'asc']],
                            'columns' => [null, null, null, null, null, null, null, ['orderable' => false]],
                            'language' => ['url' => asset('vendor/datatables/js/pt-BR.json')],
                        ];
                    @endphp

                    <div class="col-12">
                        @include('components.alert')

                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex flex-wrap justify-content-between col-12 align-content-center">
                                    <h3 class="card-title align-self-center">Vagas Disponíveis</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <x-adminlte-datatable id="table1" :heads="$heads" :heads="$heads" :config="$config" striped
                                    hoverable beautify with-buttons />
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row px-0">
                {{-- Posts --}}
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Posts Recentes</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                @foreach ($posts as $post)
                                    <li class="item">
                                        <div class="product-img">
                                            @if ($post->brand_facebook)
                                                <img src="{{ url('storage/posts/' . $post->brand_facebook) }}"
                                                    alt="{{ $post->title }}" class="img-size-50">
                                            @elseif($post->brand_instagram)
                                                <img src="{{ url('storage/posts/' . $post->brand_instagram) }}"
                                                    alt="{{ $post->title }}" class="img-size-50">
                                            @elseif($post->brand_twitter)
                                                <img src="{{ url('storage/posts/' . $post->brand_twitter) }}"
                                                    alt="{{ $post->title }}" class="img-size-50">
                                            @else
                                                <img src="{{ asset('vendor/adminlte/dist/img/logo.png') }}"
                                                    alt="{{ $post->title }}" class="img-size-50">
                                            @endif
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-title">{{ $post->title }}
                                                <span class="badge badge-info float-right"> Visualizações
                                                    {{ $post->views }}</span></a>
                                            <span class="product-description">
                                                {{ $post->headline }}
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-footer text-center">
                            <a href="javascript:void(0)" target="_blank" class="uppercase">Ver Mais</a>
                        </div>
                    </div>
                </div>
                {{-- Last Members --}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Novos Estagiários</h3>
                            <div class="card-tools">
                                <span class="badge badge-danger">
                                    {{ $trainee->where('created_at', '>=', date('Y-m-d'))->count() }} membros
                                    novos</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <ul class="users-list clearfix">
                                @foreach ($trainee->take(8) as $person)
                                    <li>
                                        @if ($person->photo)
                                            <img src="{{ url('storage/users/' . $person->photo) }}"
                                                alt="{{ $person->name }}">
                                        @else
                                            <img src="{{ asset('vendor/adminlte/dist/img/avatar.png') }}"
                                                alt="{{ $person->name }}">
                                        @endif
                                        <a class="users-list-name" href="#">{{ $person->name }}</a>
                                        <span
                                            class="users-list-date">{{ date('d/m/Y', strtotime($person->created_at)) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        @if (!Auth::user()->hasRole('Estagiário'))
                            <div class="card-footer text-center">
                                <a href="{{ route('admin.trainees.index') }}">Visualizar Todos</a>
                            </div>
                        @endif

                    </div>

                </div>
            </div>

            {{-- Chart --}}
            @if (Auth::user()->hasRole('Programador|Administrador'))
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Usuários Online: <span
                                            id="onlineusers">{{ $onlineUsers }}</span></h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg" id="accessdaily">{{ $access->count() }}</span>
                                        <span>Acessos Diários</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                        <span id="percentclass"
                                            class="{{ $percent > 0 ? 'text-success' : 'text-danger' }}">
                                            <i id="percenticon"
                                                class="fas {{ $percent > 0 ? 'fa-arrow-up' : 'fa-arrow-down' }}  mr-1"></i><span
                                                id="percentvalue">{{ $percent }}</span>%
                                        </span>
                                        <span class="text-muted">Dia anterior</span>
                                    </p>
                                </div>

                                <div class="position-relative mb-4">
                                    <div class="chartjs-size-monitor" z>
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="visitors-chart" style="display: block; width: 489px; height: 200px;"
                                        class="chartjs-render-monitor" width="489" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>
@endsection

@if (Auth::user()->hasRole('Programador|Administrador'))
    @section('adminlte_js')
        <script>
            const ctx = document.getElementById('visitors-chart');
            if (ctx) {
                ctx.getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ({!! json_encode($chart->labels) !!}),
                        datasets: [{
                            label: 'Acessos por horário',
                            data: {!! json_encode($chart->dataset) !!},
                            borderWidth: 1,
                            borderColor: '#007bff',
                            backgroundColor: 'transparent'
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        legend: {
                            labels: {
                                boxWidth: 0,
                            }
                        },
                    },
                });

                let getData = function() {

                    $.ajax({
                        url: "{{ route('admin.home.chart') }}",
                        type: "GET",
                        success: function(data) {
                            myChart.data.labels = data.chart.labels;
                            myChart.data.datasets[0].data = data.chart.dataset;
                            myChart.update();
                            $("#onlineusers").text(data.onlineUsers);
                            $("#accessdaily").text(data.access);
                            $("#percentvalue").text(data.percent);
                            const percentclass = $("#percentclass");
                            const percenticon = $("#percenticon");
                            percentclass.removeClass('text-success');
                            percentclass.removeClass('text-danger');
                            percenticon.removeClass('fa-arrow-up');
                            percenticon.removeClass('fa-arrow-down');
                            if (data.percent > 0) {
                                percentclass.addClass('text-success');
                                percenticon.addClass('fa-arrow-up');
                            } else {
                                percentclass.addClass('text-danger');
                                percenticon.addClass('fa-arrow-down');
                            }
                        }
                    });
                };
                setInterval(getData, 10000);
            }
        </script>
    @endsection
@endif
