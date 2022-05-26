@extends('site.master.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/talk-1400x700.jpg') }}" class="d-block w-100 app-banner-img" alt="..."
                            style="">
                        <div class="carousel-caption">
                            <h3 class="text-white h1 fw-bold app-text-shadow">Estudante</h3>
                            <p class="fw-bolder h6">As melhores empresas buscam os melhores talentos na
                                {{ env('APP_NAME') }}.</p>
                            <a href="#" class="btn btn-danger btn-lg mt-2">Cadastre seu currículo</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/hanshake-1400x700.jpg') }}" class="d-block w-100 app-banner-img"
                            alt="...">
                        <div class="carousel-caption">
                            <h3 class="text-white h1 fw-bold app-text-shadow">Empresas</h3>
                            <p class="fw-bolder h6">Cadastre-se para contratar os melhores talentos do mercado</p>
                            <a href="#" class="btn btn-danger btn-lg mt-2">Cadastre-se</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/smile-1400x700.jpg') }}" class="d-block w-100 app-banner-img" alt="...">
                        <div class="carousel-caption">
                            <h3 class="text-white h1 fw-bold app-text-shadow">Seja um Franqueado</h3>
                            <p class="fw-bolder h6">Já somos mais de 100 unidades espalhadas pelo Brasil em menos de 1
                                ano.
                            </p>
                            <a href="#" class="btn btn-danger btn-lg mt-2">Conheça Agora!</a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <section class="bg-white pt-5">
                    <h2 class="text-uppercase text-center fw-bold">O que faz a {{ env('APP_NAME') }}</h2>
                    <article class="container py-3 text-muted">
                        <h3 class="d-none">Descrição</h3>
                        <p class="h5">Somos uma empresa (AGENTE INTEGRADOR entre Escola/Universidade e empresa)
                            Baseada
                            na
                            Lei de estágio 11.788. Lei do estagio nº11788 Consideramos o estágio um ato educativo escolar,
                            desenvolvido
                            no ambiente de trabalho, que visa à preparação para o trabalho produtivo de educandos que
                            estejam
                            frequentando o ensino regular em instituições de educação superior, de educação profissional, de
                            ensino
                            médio, da educação especial e dos anos finais do ensino fundamental, na modalidade profissional
                            da
                            educação
                            de jovens e adultos.</p>
                        <p class="h5">É uma franquia especializada no processo de recrutamento, seleção e gestão
                            de
                            estagiários. Nosso objetivo é identificar, selecionar e entregar os melhores candidatos para
                            integração
                            entre empresa e escola.</p>
                        <p class="h5">Com o uso de um sistema de autogestão de estagiários conseguimos
                            desburocratizar
                            todo
                            o processo de
                            contratação, possibilitando o acesso à informação de forma rápida e acessível aos nossos
                            clientes e
                            tendo
                            assertividade na entrega dos candidatos às vagas.</p>
                    </article>
                </section>

                <section class="container py-5 px-0">
                    <div class="d-flex flex-wrap justify-content-center container">
                        <div class="col-12 col-lg-4 pe-lg-2 text-center">
                            <div class="card shadow-lg">
                                <div class="card-header bg-primary d-flex">
                                    <i class="fa fa-bullseye fa-4x text-white"></i>
                                    <h3 class="text-white mt-3 ms-3">Missão</h3>
                                </div>
                                <div class="card-body">
                                    <p>Proporcionar ao jovem a oportunidade de iniciar a carreira profissional.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 my-4 my-lg-0 px-lg-2 text-center">
                            <div class="card shadow-lg">
                                <div class="card-header bg-primary d-flex">
                                    <i class="fa fa-binoculars fa-4x text-white"></i>
                                    <h3 class="text-white mt-3 ms-3">Visão</h3>
                                </div>
                                <div class="card-body">
                                    <p>Ser referência no mercado como uma empresa que integra e desenvolve os jovens para o
                                        mercado de trabalho.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 ps-lg-2 text-center">
                            <div class="card shadow-lg">
                                <div class="card-header bg-primary d-flex">
                                    <i class="fa fa-rocket fa-4x text-white"></i>
                                    <h3 class="text-white mt-3 ms-3">Valores</h3>
                                </div>
                                <div class="card-body">
                                    <p>Ética, Integração, Inovação, Assertividade e Agilidade.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="bg-dark row px-0 py-5">
        <section>
            <h2 class="d-none">Detalhes</h2>
            <div class="container d-flex flex-wrap mb-lg-3">
                <div class="col-12 col-lg-4 my-4 my-lg-0 px-lg-2 text-center">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-danger d-flex">
                            <i class="fa fa-chart-line fa-4x text-white"></i>
                            <h3 class="text-white mt-3 ms-3">Lucratividade</h3>
                        </div>
                        <div class="card-body">
                            <p>Alta Lucratividade</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 my-4 my-lg-0 px-lg-2 text-center">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-danger d-flex">
                            <i class="fa fa-compress-arrows-alt fa-4x text-white"></i>
                            <h3 class="text-white mt-3 ms-3">Concorrência</h3>
                        </div>
                        <div class="card-body">
                            <p>Segmento com pouca concorrência e os que atendem são carentes em serviço de inovação</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 my-4 my-lg-0 px-lg-2 text-center">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-danger d-flex">
                            <i class="fa fa-money-bill fa-4x text-white"></i>
                            <h3 class="text-white mt-3 ms-3">Investimento</h3>
                        </div>
                        <div class="card-body">
                            <p>Baixo investimento - Rápido retorno</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container d-flex flex-wrap">

                <div class="col-12 col-lg-4 my-4 my-lg-0 px-lg-2 text-center">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-danger d-flex">
                            <i class="fa fa-spinner fa-4x text-white"></i>
                            <h3 class="text-white mt-3 ms-3">Recorrência</h3>
                        </div>
                        <div class="card-body">
                            <p>Contrato de estágio tem durabilidade de dois anos</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 my-4 my-lg-0 px-lg-2 text-center">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-danger d-flex">
                            <i class="fa fa-handshake fa-4x text-white"></i>
                            <h3 class="text-white mt-3 ms-3">Clientes</h3>
                        </div>
                        <div class="card-body">
                            <p>Nossos clientes são empresas com riscos baixíssimos de inadimplência</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 my-4 my-lg-0 px-lg-2 text-center">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-danger d-flex">
                            <i class="fa fa-arrow-up fa-4x text-white"></i>
                            <h3 class="text-white mt-3 ms-3">Mercado</h3>
                        </div>
                        <div class="card-body">
                            <p>Mercado em crescente expansãp</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
