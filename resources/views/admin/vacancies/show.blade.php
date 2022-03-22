@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-briefcase"></i> Vaga: {{ $vacancy->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
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

                    <x-adminlte-profile-widget name="{{ $vacancy->company['alias_name'] }}" theme="lightblue"
                        desc="{{ $vacancy->company['city'] . '-' . $vacancy->company['state'] . '. Tel: ' . $vacancy->company['telephone'] }}"
                        img="{{ !$vacancy->company['logo']? url('storage/companies/' . $vacancy->company['logo']): asset('/vendor/adminlte/dist/img/logo.png') }}"
                        class="bg-with">

                        <x-adminlte-profile-row-item icon="fas fa-fw fa-user-friends" title="Candidatos" text="125"
                            class="border-bottom border-dark mt-n4 mb-4" url="#" badge="teal" />
                        <div class="d-flex flex-wrap justify-content-between col-12">
                            <div class="col-12 form-group px-0">
                                <label>Cursos de interesse</label>
                                <p>{{ $vacancy->courses }}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between col-12">
                            <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                <label>Escolaridade</label>
                                <p>{{ $vacancy->scholarity['name'] }}</p>
                            </div>
                            <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                <label>Experiência</label>
                                <p>{{ $vacancy->experience }}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between">
                            <div class="col-12 col-md-12 form-group px-0">
                                <label>Descrição da vaga</label>
                                {!! $vacancy->description !!}
                            </div>
                        </div>
                        @if ($vacancy->benefits)
                            <div class="d-flex flex-wrap justify-content-between col-12">
                                <div class="col-12 form-group px-0 pr-md-2">
                                    <label>Benefícios</label>
                                    <p>{{ $vacancy->benefits }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($vacancy->period)
                            <div class="d-flex flex-wrap justify-content-between col-12">
                                <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                    <label>Período</label>
                                    <p>{{ $vacancy->period }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($vacancy->requirements)
                            <div class="d-flex flex-wrap justify-content-between col-12">
                                <div class="col-12 form-group px-0 pr-md-2">
                                    <label>Requisitos</label>
                                    <p>{{ $vacancy->requirements }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="d-flex flex-wrap justify-content-between col-12">
                            <div class="col-12 form-group px-0 pr-md-2">
                                <label>Endereço</label>
                                <p>{{ $vacancy->city }}-{{ $vacancy->state }}. Bairro: {{ $vacancy->neighborhood }}
                                </p>
                            </div>
                        </div>

                        <x-adminlte-profile-row-item title="Redes Sociais:" class="text-center text-dark border-bottom" />
                        <x-adminlte-profile-row-item icon="fab fa-fw fa-2x fa-instagram text-dark" title="Instagram"
                            url="{{ $vacancy->company['instagram'] }}" size=4 />
                        <x-adminlte-profile-row-item icon="fab fa-fw fa-2x fa-facebook text-dark" title="Facebook"
                            url="{{ $vacancy->company['facebook'] }}" size=4 />
                        <x-adminlte-profile-row-item icon="fab fa-fw fa-2x fa-twitter text-dark" title="Twitter"
                            url="{{ $vacancy->company['twitter'] }}" size=4 />
                    </x-adminlte-profile-widget>
                </div>
            </div>
        </div>
    </section>
@endsection
