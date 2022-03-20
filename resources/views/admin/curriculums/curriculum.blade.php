@extends('adminlte::page')

@section('title', '- Visualizar Cúrriculo')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-file-alt"></i> Cúrriculo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cúrriculo</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <x-adminlte-profile-widget name="{{ $user->name }}" desc="{{ $user->age() }} anos"
                        class="elevation-4" img="{{ url('storage/users/' . $user->photo) }}" theme="lightblue"
                        layout-type="classic" header-class="text-right" footer-class="bg-gradient-light">

                        <x-adminlte-profile-row-item icon="fas fa-lg fa-map-marker-alt"
                            title="{{ $user->city }}-{{ $user->state }}" class="text-left text-dark border-bottom"
                            size="6" />
                        <x-adminlte-profile-row-item icon=" fas fa-lg fa-phone-alt"
                            title="{{ $user->telephone }} | {{ $user->cell }}"
                            class="text-right text-dark border-bottom" size="6" />

                        <x-adminlte-profile-row-item class="text-dark" icon="fas fa-lg fa-graduation-cap"
                            title="Informações Acadêmicas" />

                        @foreach ($user->acadmics as $academic)
                            <x-adminlte-profile-col-item class="border-right text-dark" title="Curso"
                                text="{{ $academic->name }}" size=4 />
                            <x-adminlte-profile-col-item class="border-right text-dark" title="Nível"
                                text="{{ $academic->scholarity['name'] }}" size=2 />
                            <x-adminlte-profile-col-item class="border-right text-dark" title="Conclusão"
                                text="{{ $academic->graduation }}" size=2 />
                            <x-adminlte-profile-col-item class="border-right text-dark" title="Turno"
                                text="{{ $academic->time }}" size=2 />
                            <x-adminlte-profile-col-item class="text-dark" title="Disponibilidade"
                                text="{{ $academic->availability }}" size=2 />
                        @endforeach


                        <x-adminlte-profile-row-item class="text-dark" icon="fas fa-lg fa-tasks"
                            title="Cursos Extracurriculares" text="5" size=6 badge="danger" />

                        <x-adminlte-profile-row-item title="Contact me on:" class="text-center text-dark border-bottom" />

                        <x-adminlte-profile-row-item icon="fab fa-fw fa-2x fa-instagram text-dark" title="Instagram" url="#"
                            size=4 />

                        <x-adminlte-profile-row-item icon="fab fa-fw fa-2x fa-facebook text-dark" title="Facebook" url="#"
                            size=4 />

                        <x-adminlte-profile-row-item icon="fab fa-fw fa-2x fa-twitter text-dark" title="Twitter" url="#"
                            size=4 />

                    </x-adminlte-profile-widget>

                </div>
            </div>
        </div>
    </section>

@endsection
