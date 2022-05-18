<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $head->title ?? env('APP_NAME') }}</title>
    <meta name="description" content="{{ $head->description }}">
    <link rel="icon" href="{{ asset('img/favicon.svg') }}" type="image/svg+xml">
    <link rel="preload" href="{{ asset('css/app.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&family=Poppins:wght@400;600&family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="row col-12">
        <div class="container">
            <header>
                <nav class="navbar navbar-marketing navbar-expand-lg bg-white navbar-light">
                    <div class="container">
                        <a class="navbar-brand text-primary" href="{{ route('home') }} "><img
                                src="{{ asset('img/favicon.svg') }}"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
                        <div class="collapse navbar-collapse d-flex flex-wrap justify-content-between"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto me-lg-5">
                                <li class="nav-item"><a class="nav-link"
                                        href="https://evoestagios.com.br/">Home</a></li>
                                <!-- <li class="nav-item"><a class="nav-link" href="o-que-fazemos">O que Fazemos?</a></li> -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="https://evoestagios.com.br/o-que-fazemos"
                                        id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        O que fazemos?
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item"
                                            href="https://evoestagios.com.br/cadastro-estudantes">Estudantes</a>
                                        <a class="dropdown-item"
                                            href="https://evoestagios.com.br/cadastro-empresa">Empresas</a>
                                    </div>
                                </li>

                                <li class="nav-item"><a class="nav-link"
                                        href="https://evoestagios.com.br/vagas">Vagas</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="https://evoestagios.com.br/unidades">Unidades</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="https://evoestagios.com.br/blog">Blog</a></li>


                            </ul>
                            <div>
                                <a class="btn-primary btn rounded-pill px-2 ms-lg-2 btn-franqueado"
                                    href="https://evoestagios.com.br/seja-um-franqueado">Seja um Franqueado</a>
                                <a class="btn-primary btn rounded-pill px-2 ms-lg-2 btn-aluno"
                                    href="https://areafranqueado.evoestagios.com.br/" target="_blank">Área do
                                    Franqueado</a>
                                <a class="btn-primary btn rounded-pill px-2 ms-lg-2 btn-estudante"
                                    href="https://evoestagios.com.br/cadastro_de_curriculo/area-estagiario/autenticacao_usuarios.php"
                                    target="_blank">Área do Estudante</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
    </div>

    @yield('content')

</body>

</html>
