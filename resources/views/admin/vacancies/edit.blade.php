@extends('adminlte::page')

@section('title', '- Editar Vaga')
@section('plugins.Summernote', true)
@section('plugins.select2', true)
@section('plugins.BsCustomFileInput', true)

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-briefcase"></i> Editar Vaga</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.vacancies.index') }}">Vagas</a></li>
                        <li class="breadcrumb-item active">Editar Vaga</li>
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

                        <form method="POST" action="{{ route('admin.vacancies.update', ['vacancy' => $vacancy->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-body">

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control" id="title" placeholder="Título da Vaga"
                                            name="title" value="{{ old('title') ?? $vacancy->title }}" required>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="courses">Cursos de interesse</label>
                                        <input type="text" class="form-control" id="courses"
                                            placeholder="Informática, idiomas etc" name="courses"
                                            value="{{ old('courses') ?? $vacancy->courses }}" required>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="scholarity">Escolaridade</label>
                                        <x-adminlte-select2 name="scholarity_id">
                                            <option value="">Não Informado</option>
                                            @foreach ($scholarities as $scholarity)
                                                <option
                                                    {{ old('scholarity_id') == $scholarity->id? 'selected': ($vacancy->scholarity_id == $scholarity->id? 'selected': '') }}
                                                    value="{{ $scholarity->id }}">{{ $scholarity->name }}
                                                </option>
                                            @endforeach
                                        </x-adminlte-select2>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="experience">Experiência</label>
                                        <input type="text" class="form-control" id="experience"
                                            placeholder="Sem experiência, parcial etc" name="experience"
                                            value="{{ old('experience') ?? $vacancy->experience }}" required>
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
                                            {{ old('description') ?? $vacancy->description }}
                                        </x-adminlte-text-editor>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="benefits">Benefícios</label>
                                        <input type="text" class="form-control" id="benefits"
                                            placeholder="Plano dontológico, vale refeição etc" name="benefits"
                                            value="{{ old('benefits') ?? $vacancy->benefits }}">
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="period">Período</label>
                                        <input type="text" class="form-control" id="period"
                                            placeholder="Meio período, noturno etc" name="period"
                                            value="{{ old('period') ?? $vacancy->period }}">
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="requirements">Requisitos</label>
                                        <input type="text" class="form-control" id="requirements"
                                            placeholder="Boa comunicação, trabalho em equipe etc" name="requirements"
                                            value="{{ old('requirements') ?? $vacancy->requirements }}">
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="neighborhood">Bairro</label>
                                        <input type="text" class="form-control" id="neighborhood" placeholder="Bairro"
                                            name="neighborhood"
                                            value="{{ old('neighborhood') ?? $vacancy->neighborhood }}">
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="city">Cidade</label>
                                        <input type="text" class="form-control" id="city" placeholder="Cidade" name="city"
                                            value="{{ old('city') ?? $vacancy->city }}">
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="state">Estado</label>
                                        <input type="text" class="form-control" id="state" placeholder="UF" name="state"
                                            value="{{ old('state') ?? $vacancy->state }}">
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 form-group px-0 d-flex flex-wrap">
                                        <div
                                            class="{{ $vacancy->brand_facebook != null ? 'col-md-9' : 'col-md-12' }} px-0">
                                            <x-adminlte-input-file name="brand_facebook"
                                                label="Compartilhamento para Facebook (recomendável 1200 x 630 pixels)"
                                                placeholder="Selecione uma imagem..." legend="Selecionar" />
                                        </div>

                                        @if ($vacancy->brand_facebook != null)
                                            <div
                                                class='col-12 col-md-3 align-self-center mt-3 d-flex justify-content-center justify-content-md-end px-0'>
                                                <img src="{{ url('storage/vacancies/' . $vacancy->brand_facebook) }}"
                                                    alt="Imagem para o Facebook" style="max-width: 80%;"
                                                    class="img-thumbnail d-block">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-12 form-group px-0 d-flex flex-wrap">
                                        <div
                                            class="{{ $vacancy->brand_instagram != null ? 'col-md-9' : 'col-md-12' }} px-0">
                                            <x-adminlte-input-file name="brand_instagram"
                                                label="Compartilhamento para Instagram (recomendável 1080 x 1080 pixels, quadrada)"
                                                placeholder="Selecione uma imagem..." legend="Selecionar" />
                                        </div>

                                        @if ($vacancy->brand_instagram != null)
                                            <div
                                                class='col-12 col-md-3 align-self-center mt-3 d-flex justify-content-center justify-content-md-end px-0'>
                                                <img src="{{ url('storage/vacancies/' . $vacancy->brand_instagram) }}"
                                                    alt="Imagem para o Instagram" style="max-width: 80%;"
                                                    class="img-thumbnail d-block">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-12 form-group px-0 d-flex flex-wrap">
                                        <div
                                            class="{{ $vacancy->brand_twitter != null ? 'col-md-9' : 'col-md-12' }} px-0">
                                            <x-adminlte-input-file name="brand_twitter"
                                                label="Compartilhamento para Twitter (recomendável 1.1600 x 900  pixels ou proporção 16:9)"
                                                placeholder="Selecione uma imagem..." legend="Selecionar" />
                                        </div>

                                        @if ($vacancy->brand_twitter != null)
                                            <div
                                                class='col-12 col-md-3 align-self-center mt-3 d-flex justify-content-center justify-content-md-end px-0'>
                                                <img src="{{ url('storage/vacancies/' . $vacancy->brand_twitter) }}"
                                                    alt="Imagem para o twitter" style="max-width: 80%;"
                                                    class="img-thumbnail d-block">
                                            </div>
                                        @endif
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
