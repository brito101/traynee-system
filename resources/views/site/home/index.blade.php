@extends('site.master.master')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active"
                style="background-image:url(https://evoestagios.com.br/img/img-estagios.jpg); background-position: center; height: 60vh">
                <div class="carousel-caption" style="top: 30%">
                    <h5
                        style='font-size: 3rem; font-weight: 600; margin-bottom: -1px; color: white; text-shadow: 2px 2px 6px #000000;'>
                        Estudante</h5>
                    <!-- For LG displays -->
                    <p class="d-none d-md-block" style="font-size: 1.8rem; color: white; text-shadow: 2px 2px 6px #000000;">
                        As melhores empresas buscam os<br> melhores talentos na EvoEstágios.</p>
                    <!-- For SM displays -->
                    <p class="d-lg-none" style="font-size: 1.2rem; color: white; text-shadow: 2px 2px 6px #000000;">As
                        melhores empresas buscam os<br> melhores talentos na EvoEstágios.</p>
                    <p><a href="https://evoestagios.com.br/cadastro-estudantes"
                            class="btn btn-marketing rounded-pill btn-danger" role="button" aria-pressed="true"
                            data-aos="fade-up" data-aos-delay="0">Cadastre seu Currículo</a></p>
                </div>
            </div>

            <div class="carousel-item"
                style="background-image:url(https://evoestagios.com.br/img/unidades.jpg); background-position: center; height: 60vh">
                <div class="carousel-caption" style="top: 30%">
                    <h5
                        style='font-size: 3rem; font-weight: 600; margin-bottom: -1px; color: white; text-shadow: 2px 2px 6px #000000;'>
                        Empresas</h5>
                    <!-- For LG displays -->
                    <p class="d-none d-md-block" style='font-size: 1.8rem; color: white; text-shadow: 2px 2px 6px #000000;'>
                        Cadastre-se para contratar <br>os melhores talentos do mercado.</p>
                    <!-- For SM displays -->
                    <p class="d-lg-none" style='font-size: 1.2rem; color: white; text-shadow: 2px 2px 6px #000000;'>
                        Cadastre-se para contratar <br>os melhores talentos do mercado.</p>

                    <p><a href="https://evoestagios.com.br/cadastro-empresa"
                            class="btn btn-marketing rounded-pill btn-danger" role="button" aria-pressed="true"
                            data-aos="fade-up" data-aos-delay="0">Cadastre-se</a></p>
                </div>
            </div>

            <div class="carousel-item"
                style="background-image:url(https://evoestagios.com.br/img/img-seja-franqueado.png); background-position: center; height: 60vh">
                <div class="carousel-caption" style="top: 30%">
                    <h5
                        style='font-size: 3rem; font-weight: 600; margin-bottom: -1px; color: white; text-shadow: 2px 2px 6px #000000;'>
                        Seja um Franqueado</h5>
                    <!-- For LG displays -->
                    <p class="d-none d-md-block" style='font-size: 1.8rem; color: white; text-shadow: 2px 2px 6px #000000;'>
                        Já somos mais de 100 unidades espalhadas pelo <br>Brasil em menos de 1 ano.</p>
                    <!-- For SM displays -->
                    <p class="d-lg-none" style='font-size: 1rem; color: white; text-shadow: 2px 2px 6px #000000;'>Já
                        somos mais de 100 unidades espalhadas pelo <br>Brasil em menos de 1 ano.</p>

                    <p><a href="https://evoestagios.com.br/seja-um-franqueado"
                            class="btn btn-marketing rounded-pill btn-danger" role="button" aria-pressed="true"
                            data-aos="fade-up" data-aos-delay="0">Conheça Agora</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- ************************************************************************************************ -->

    </header>
    <section class="bg-white py-10">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="titulo-home mb-5">O que fazemos?</h2>
            </div>
            <div class="row mb-5">
                <p>Somos uma franquia especializada no processo de recrutamento, seleção e gestão de estagiários. Nosso
                    objetivo é identiﬁcar, selecionar e entregar os melhores candidatos para integração entre empresa e
                    escola.</p>
                <p>Com o uso do melhor sistema de autogestão de estagiários conseguimos desburocratizar todo o processo de
                    contratação, possibilitando o acesso à informação de forma rápida e acessível aos nossos clientes e
                    tendo assertividade na entrega dos candidatos às vagas.</p>
            </div>
            <div class="row text-center">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i
                            class="fas fa-comment-alt"></i></div>
                    <h2>Recrutamento</h2>
                    <p class="text-justify mb-0">Após alinhamento do perﬁl escolhido pela empresa, a vaga será aberta e
                        divulgada nas instituições de ensino conveniadas e nas redes sociais para captação dos melhores
                        candidatos.</p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i
                            class="fas fa-search"></i></div>
                    <h2>Seleção</h2>
                    <p class="text-justify mb-0">Por meio do nosso sistema que contém banco de currículos exclusivo,
                        realizamos todo o processo seletivo com aplicação de entrevistas e testes para entregar candidatos
                        com o perfil exato.</p>
                </div>
                <div class="col-lg-4">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i
                            class="fas fa-chart-pie"></i></div>
                    <h2>Gestão e acompanhamento</h2>
                    <p class="text-justify mb-0">Realizamos todo processo de contratação e gestão dos contratos de estágios
                        e acompanhamos todo o programa de estágio, desde o cálculo de férias, prazos e avaliações
                        semestrais.</p>
                </div>
            </div>
        </div>
        <div class="svg-border-rounded text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
                fill="currentColor">
                <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
            </svg>
        </div>
    </section>
    <section class="bg-dark py-10">
        <div class="container">

            <h2 class="texto_branco text-center titulo-home mb-5">Vagas</h2>

            <div class="row row-card row-cols-1 row-cols-md-3 g-6 my-2">

                <div class="col">
                    <div class="card col-12" style="min-height: 260px;">
                        <div class="card-body py-2">
                            <p class="card-title">Auxiliar de Educa&ccedil;&atilde;o Infantil</p>
                            <p>Passo Fundo - RS</p>
                            <p class="card-body">R$700,00</p>
                            <p scope="row"></p>
                            <p></p>
                        </div>
                        <div class="mb-3">
                            <a href="https://evoestagios.com.br/ver-vaga/4916"><button class="btn btn-sm btn-danger">Veja
                                    mais +</button></a>
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="card col-12" style="min-height: 260px;">
                        <div class="card-body py-2">
                            <p class="card-title"> Est&aacute;gio em auxiliar administrativo</p>
                            <p>Parauapebas - PA</p>
                            <p class="card-body">R$550,00</p>
                            <p scope="row"></p>
                            <p></p>
                        </div>
                        <div class="mb-3">
                            <a href="https://evoestagios.com.br/ver-vaga/4333"><button class="btn btn-sm btn-danger">Veja
                                    mais +</button></a>
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="card col-12" style="min-height: 260px;">
                        <div class="card-body py-2">
                            <p class="card-title">Est&aacute;gio na &Aacute;rea de Marketing</p>
                            <p>Rio de Janeiro - RJ</p>
                            <p class="card-body">R$700,00</p>
                            <p scope="row"></p>
                            <p></p>
                        </div>
                        <div class="mb-3">
                            <a href="https://evoestagios.com.br/ver-vaga/4805"><button class="btn btn-sm btn-danger">Veja
                                    mais +</button></a>
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="card col-12" style="min-height: 260px;">
                        <div class="card-body py-2">
                            <p class="card-title">MONITORA</p>
                            <p>Santo &Acirc;ngelo - RS</p>
                            <p class="card-body">R$560,00</p>
                            <p scope="row"></p>
                            <p></p>
                        </div>
                        <div class="mb-3">
                            <a href="https://evoestagios.com.br/ver-vaga/4400"><button class="btn btn-sm btn-danger">Veja
                                    mais +</button></a>
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="card col-12" style="min-height: 260px;">
                        <div class="card-body py-2">
                            <p class="card-title">VAGA NA &Aacute;REA ADMINISTRATIVA</p>
                            <p>S&atilde;o Jos&eacute; dos PInhais - PR</p>
                            <p class="card-body">R$650,00</p>
                            <p scope="row"></p>
                            <p></p>
                        </div>
                        <div class="mb-3">
                            <a href="https://evoestagios.com.br/ver-vaga/4211"><button class="btn btn-sm btn-danger">Veja
                                    mais +</button></a>
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="card col-12" style="min-height: 260px;">
                        <div class="card-body py-2">
                            <p class="card-title">Est&aacute;gio em Administra&ccedil;&atilde;o</p>
                            <p>Curitiba - PR</p>
                            <p class="card-body">R$600,00</p>
                            <p scope="row"></p>
                            <p></p>
                        </div>
                        <div class="mb-3">
                            <a href="https://evoestagios.com.br/ver-vaga/4372"><button class="btn btn-sm btn-danger">Veja
                                    mais +</button></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12 text-center mt-5">
                <a href="https://evoestagios.com.br/vagas"><button class="btn btn-lg btn-danger">Veja todas as
                        vagas</button></a>
            </div>
        </div>
    </section>
    <section class="bg-img-cover py-10">
        <div class="container position-relative">
            <h3 class="text-center mb-3">NOSSA MISSÃO, VISÃO E VALORES</h3>
            <h5 class="text-center mb-4">“Sonhar grande dá o mesmo trabalho que sonhar pequeno.”</h5>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-12">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <i class="fas fa-clipboard-list "></i>
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Missão</h3>
                    <p class="text-center mb-0">Proporcionar ao jovem a oportunidade de iniciar a carreira proﬁssional.</p>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Visão</h3>
                    <p class="text-center mb-0">Ser referência no mercado como uma empresa que integra e desenvolve os
                        jovens para o mercado de trabalho.</p>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <i class="fas fa-book-open"></i>
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Valores</h3>
                    <p class="text-center mb-0">Ética, Integração, Inovação, Assertividade e Agilidade.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light py-10">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 col-sm-12 text-center titulo-finlandia">
                    ÚLTIMAS DO BLOG
                </div>

                <div class="row row-card col-sm-12 row-cols-2 row-cols-md-3 g-3 my-4">

                    <div class="col-12 mt-3">
                        <div class="card col-12 mb-2"
                            style="height: 200px; width:300px; background-image: url('https://evoestagios.com.br/imagens-blog/30/30-CLASSIFICACAO-DEFINITIVA-EDITAL-4---Vagas-de-estagio-de-Bom-Jesus-dos-Perdoes---SP.png'); background-size: cover">
                        </div>
                        <div class="card col-12" style="min-height: 330px; width:300px;">
                            <div class="card-body py-2">
                                <p class="card-title">CLASSIFICA&Ccedil;&Atilde;O DEFINITIVA EDITAL 4 - Vagas de
                                    est&aacute;gio de Bom Jesus dos Perd&otilde;es - SP</p>
                                <p>Confira:</p>
                                <p scope="row"></p>
                                <p></p>
                            </div>
                            <div class="col-12 mb-3">
                                <a href="https://evoestagios.com.br/ver-conteudo/30"><button
                                        class="btn btn-sm btn-danger col">Veja mais +</button></a>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 mt-3">
                        <div class="card col-12 mb-2"
                            style="height: 200px; width:300px; background-image: url('https://evoestagios.com.br/imagens-blog/29/29-CLASSIFICACAO-PROVISORIA---Vagas-de-estagio-em-Bom-Jesus-dos-Perdoes---SP---EDITAL-4-Abril-2022.png'); background-size: cover">
                        </div>
                        <div class="card col-12" style="min-height: 330px; width:300px;">
                            <div class="card-body py-2">
                                <p class="card-title">CLASSIFICA&Ccedil;&Atilde;O PROVIS&Oacute;RIA - Vagas de
                                    est&aacute;gio em Bom Jesus dos Perd&otilde;es - SP - EDITAL 4 (Abril /2022)</p>
                                <p>Confira.</p>
                                <p scope="row"></p>
                                <p></p>
                            </div>
                            <div class="col-12 mb-3">
                                <a href="https://evoestagios.com.br/ver-conteudo/29"><button
                                        class="btn btn-sm btn-danger col">Veja mais +</button></a>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 mt-3">
                        <div class="card col-12 mb-2"
                            style="height: 200px; width:300px; background-image: url('https://evoestagios.com.br/imagens-blog/28/28-Processo-Seletivo-On-line-Bom-Jesus-dos-Perdoes---SP---EDITAL-4---GABARITO-PROVISORIO-PROCESSO-SELETIVO-ESTAGIARIOS-DE-PEDAGOGIA.png'); background-size: cover">
                        </div>
                        <div class="card col-12" style="min-height: 330px; width:300px;">
                            <div class="card-body py-2">
                                <p class="card-title">Processo Seletivo On-line Bom Jesus dos Perd&otilde;es - SP -
                                    EDITAL 4 - GABARITO PROVIS&Oacute;RIO PROCESSO SELETIVO ESTAGI&Aacute;RIOS DE PEDAGOGIA
                                </p>
                                <p>Confira o resultado:</p>
                                <p scope="row"></p>
                                <p></p>
                            </div>
                            <div class="col-12 mb-3">
                                <a href="https://evoestagios.com.br/ver-conteudo/28"><button
                                        class="btn btn-sm btn-danger col">Veja mais +</button></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 text-center mt-5">
                <a href="https://evoestagios.com.br/blog"><button class="btn btn-lg btn-danger">Veja mais +</button></a>
            </div>
        </div>
    </section>

    <section class="bg-img-cover py-10">
        <div class="container position-relative">
            <h3 class="text-center mb-5 titulo-home">DEPOIMENTOS</h3>

            <div class="row justify-content-center bloco-depoimentos">
                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/paloma.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Paloma Rodrigues</h3>
                    <h3 class="text-center mb-1">Administração</h3>
                    <p class="text-center mb-0">"Eu me senti bem acolhida e a entrevista foi descontraída. Encontrei um
                        estágio muito rápido então meu feedback é bem positivo."</p>
                </div>

                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/ana-julia.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Ana Julia dos Santos</h3>
                    <h3 class="text-center mb-1">Marketing</h3>
                    <p class="text-center mb-0">"Sou muito grata. A EvoEstágios me concedeu a oportunidade de integrar no
                        mercado de trabalho e ainda me receberam de braços abertos."</p>
                </div>

                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/ester-vieira.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Ester Vieira</h3>
                    <h3 class="text-center mb-1">Administração</h3>
                    <p class="text-center mb-0">"A EvoEstágios me proporcionou um novo caminho profissional. Estou muito
                        feliz em ter conhecido essa empresa."</p>
                </div>
            </div>

            <div class="row justify-content-center bloco-depoimentos">
                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/thalita.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Thalita Morais</h3>
                    <h3 class="text-center mb-1">Recursos Humanos</h3>
                    <p class="text-center mb-0">"Tenho certeza que não poderia ter sido melhor. Estou me redescobrindo a
                        cada dia e aprendendo ainda mais. Me sinto muito feliz por todo conhecimento adquirido."</p>
                </div>

                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/paola.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Paola Ramos</h3>
                    <h3 class="text-center mb-1">Administração</h3>
                    <p class="text-center mb-0">"Muito feliz pela EvoEstágios ter me proporcionado uma oportunidade de
                        estágio, mas principalmente pela chance de me desenvolver profissionalmente e pessoalmente."</p>
                </div>

                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/gustavo.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Gustavo Toledo</h3>
                    <h3 class="text-center mb-1">Marketing</h3>
                    <p class="text-center mb-0">"É ótimo fazer parte da EvoEstágios. Estava procurando uma primeira
                        oportunidade de trabalhar com o que eu amo e eles me deram isso. Sou muito grato a toda equipe!"</p>
                </div>
            </div>

            <div class="row justify-content-center bloco-depoimentos">
                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/Carolina.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Carolina da Silva</h3>
                    <h3 class="text-center mb-1">Área Administrativa</h3>
                    <p class="text-center mb-0">"Estou muito sastifeita! É meu primeiro estágio, sou da área
                        administrativa.
                        O processo de seleção que eu passei foi claro e objetivo em relação ao cargo. O horário ideal com a
                        concilação da
                        faculdade, com muito apoio da empresa e da EVO. Gratidão por estar estagiando pela EVO!"</p>
                </div>

                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/Leticia.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Letícia Bachelli</h3>
                    <h3 class="text-center mb-1">Recursos Humanos</h3>
                    <p class="text-center mb-0">"Estagiar pela Evo tem sido uma experiência única. Acredito que uma das
                        melhores
                        formas de desenvolver suas habilidades é colocando em prática o conhecimento adquirido, e nesse
                        caso, nada melhor
                        que um estágio. Além de aprender, o jovem tem a oportunidade de conhecer o ambiente corporativo e se
                        preparar pro
                        mercado de trabalho. Com certeza essa experiência fará toda a diferença na profissional que almejo
                        me tornar no futuro!"</p>
                </div>

                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/Bruna.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Bruna Furtado</h3>
                    <h3 class="text-center mb-1">Telemarketing</h3>
                    <p class="text-center mb-0">"Meu nome é Bruna, trabalho como estagiária em telemarketing e fui
                        contratada
                        através da Evoestágios. Estou tendo uma ótima experiência como estagiária, minha chefe me ajuda e
                        incentiva muito em todo esse processo.
                        Lá eu estou desenvolvendo minhas habilidades no cargo e obtendo novas experiências, acho isso muito
                        importante. A empresa é ótima e tem muitas oportunidades.
                        Acredito que isso vá agregar muito na minha carreira profissional."</p>
                </div>
            </div>

            <div class="row justify-content-center bloco-depoimentos">

                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/Pamela.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Pamela Andrade</h3>
                    <h3 class="text-center mb-1">Relações Públicas</h3>
                    <p class="text-center mb-0">"O estágio me proporciona todos os dias o crescimento e amadurecimento
                        profissional necessário para o
                        mercado de trabalho."</p>
                </div>

                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/Murilo.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Murilo Risso</h3>
                    <h3 class="text-center mb-1">Sistemas da Informação</h3>
                    <p class="text-center mb-0">"O estágio está sendo um bom aprendizado, estou aprendendo muitas coisas
                        que serão muito
                        útil para minha área. Estou gostando muito!"</p>
                </div>

                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/João.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">João Victor Pimentel</h3>
                    <h3 class="text-center mb-1">Ciência da Computação</h3>
                    <p class="text-center mb-0">"O estágio está ajudando a me desenvolver profissionalmente, e me ensinando
                        várias coisas, sobre
                        desenvolvimento de sistemas e o dia a dia de um programador dentro da empresa."</p>
                </div>

            </div>

            <div class="row justify-content-center bloco-depoimentos">

                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/Ana-Carolina.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Ana Carolina</h3>
                    <h3 class="text-center mb-1">Recursos Humanos</h3>
                    <p class="text-center mb-0">"Atualmente estou estagiando através da EvoEstágio, sou muito grata por
                        essa oportunidade,
                        pois através desse estágio estou tendo a chance de conhecer na prática como funciona os processos da
                        área que optei por seguir.
                        Os maiores ensinamentos que eu tenho com essa experiência é ter a certeza que quero seguir essa área
                        e também poder conhecer a sensação
                        de empregar jovens assim como eu.(Alías, que sensação ótima.) Gratidão!"</p>
                </div>


                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/Francine.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Francine Ferreira</h3>
                    <h3 class="text-center mb-1">Telemarketing</h3>
                    <p class="text-center mb-0">"O estágio tá sendo uma experiência totalmente diferente na minha
                        vida,aprendi muita coisa e tô adquirindo cada vez mais
                        experiência, está sendo o ponto de partida pra carreira profissional acredito que daqui pra frente
                        com a experiência do estágio mais portas serão abertas."</p>
                </div>

                <div class="col-lg-4 col-sm-12 mt-4">
                    <div class="text-center mb-4 mvv">
                        <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                            <img src="https://evoestagios.com.br/img/Patrícia.png">
                        </div>
                    </div>
                    <h3 class="text-center mb-1">Patrícia Ribeiro</h3>
                    <h3 class="text-center mb-1">Markerting</h3>
                    <p class="text-center mb-0">"Colocar em prática o que eu aprendo no técnico é bem legal. Sentir na pele
                        os desafios do profissional da área,
                        ver a rotina, aprender com pessoas que já são atuantes é enriquecedor e me faz evoluir todos os
                        dias."</p>
                </div>

            </div>

            <div class="col-12 text-center indicadores-depoimentos">
                <ol>
                    <li class="indicador-dep" data="0"></li>
                    <li class="indicador-dep" data="1"></li>
                    <li class="indicador-dep" data="2"></li>
                    <li class="indicador-dep" data="3"></li>
                    <li class="indicador-dep" data="4"></li>
                </ol>
            </div>

        </div>
    </section>

    <section id="cadastroFranquia" class="bg-img-cover py-5"
        style='background-image: url("https://evoestagios.com.br/img/img-seja-franqueado.jpg"); min-height: 900px'>
        <div class="container position-relative">

            <div class="row justify-content-center" style="position:relative;">
                <div class="col-lg-8 sm-12  my-0 py-0">
                    <h4 class="texto-rodape text-center mb-5">TENHA UMA FRANQUIA EVOESTÁGIOS</h4>
                    <div class="franqueado text-center mb-3">RECEBA AGORA NOSSA APRESENTAÇÃO!</div>
                    <h5 class="text-center"> Receba mais informações no seu e-mail ou whatsapp sobre a franquia
                        EVOESTÁGIOS.</h5>
                    <div class="mt-5" style="position:relative;">
                        <div class="col-lg-10  box-franqueado py-5 mx-auto">
                            <h2>Fale Conosco</h2>

                            <p>Entre em contato com a EvoEstágios
                                utilizando o formulário abaixo.</p>

                            <form id="form1" action="https://evoestagios.com.br/home/ok" method="post">
                                <div class="form-group">
                                    <label for="nome"><strong>Nome</strong></label>
                                    <input type="text" id="nome" name="nomeFranquia" class="form-control"
                                        required="true">
                                </div>

                                <div class="form-group">
                                    <label for="email"><strong>E-mail</strong></label>
                                    <input type="email" id="email" name="email" class="form-control" required="true">
                                </div>

                                <div class="form-group">
                                    <label for="telefone"><strong>Telefone</strong></label>
                                    <input type="text" id="telefone" name="telefone" class="form-control"
                                        required="true">
                                </div>

                                <div class="form-group">
                                    <label for="estado">Estado:</label>

                                    <select class="form-control form-ll" name="estado" id="estado">
                                        <option disabled selected> Selecione o Estado </option>
                                        <option value="1">Acre</option>
                                        <option value="2">Alagoas</option>
                                        <option value="4">Amapá</option>
                                        <option value="3">Amazonas</option>
                                        <option value="5">Bahia</option>
                                        <option value="6">Ceará</option>
                                        <option value="7">Distrito Federal</option>
                                        <option value="8">Espirito Santo</option>
                                        <option value="9">Goiás</option>
                                        <option value="10">Maranhão</option>
                                        <option value="13">Mato Grosso</option>
                                        <option value="12">Mato Grosso do Sul</option>
                                        <option value="11">Minas Gerais</option>
                                        <option value="14">Pará</option>
                                        <option value="15">Paraíba</option>
                                        <option value="18">Paraná</option>
                                        <option value="16">Pernambuco</option>
                                        <option value="17">Piauí</option>
                                        <option value="19">Rio de Janeiro</option>
                                        <option value="20">Rio Grande do Norte</option>
                                        <option value="23">Rio Grande do Sul</option>
                                        <option value="21">Rondônia</option>
                                        <option value="22">Roraima</option>
                                        <option value="24">Santa Catarina</option>
                                        <option value="26">São Paulo</option>
                                        <option value="25">Sergipe</option>
                                        <option value="27">Tocantins</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="cidade">Cidade:</label>

                                    <select class="form-control form-ll" name="cidade" id="cidade" disabled>
                                        <option disabled selected> Para selecionar uma cidade, selecione antes um estado
                                        </option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        <style>
            .swiper-container {
                height: 560px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            :root {
                --swiper-theme-color: #dc3545;
            }

        </style> <!-- Conteudo End -->

        <div class="svg-border-rounded text-black">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
                fill="currentColor">
                <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
            </svg>
        </div>
    </section>
    </main>
@endsection
