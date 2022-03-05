@extends('adminlte::page')
@section('plugins.BsCustomFileInput', true)

@can('Editar Empresas')
    @section('title', '- Editar Empresa')
@else
@section('title', '- Dados da Empresa')
@endcan

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @can('Editar Empresas')
                    <h1><i class="far fa-fw fa-building"></i> Editar Empresa</h1>
                @else
                    <h1><i class="far fa-fw fa-building"></i> Dados da Empresa</h1>
                @endcan
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    @can('Editar Empresas')
                        <li class="breadcrumb-item"><a href="{{ route('admin.companies.index') }}">Empresas</a></li>
                        <li class="breadcrumb-item active">Editar Empresa</li>
                    @else
                        <li class="breadcrumb-item active">Dados da Empresa</li>
                    @endcan
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

                    <form method="POST" action="{{ route('admin.companies.update', ['company' => $company->id]) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{ $company->id }}">
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                    <label for="social_name">Nome da Empresa</label>
                                    <input type="text" class="form-control" id="social_name"
                                        placeholder="Nome da Empresa" name="social_name"
                                        value="{{ old('social_name') ?? $company->social_name }}" required>
                                </div>
                                <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                    <label for="alias_name">Nome Fantasia</label>
                                    <input type="text" class="form-control" id="alias_name"
                                        placeholder="Nome Fantasia" name="alias_name"
                                        value="{{ old('alias_name') ?? $company->alias_name }}" required>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                    <label for="document_company">CNPJ</label>
                                    <input type="text" class="form-control" id="document_company" placeholder="CNPJ"
                                        name="document_company"
                                        value="{{ old('document_company') ?? $company->document_company }}" required>
                                </div>
                                <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                    <label for="document_company_secondary">Inscrição Estadual</label>
                                    <input type="text" class="form-control" id="document_company_secondary"
                                        placeholder="Inscrição Estadual" name="document_company_secondary"
                                        value="{{ old('document_company_secondary') ?? $company->document_company_secondary }}">
                                </div>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" placeholder="E-mail"
                                        name="email" value="{{ old('email') ?? $company->email }}" required>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                    <label for="telephone">Telefone</label>
                                    <input type="tel" class="form-control" id="telephone" placeholder="Telefone"
                                        name="telephone" value="{{ old('telephone') ?? $company->telephone }}"
                                        required>
                                </div>
                                <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                    <label for="cell">Celular</label>
                                    <input type="tel" class="form-control" id="cell" placeholder="Celular" name="cell"
                                        value="{{ old('cell') ?? $company->cell }}">
                                </div>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                    <label for="zipcode">CEP</label>
                                    <input type="tel" class="form-control" id="zipcode" placeholder="CEP"
                                        name="zipcode" value="{{ old('zipcode') ?? $company->zipcode }}" required>
                                </div>
                                <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                    <label for="street">Rua</label>
                                    <input type="text" class="form-control" id="street" placeholder="Rua"
                                        name="street" value="{{ old('street') ?? $company->street }}" required>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                    <label for="number">Número</label>
                                    <input type="text" class="form-control" id="number" placeholder="Número"
                                        name="number" value="{{ old('number') ?? $company->number }}" required>
                                </div>
                                <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                    <label for="complement">Complemento</label>
                                    <input type="text" class="form-control" id="complement" placeholder="Complemento"
                                        name="complement" value="{{ old('complement') ?? $company->complement }}">
                                </div>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                    <label for="neighborhood">Bairro</label>
                                    <input type="text" class="form-control" id="neighborhood" placeholder="Bairro"
                                        name="neighborhood"
                                        value="{{ old('neighborhood') ?? $company->neighborhood }}" required>
                                </div>
                                <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                    <label for="state">Estado</label>
                                    <input type="text" class="form-control" id="state" placeholder="Estado"
                                        name="state" value="{{ old('state') ?? $company->state }}">
                                </div>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                    <label for="city">Cidade</label>
                                    <input type="text" class="form-control" id="city" placeholder="Cidade" name="city"
                                        value="{{ old('city') ?? $company->city }}" required>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="col-12 col-md-6 form-group px-0 pr-md-2 d-flex flex-wrap">

                                    <div class="{{ $company->logo != null ? 'col-md-9' : 'col-md-12' }} px-0">
                                        <x-adminlte-input-file name="logo" label="Logotipo"
                                            placeholder="Selecione uma imagem..." legend="Selecionar" />
                                    </div>

                                    @if ($company->logo != null)
                                        <div
                                            class='col-12 col-md-3 align-self-center mt-3 d-flex justify-content-center justify-content-md-end px-0'>
                                            <img src="{{ url('storage/companies/' . $company->logo) }}"
                                                alt="{{ $company->alias_name }}" style="max-width: 80%;"
                                                class="img-thumbnail d-block">
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
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
<script src="{{ asset('js/company.js') }}"></script>
@endsection
