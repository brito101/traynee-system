@extends('adminlte::page')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Vagas por Empresas</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="position-relative mb-4">
                                    <div class="chartjs-size-monitor" z>
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="vacancy-chart" style="display: block; width: 489px; height: 200px;"
                                        class="chartjs-render-monitor" width="489" height="270"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('custom_js')
    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script>
        const vacancyChart = document.getElementById('vacancy-chart');
        if (vacancyChart) {
            const myChart = new Chart(vacancyChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($chart->trainee) !!},
                    datasets: [
                        @foreach ($finalList as $list)
                            {
                            label: "Vaga" + {!! json_encode($list['vacancy']) !!} ,
                            backgroundColor: '#' + Math.floor(Math.random() * (235 - 52 + 1) + 52),
                            data: {!! json_encode($list['values']) !!} ,
                            },
                        @endforeach
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        //     xAxes: [{
                        //         barThickness: 50,
                        //         maxBarThickness: 50
                        //     }]
                        // },
                        // legend: {
                        //     labels: {
                        //         boxWidth: 0,
                        //     }
                    },
                },
            });
        }
    </script>
@endsection
