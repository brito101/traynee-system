@extends('site.master.master')

@section('content')
    <main class="title-bg">
        <div>
            <div class="title container">
                <p class="font-2-xl color-p5">{{ $vacancy->courses() }}</p>
                <h1 class="font-1-xxl color-0">{{ $vacancy->title }}<span class="color-p1">.</span></h1>
            </div>
        </div>
        <div class="vacancies container">
            <div class="vacancies-image">
                @if ($vacancy->brand_facebook != null)
                    <img src="{{ url('storage/vacancies/' . $vacancy->brand_facebook) }}" alt="{{ $vacancy->title }}"
                        width="920" height="1040">
                @elseif ($vacancy->brand_instagram != null)
                    <img src="{{ url('storage/vacancies/' . $vacancy->brand_instagram) }}" alt="{{ $vacancy->title }}"
                        width="920" height="1040">
                @elseif ($vacancy->brand_twitter != null)
                    <img src="{{ url('storage/vacancies/' . $vacancy->brand_twitter) }}" alt="{{ $vacancy->title }}"
                        width="920" height="1040">
                @else
                    <img src="{{ asset('/site/img/fotos/vacancy-0.webp') }}" alt="{{ $vacancy->title }}" width="920"
                        height="1040">
                @endif
            </div>
            <div class="vacancies-content">
                <p class="font-2-l color-0 description">{{ $vacancy->description }}</p>
                <div>
                    <a class="button" href="{{ route('admin.home') }}">Inscreva-se!</a>
                </div>

                <h3 class="font-2-xs color-0 details">Informações:</h3>
                <ul class="font-2-s color-0 info">
                    <li>Escolaridade: {{ $vacancy->scholarity['name'] }}</li>
                    @if ($vacancy->experience)
                        <li>Experiência: {{ $vacancy->experience }}</li>
                    @endif
                    @if ($vacancy->benefits)
                        <li>Benefícios: {{ $vacancy->benefits }}</li>
                    @endif
                    @if ($vacancy->requirements)
                        <li>Requisitos: {{ $vacancy->requirements }}</li>
                    @endif
                    <li>Localização: {{ $vacancy->city }}-{{ $vacancy->state }}</li>
            </div>
        </div>
    </main>

    <article class="signup-bg">
        <div class="post container">
            <div>
                <img src="{{ asset('/site/img/fotos/signup.webp') }}" alt="Realize sua inscrição" width="500"
                    height="700">
            </div>
            <div class="post-content">
                <h2 class="font-1-xxl">Ainda não possui sua <span class="color-p7">conta?</span>
                </h2>
                <p class="font-2-l">Inscreva-se na {{ env('APP_NAME') }} e concorra às melhores vagas do
                    mercado.
                </p>
                <a class="button" href="{{ route('register') }}">Cadastre-se agora!</a>
            </div>
        </div>
    </article>
@endsection
