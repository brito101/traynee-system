@extends('adminlte::page')

@section('title', '- Visualizar Estagiários')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-users"></i> Estagiários</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Estagiários</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    @forelse ($trainees as $trainee)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    {{ $trainee->acadmics->pluck('name')->implode('/') }}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>{{ $trainee->name }}</b></h2>
                                            <p class="text-muted text-sm">{{ $trainee->age() }} anos</p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-building"></i></span>
                                                    {{ $trainee->city }}-{{ $trainee->state }}
                                                </li>
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-phone"></i></span>
                                                    {{ $trainee->cell }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            @if ($trainee->photo)
                                                <img src="{{ url('storage/users/' . $trainee->photo) }}"
                                                    alt="{{ $trainee->name }}" class="img-circle img-fluid">
                                            @else
                                                <img src="{{ asset('vendor/adminlte/dist/img/avatar.png') }}"
                                                    alt="{{ $trainee->name }}" class="img-circle img-fluid">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="{{ route('admin.trainee.show', ['id' => $trainee->id]) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> Visualizar Currículo
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <p>Não há estagiários candidatos</p>
                    @endforelse
                </div>
            </div>

            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        {{ $trainees->links() }}
                    </ul>
                </nav>
            </div>

        </div>

    </section>
@endsection
