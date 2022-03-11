@extends('adminlte::page')

@section('title', '- Cadastro de Vaga')
@section('plugins.Summernote', true)
@section('plugins.select2', true)
@section('plugins.BsCustomFileInput', true)

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-briefcase"></i> Nova Vaga</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.vacancies.index') }}">Vagas</a></li>
                        <li class="breadcrumb-item active">Nova Vaga</li>
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
                            <h3 class="card-title">Dados Cadastrais da Vaga</h3>
                        </div>

                        <form method="POST" action="{{ route('admin.vacancies.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control" id="title" placeholder="Título do Post"
                                            name="title" value="{{ old('title') }}" required>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="courses">Cursos de interesse</label>
                                        <input type="text" class="form-control" id="courses"
                                            placeholder="Informática, idiomas etc" name="courses"
                                            value="{{ old('courses') }}" required>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="scholarity">Escolaridade</label>
                                        <x-adminlte-select2 name="scholarity_id">
                                            <option value="">Não Informado</option>
                                            @foreach ($scholarities as $scholarity)
                                                <option {{ old('scholarity_id') == $scholarity->id ? 'selected' : '' }}
                                                    value="{{ $scholarity->id }}">{{ $scholarity->name }}
                                                </option>
                                            @endforeach
                                        </x-adminlte-select2>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="experience">Experiência</label>
                                        <input type="text" class="form-control" id="experience"
                                            placeholder="Sem experiência, parcial etc" name="experience"
                                            value="{{ old('experience') }}" required>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-12 form-group px-0">
                                        @php
                                            $config = [
                                                'height' => '300',
                                                'toolbar' => [
                                                    // [groupName, [list of button]]
                                                    ['style', ['bold', 'italic', 'underline', 'clear']],
                                                    ['font', ['strikethrough', 'superscript', 'subscript']],
                                                    ['fontsize', ['fontsize']],
                                                    ['color', ['color']],
                                                    ['para', ['ul', 'ol', 'paragraph']],
                                                    ['height', ['height']],
                                                    ['table', ['table']],
                                                    ['insert', ['link', 'picture', 'video']],
                                                    ['view', ['fullscreen', 'codeview', 'help']],
                                                ],
                                            ];
                                        @endphp
                                        <x-adminlte-text-editor name="description" label="Descrição da vaga"
                                            igroup-size="sm" placeholder="Escreva a descrição da vaga aqui..."
                                            :config="$config">
                                            {{ old('description') }}
                                        </x-adminlte-text-editor>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="benefits">Benefícios</label>
                                        <input type="text" class="form-control" id="benefits"
                                            placeholder="Plano dontológico, vale refeição etc" name="benefits"
                                            value="{{ old('benefits') }}">
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="period">Período</label>
                                        <input type="text" class="form-control" id="period"
                                            placeholder="Meio período, noturno etc" name="period"
                                            value="{{ old('period') }}">
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="requirements">Requerimentos</label>
                                        <input type="text" class="form-control" id="requirements"
                                            placeholder="Boa comunicação, trabalho em equipe etc" name="requirements"
                                            value="{{ old('requirements') }}">
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="neighborhood">Bairro</label>
                                        <input type="text" class="form-control" id="neighborhood" placeholder="Bairro"
                                            name="neighborhood" value="{{ old('neighborhood') }}">
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="city">Cidade</label>
                                        <input type="text" class="form-control" id="city" placeholder="Cidade" name="city"
                                            value="{{ old('city') }}">
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="state">Estado</label>
                                        <input type="text" class="form-control" id="state" placeholder="UF" name="state"
                                            value="{{ old('state') }}">
                                    </div>
                                </div>

                                <div class="col-12 form-group px-0 d-flex flex-wrap">
                                    <div class="col-md-12 px-0">
                                        <x-adminlte-input-file name="brand_facebook"
                                            label="Compartilhamento para Facebook (recomendável 1200 x 630 pixels)"
                                            placeholder="Selecione uma imagem..." legend="Selecionar" />
                                    </div>
                                </div>

                                <div class="col-12 form-group px-0 d-flex flex-wrap">
                                    <div class="col-md-12 px-0">
                                        <x-adminlte-input-file name="brand_instagram"
                                            label="Compartilhamento para Instagram (recomendável 1080 x 1080 pixels, quadrada)"
                                            placeholder="Selecione uma imagem..." legend="Selecionar" />
                                    </div>
                                </div>

                                <div class="col-12 form-group px-0 d-flex flex-wrap">
                                    <div class="col-md-12 px-0">
                                        <x-adminlte-input-file name="brand_twitter"
                                            label="Compartilhamento para Twitter (recomendável 1.1600 x 900  pixels ou proporção 16:9)"
                                            placeholder="Selecione uma imagem..." legend="Selecionar" />
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
    <script src="{{ asset('js/vacancy.js') }}"></script>
@endsection
