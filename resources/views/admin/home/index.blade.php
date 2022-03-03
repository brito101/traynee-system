@extends('adminlte::page')

@section('title', '- Dashboard')
@section('plugins.Chartjs', true)

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
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Administradores</span>
                            <span class="info-box-number">{{ $administrators }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Empresas</span>
                            <span class="info-box-number">{{ $companies }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-briefcase"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Empresários</span>
                            <span class="info-box-number">{{ $businessmen }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Estagiários</span>
                            <span class="info-box-number">{{ $trainee }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Usuários Online: {{ $onlineUsers }}</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">{{ $access->count() }}</span>
                                    <span>Acessos Diários</span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <span class="{{ $percent > 0 ? 'text-success' : 'text-danger' }}">
                                        <i
                                            class="fas {{ $percent > 0 ? 'fa-arrow-up' : 'fa-arrow-down' }}  mr-1"></i>{{ $percent }}%
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
        </div>
    </section>
@endsection

@section('adminlte_js')
    <script>
        const ctx = document.getElementById('visitors-chart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ({!! json_encode($chart->labels) !!}).map(i => i + 'H'),
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
            }
        });
    </script>
@endsection
