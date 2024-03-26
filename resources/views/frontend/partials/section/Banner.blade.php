<section style="margin-top: 30px">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if ($sliders->isEmpty())
            <div class="carousel-item active">
                <div class="text-center" style="margin-top: 80px">
                    <h3 class="mx-auto mt-16">No Banners yet</h3>
                </div>
            </div>
            @else
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <a href="{{ $slider->link }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('uploads/slider/' . $slider->gambar) }}" class="d-block w-100" style="max-height: 600px;" alt="">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slider->title }}</h5>
                        <p>{{ $slider->subtitle }}</p>
                    </div>
                </div>
            @endforeach
        @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
