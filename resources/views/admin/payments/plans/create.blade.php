@extends('adminlte::page')
@section('plugins.select2', true)

@section('title', '- Cadastro de Plano')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-money-check"></i> Novo Plano</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pagamento</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.plans.index') }}">Planos de Pagamento</a>
                        </li>
                        <li class="breadcrumb-item active">Novo Plano</li>
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
                            <h3 class="card-title">Dados Cadastrais do Plano</h3>
                        </div>

                        <form method="POST" action="{{ route('admin.plans.store') }}">
                            @csrf
                            <div class="card-body">

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="name">Nome do Plano</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nome do Plano"
                                            name="name" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="interval">Período</label>
                                        <x-adminlte-select2 name="interval">
                                            day,week, month ou year.
                                            <option value="day" {{ old('interval') == 'day' ? 'selected' : '' }}>Diário
                                            </option>
                                            <option value="week" {{ old('interval') == 'week' ? 'selected' : '' }}>
                                                Semanal
                                            </option>
                                            <option value="month" {{ old('interval') == 'month' ? 'selected' : '' }}>
                                                Mensal
                                            </option>
                                            <option value="year" {{ old('interval') == 'year' ? 'selected' : '' }}>Anual
                                            </option>
                                        </x-adminlte-select2>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="trial_days">Período de teste</label>
                                        <input type="text" class="form-control days" id="trial_days"
                                            placeholder="Número de dias (padrão 0 dias)" name="trial_days"
                                            value="{{ old('trial_days') }}" required>
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="amount">Valor</label>
                                        <input type="text" class="form-control" id="amount" placeholder="Valor do Plano"
                                            name="amount" value="{{ old('amount') }}">
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="payment_methods">Métodos de Pagamento</label>
                                        <x-adminlte-select2 name="payment_methods">
                                            <option value="1" {{ old('payment_methods') == '1' ? 'selected' : '' }}>
                                                Boleto
                                            </option>
                                            <option value="2" {{ old('payment_methods') == '2' ? 'selected' : '' }}>
                                                Cartão
                                                de Crédito</option>
                                            <option value="3" {{ old('payment_methods') == '3' ? 'selected' : '' }}>
                                                Boleto
                                                e Cartão de Crédito</option>
                                        </x-adminlte-select2>
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="status">Status</label>
                                        <x-adminlte-select2 name="status">
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Ativo</option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inativo
                                            </option>
                                        </x-adminlte-select2>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script src="{{ asset('vendor/jquery/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('js/payment.js') }}"></script>
@endsection
