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

                    @foreach ($menuItens as $item)
                        @php
                            $dropdown = isset($item['dropdown']);
                        @endphp
                        <li class="nav-item {{ $dropdown ? 'dropdown' : '' }} {{ $item['class'] }}">
                            <a class="{{ $dropdown ? 'dropdown-toggle' : '' }} {{ $item['classLink'] }}"
                                {{ $dropdown ? 'id=navbarScrollingDropdown' . $loop->index . ' role=button data-bs-toggle=dropdown aria-expanded=false' : '' }}
                                href="{{ $item['url'] }}">{{ $item['name'] }}</a>
                            @if ($dropdown)
                                <ul class="dropdown-menu"
                                    aria-labelledby="navbarScrollingDropdown{{ $loop->index }}">
                                    @foreach ($item['dropdown'] as $drop)
                                        <li><a class="dropdown-item"
                                                href="{{ $drop['url'] }}">{{ $drop['name'] }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </nav>
</header>
