<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        @foreach ($carouselItens as $item)
            <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                <img src="{{ asset($item['img']) }}" class="d-block w-100 app-banner-img" alt="..." style="">
                <div class="carousel-caption">
                    <h3 class="text-white h1 fw-bold app-text-shadow">{{ $item['title'] }}</h3>
                    <p class="fw-bolder h6">{{ $item['text'] }}</p>
                    <a href="{{ $item['callToAction']['url'] }}"
                        class="btn btn-danger btn-lg mt-2">{{ $item['callToAction']['text'] }}</a>
                </div>
            </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
