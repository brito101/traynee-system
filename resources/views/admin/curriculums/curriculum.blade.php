@extends('adminlte::page')

@section('title', '- Visualizar Currículo')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-file-alt"></i> Currículo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Currículo</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ $user->photo != null ? url('storage/users/' . $user->photo) : asset('/vendor/adminlte/dist/img/avatar.png') }}"
                                    alt="{{ $user->name }}">
                            </div>
                            <h3 class="profile-username text-center">{{ $user->name }}</h3>
                            <p class="text-muted text-center">{{ $user->age() }} anos</p>
                        </div>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sobre mim</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Localização</strong>
                            <p class="text-muted">{{ $user->city }}-{{ $user->state }}</p>
                            <hr>
                            @if (!empty($user->telephone))
                                <strong><i class="fas fa-phone-alt mr-1"></i> Telefone</strong>
                                <p class="text-muted">{{ $user->telephone }}</p>
                                <hr>
                            @endif
                            @if (!empty($user->cell))
                                <strong><i class="fa fa-mobile mr-1"></i> Celular</strong>
                                <p class="text-muted">{{ $user->cell }}</p>
                                <hr>
                            @endif
                            <strong><i class="fa fa-mail-bulk mr-1"></i> E-mail</strong>
                            <p class="text-muted">{{ $user->email }}</p>
                            <hr>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#courses"
                                        data-toggle="tab">Cursos de Formação</a></li>
                                <li class="nav-item"><a class="nav-link" href="#extracourses"
                                        data-toggle="tab">Cursos Extracurriculares</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings"
                                        data-toggle="tab">Redação</a></li>
                                @if ($user->requiriment)
                                    <li class="nav-item"><a class="nav-link" href="#requiriments"
                                            data-toggle="tab">Necessidades Especiais</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="courses">
                                    @foreach ($user->acadmics as $academic)
                                        <div class="post">
                                            <div class="user-block ml-n5 mr-5">
                                                <span class="username">
                                                    <a href="#">{{ $academic->name }}</a>
                                                </span>
                                                <span class="description">Formatura:
                                                    {{ $academic->graduation }}</span>
                                            </div>

                                            <div>
                                                <ul>
                                                    <li>Nível: {{ $academic->scholarity['name'] }}</li>
                                                    <li>Período/Ano: {{ $academic->year }}</li>
                                                    <li>Instituição: {{ $academic->institution }}</li>
                                                    <li>Turno: {{ $academic->time }}</li>
                                                    <li>Disponibilidade: {{ $academic->availability }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="tab-pane" id="extracourses">
                                    @foreach ($user->extra as $extra)
                                        <div class="post">
                                            <div class="user-block ml-n5 mr-5">
                                                <span class="username">
                                                    <a href="#">{{ $extra->name }}</a>
                                                </span>
                                                <span class="description">Tipo:
                                                    {{ $extra->course['name'] }}</span>
                                            </div>

                                            <div>
                                                <ul>
                                                    <li>Nível: {{ $extra->level }}</li>
                                                    <li>Instituição: {{ $extra->institution }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="tab-pane" id="settings">
                                    <div class="post">
                                        @isset($user->composing)
                                            <div class="user-block ml-n5 mr-5">
                                                <span class="username">
                                                    <a href="#">{{ $user->composing['title'] }}</a>
                                                </span>
                                            </div>
                                            <div>
                                                {{ $user->composing['content'] }}
                                            </div>
                                        @endisset
                                    </div>
                                </div>

                                @if ($user->requiriment)
                                    <div class="tab-pane active" id="requiriments">
                                        <div class="post">
                                            @foreach ($user->requiriment as $req)
                                                <div class="post">
                                                    <div class="user-block ml-n5 mr-5">
                                                        <span class="username">Tipo:
                                                            <a href="#">{{ $req->type }}</a>
                                                        </span>
                                                        <p class="description">Observações: {{ $req->details }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
