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

    @include('site.master.components.header', [
        'menuItens' => [
            [
                'name' => 'O que fazemos?',
                'url' => '#',
                'class' => '',
                'classLink' => 'nav-link  text-white',
                'dropdown' => [['name' => 'Estudantes', 'url' => '#'], ['name' => 'Empresas', 'url' => '#']],
            ],
            ['name' => 'Vagas', 'url' => route('vacancies'), 'class' => '', 'classLink' => 'nav-link  text-white'],
            ['name' => 'Unidades', 'url' => '#', 'class' => '', 'classLink' => 'nav-link  text-white'],
            ['name' => 'Blog', 'url' => '#', 'class' => '', 'classLink' => 'nav-link  text-white'],
            [
                'name' => 'Seja um Franqueado',
                'url' => '#',
                'class' => '',
                'classLink' =>
                    'btn btn-outline-light text-nowrap d-flex justify-content-center app-btn-header-width',
            ],
            [
                'name' => 'Área do Franqueado',
                'url' => '#',
                'class' => 'my-2 my-lg-0 mx-lg-2',
                'classLink' =>
                    'btn btn-outline-light text-nowrap d-flex justify-content-center app-btn-header-width',
            ],
            [
                'name' => 'Área do Estudante',
                'url' => '#',
                'class' => '',
                'classLink' =>
                    'btn btn-outline-light text-nowrap d-flex justify-content-center app-btn-header-width',
            ],
        ],
    ])

    <div class="row no-gutter">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
