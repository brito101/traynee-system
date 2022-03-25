@extends('site.master.master')

@section('content')
    <main class="introduction-bg">
        <div class="introduction container">
            <div class="introduction-content">
                <h1 class="font-1-xxl color-0 fadeInDown" data-anime="200">Os melhores Estágios<span
                        class="color-p1">.</span></h1>
                <p class="font-2-l color-3 fadeInDown" data-anime="400">
                    Vagas com valor e qualidade para agregar conhecimento e alavacar a sua formação. Explore um mundo de
                    possibilidades na {{ env('APP_NAME') }}.
                </p>
                <a class="button fadeInDown" data-anime="600" href=".vaga">
                    Escolha a sua vaga</a>
            </div>
            <picture data-anime="800" class="fadeInDown">
                <img src="{{ asset('site/img/fotos/introduction.jpg') }}" width="1280" height="1600"
                    alt="Sucesso em seu estágio">
            </picture>
        </div>
    </main>

    <article class="vacancies-list">
        <h2 class="container font-1-xxl">escolha a sua<span class="color-p1">.</span></h2>

        <ul>
            @foreach ($vacancies as $vacancy)
                <li>
                    <a href="{{ $vacancy->slug }}">
                        @if ($vacancy->brand_facebook)
                            <img src="{{ url('storage/vacancies/' . $vacancy->brand_facebook) }}"
                                alt="{{ $vacancy->title }}" width="920" height="1040">
                        @else
                            <img src="{{ asset('/site/img/fotos/vacancy-' . $loop->index . '.jpg') }}"
                                alt="{{ $vacancy->title }}" width="920" height="1040">
                        @endif
                        <h3 class="font-1-xl">{{ $vacancy->title }}</h3>
                        <span class="font-2-m color-12">{{ $vacancy->city }}-{{ $vacancy->state }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </article>

    <article class="tecnologia-bg">
        <div class="tecnologia container">
            <div class="tecnologia-content">
                <span class="font-2-l-b color-5">Tecnologia Avançada</span>
                <h2 class="font-1-xxl color-0">você escolhe as suas cores e componentes<span class="color-p1">.</span>
                </h2>
                <p class="font-2-l color-5">Cada Bikcraft é única e possui a sua identidade. As medidas serão exatas para o
                    seu corpo e altura, garantindo maior conforto e ergonomia na sua pedalada. Você pode também personalizar
                    completamente as suas cores.</p>
                <a class="link" href="./bicicletas.html">Escolha um modelo</a>
                <div class="tecnologia-vantagens">
                    <div>
                        <img src="./img/icones/eletrica.svg" width="24" height="24" alt="">
                        <h3 class="font-1-m color-0">Motor Elétrico</h3>
                        <p class="font-2-s color-5">Toda Bikcraft é equipada com um motor elétrico que possui duração de até
                            120h. A bateria é recarregada com a sua energia gasta ao pedalar.</p>
                    </div>
                    <div>
                        <img src="./img/icones/rastreador.svg" width="24" height="24" alt="">
                        <h3 class="font-1-m color-0">Rastreador</h3>
                        <p class="font-2-s color-5">Sabemos o quão preciosa é a sua Bikcraft, por isso adicionamos
                            rastreadores e sistemas anti-furto para garantir o seu sossego.</p>
                    </div>
                </div>
            </div>
            <div class="tecnologia-imagem">
                <img src="./img/fotos/tecnologia.jpg" width="1200" height="1920" alt="">
            </div>
        </div>
    </article>

    <section class="parceiros" aria-label="Nossos Parceiros">
        <h2 class="container font-1-xxl">nossos parceiros<span class="color-p1">.</span></h2>

        <ul>
            <li><img src="./img/parceiros/caravan.svg" alt="Caravan" width="140" height="38"></li>
            <li><img src="./img/parceiros/ranek.svg" alt="Ranek" width="149" height="36"></li>
            <li><img src="./img/parceiros/handel.svg" alt="Handel" width="140" height="50"></li>
            <li><img src="./img/parceiros/dogs.svg" alt="Dogs" width="152" height="39"></li>
            <li><img src="./img/parceiros/lescone.svg" alt="LeScone" width="208" height="41"></li>
            <li><img src="./img/parceiros/flexblog.svg" alt="FlexBlog" width="165" height="38"></li>
            <li><img src="./img/parceiros/wildbeast.svg" alt="Wildbeast" width="196" height="34"></li>
            <li><img src="./img/parceiros/surfbot.svg" alt="Surfbot" width="200" height="49"></li>
        </ul>
    </section>

    <section class="depoimento" aria-label="Depoimento">
        <div>
            <img src="./img/fotos/depoimento.jpg" width="1560" height="1360" alt="Pessoa pedalando uma bicicleta Bikcraft">
        </div>
        <div class="depoimento-conteudo">
            <blockquote class="font-1-xl color-p5">
                <p>Pedalar sempre foi a minha paixão, o que o pessoal da Bikcraft fez foi intensificar o meu amor por esta
                    atividade. Recomendo à todos que amo.</p>
            </blockquote>
            <span class="font-1-m-b color-p4">Ana Júlia</span>
        </div>
    </section>

    <article class="seguros-bg">
        <div class="seguros container">
            <h2 class="font-1-xxl color-0">seguros<span class="color-p1">.</span></h2>
            <div class="seguros-item">
                <h3 class="font-1-xl color-6">PRATA</h3>
                <span class="font-1-xl color-0">R$ 199 <span class="font-1-xs color-6">mensal</span></span>
                <ul class="font-2-m color-0">
                    <li>Duas trocas por ano</li>
                    <li>Assistência técnica</li>
                    <li>Suporte 08h às 18h</li>
                    <li>Cobertura estadual</li>
                </ul>
                <a class="botao secundario" href="./orcamento.html?tipo=seguro&produto=prata">Inscreva-se</a>
            </div>

            <div class="seguros-item">
                <h3 class="font-1-xl color-p1">OURO</h3>
                <span class="font-1-xl color-0">R$ 299 <span class="font-1-xs color-6">mensal</span></span>
                <ul class="font-2-m color-0">
                    <li>Cinco trocas por ano</li>
                    <li>Assistência especial</li>
                    <li>Suporte 24h</li>
                    <li>Cobertura nacional</li>
                    <li>Desconto em parceiros</li>
                    <li>Acesso ao Clube Bikcraft</li>
                </ul>
                <a class="botao" href="./orcamento.html?tipo=seguro&produto=ouro">Inscreva-se</a>
            </div>
        </div>
    </article>
@endsection
