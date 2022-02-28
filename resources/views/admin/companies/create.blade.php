@extends('adminlte::page')

@section('title', '- Cadastro de Empresa')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="far fa-fw fa-building"></i> Nova Empresa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.companies.index') }}">Empresas</a></li>
                        <li class="breadcrumb-item active">Nova Empresa</li>
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
                            <h3 class="card-title">Dados Cadastrais da Empresa</h3>
                        </div>

                        <form method="POST" action="{{ route('admin.companies.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="social_name">Nome da Empresa</label>
                                    <input type="text" class="form-control" id="social_name" placeholder="Nome da Empresa"
                                        name="social_name" value="{{ old('social_name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="alias_name">Nome Fantasia</label>
                                    <input type="text" class="form-control" id="alias_name" placeholder="Nome Fantasia"
                                        name="alias_name" value="{{ old('alias_name') }}">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="telephone">Telefone</label>
                                        <input type="tel" class="form-control" id="telephone" placeholder="Telefone"
                                            name="telephone" value="{{ old('telephone') }}">
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="cell">Celular</label>
                                        <input type="tel" class="form-control" id="cell" placeholder="Celular" name="cell"
                                            value="{{ old('cell') }}">
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

@section('adminlte_js')
    <script src="{{ asset('vendor/jquery/jquery.inputmask.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#telephone').inputmask('(99)-9999-9999');
            $('#cell').inputmask('(99)-99999-9999');
        });
    </script>
@endsection
