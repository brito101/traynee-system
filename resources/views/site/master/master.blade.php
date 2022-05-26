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
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
</head>

<body>
    <h1 class="d-none">{{ env('APP_NAME') }}</h1>
    <div class="row">
        <header class="col-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container col-12 d-flex flex-wrap justify-content-between align-content-center">
                    <div class="col-12 col-lg-3 d-flex align-items-center justify-content-between">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <h2 class="text-white fw-bold">{{ env('APP_NAME') }}</h2>
                        </a>
                        <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse col-lg-9" id="navbarScroll">
                        <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarScrollingDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    O que fazemos?
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="#">Estudantes</a></li>
                                    <li><a class="dropdown-item" href="#">Empresas</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('vacancies') }}">Vagas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Unidades</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-light text-nowrap d-flex justify-content-center app-btn-header-width"
                                    href="#">Seja um
                                    Franqueado</a>
                            </li>
                            <li class="nav-item my-2 my-lg-0 mx-lg-2">
                                <a class="btn btn-outline-light text-nowrap d-flex justify-content-center app-btn-header-width"
                                    href="#">Área do
                                    Franqueado</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-light text-nowrap d-flex justify-content-center app-btn-header-width"
                                    href="#">Área do
                                    Estudante</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>

    @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
