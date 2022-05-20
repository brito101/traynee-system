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

    <footer class="footer pt-10 pb-5 mt-auto bg-black footer-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-brand">
                        <img href="home" src="https://evoestagios.com.br/img/evo-logo.png" height="60"
                            alt="Logo Evolute Online">
                    </div>
                    <div class="mb-3 ml-5"></div>
                    <div class="icon-list-social mb-5 ml-5">
                        <a class="icon-list-social-link" href="https://www.instagram.com/evoestagios/"
                            target="_blank"><i class="fab fa-instagram"></i></a>
                        <a class="icon-list-social-link" href="https://www.facebook.com/evoestagios/" target="_blank"><i
                                class="fab fa-facebook"></i></a>
                        <a class="icon-list-social-link" href="https://www.linkedin.com/company/evoest%C3%A1gios"
                            target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-5 mb-lg-0">
                            <div class="text-uppercase-expanded text-xs mb-4">Menu</div>
                            <ul class="list-unstyled mb-0">
                                <li class="text-uppercase-expanded text-xs mb-2">O que fazemos?</li>
                                <li class="mb-2"><a
                                        href="https://evoestagios.com.br/cadastro-estudantes">Estudantes</a></li>
                                <li class="mb-3"><a
                                        href="https://evoestagios.com.br/cadastro-empresa">Empresas</a></li>
                                <li class="mb-2"><a href="https://evoestagios.com.br/vagas">Vagas</a></li>
                                <li class="mb-2"><a href="https://evoestagios.com.br/unidades">Unidades</a>
                                </li>
                                <li class="mb-2"><a href="https://evoestagios.com.br/blog">Blog</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-5 mb-lg-0">


                            <ul class="list-unstyled mb-0">
                                <li class="text-uppercase-expanded text-xs mb-2">E-mail:</li>
                                <li class="mb-2">contato@evoestagios.com.br</li>
                                <li class="text-uppercase-expanded text-xs mb-2">Telefone</li>
                                <li class="mb-2">(12) 3632-1318</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-5" />
            <div class="row align-items-center">
                <div class="col-md-6 small">Copyright &copy; EvoEstágios 2021</div>
                <div class="col-md-6 text-md-right small">
                </div>
            </div>
        </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://evoestagios.com.br/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.0/lity.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://evoestagios.com.br/js/jquery.mask.min.js"></script>
    <script src="https://evoestagios.com.br/js/evo.js"></script>

    <script src="https://evoestagios.com.br/js/slider-depoimentos.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <script src="https://evoestagios.com.br/js/slider-home.js"></script>



    <script>
        AOS.init({
            disable: 'mobile',
            duration: 600,
            once: true
        });
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#telefone').mask('(00) 0000-00009');
            $('#input_telefone').mask('(00) 0000-00009');
            $('#input_cpf').mask('000.000.000-00');
        });
    </script>
    <script>
        $('#estado').change(function() {

            var idEstado = $('select[id=estado] option').filter(':selected').val();
            // console.log("TESTE: " + idEstado);

            $.post('cidades.php', {
                'idEstado': idEstado
            }).done(function(data) {
                $("#cidade").removeAttr('disabled');
                $('select[id=cidade] option').remove();
                // console.log(data);

                var response = jQuery.parseJSON(data);
                // console.log(response.id.length);
                $("#cidade").append('<option disabled selected> - Selecione uma Cidade - </option>');
                $("#cidade").append('<option disabled></option>');

                for (var i = 0; i < response.id.length; i++) {
                    $("#cidade").append($('<option >', {
                        value: response.id[i],
                        text: response.nome[i]
                    }));
                }
            });
        });
    </script>

</body>

</html>
