@props(['carousels' => []])
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @for ($i = 0; $i < count($carousels); $i++)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}"
                @if ($i == 0) class="active" aria-current="true" @endif
                aria-label="Slide {{ $i + 1 }}"></button>
        @endfor

    </div>

    <div class="carousel-inner">
        @forelse ($carousels as $carousel)
            <div class="carousel-item @if ($loop->first) active @endif">
                <img class="d-block w-100" src="{{ asset('storage/carousels/' . $carousel->image) }}" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $carousel->name }} </h5>
                    <p>{{ $carousel->description }}</p>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        @empty
            <h1>No Carousel Found</h1>
        @endforelse
    </div>

</div>
