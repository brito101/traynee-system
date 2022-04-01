@extends('site.master.master')

@section('content')
    <main>
        <div class="vacancies-bg-header">
            <div class="vacancies container">
                <p class="font-2-l-b color-2">Escolha a melhor para você</p>
                <h1 class="font-1-xxl color-0">Nossas vagas<span class="color-p1">.</span></h1>
            </div>
        </div>

        @foreach ($vacancies as $vacancy)
            @if ($loop->iteration % 2 == 0)
                <div class="vacancies-bg">
            @endif
            <div class="vacancies container">
                <div class="vacancies-image">
                    @if ($vacancy->brand_facebook != null)
                        <img src="{{ url('storage/vacancies/' . $vacancy->brand_facebook) }}"
                            alt="{{ $vacancy->title }}" width="920" height="1040">
                    @elseif ($vacancy->brand_instagram != null)
                        <img src="{{ url('storage/vacancies/' . $vacancy->brand_instagram) }}"
                            alt="{{ $vacancy->title }}" width="920" height="1040">
                    @elseif ($vacancy->brand_twitter != null)
                        <img src="{{ url('storage/vacancies/' . $vacancy->brand_twitter) }}" alt="{{ $vacancy->title }}"
                            width="920" height="1040">
                    @else
                        <img src="{{ asset('/site/img/fotos/vacancy-0.webp') }}" alt="{{ $vacancy->title }}" width="920"
                            height="1040">
                    @endif
                </div>
                <div class="vacancies-content">
                    <h2 class="font-1-xl">{{ $vacancy->title }}</h2>
                    <p class="font-2-s {{ $loop->iteration % 2 == 0 ? 'color-0' : 'color-12' }}">Para os seguintes cursos:
                        <strong>{{ $vacancy->courses() }}</strong>
                    </p>

                    <ul class="font-1-m {{ $loop->iteration % 2 == 0 ? 'color-1' : 'color-11' }} ">
                        <li>
                            Cidade: {{ $vacancy->city }}-{{ $vacancy->state }}
                        </li>
                        <li>
                            Período: {{ $vacancy->period }}
                        </li>
                    </ul>
                    <a class="button arrow" href="#">Mais Sobre</a>
                </div>
            </div>
            @if ($loop->iteration % 2 == 0)
                </div>
            @endif
        @endforeach
        <div class="pagination">
            {{ $vacancies->links() }}
        </div>

    </main>
@endsection
