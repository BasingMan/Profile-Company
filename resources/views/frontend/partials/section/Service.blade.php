<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-header" style="margin-bottom: 80px">
            <h2>Our Services</h2>
            <p>This is Our Services</p>
        </div>

        <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if ($services->isEmpty())
                <div class="text-center">
                    <h3 class="m-auto">No Service yet</h3>
                </div>
                @else
                    @foreach ($services->chunk(3) as $key => $chunk)
                        <div class="carousel-item @if($key === 0) active @endif">
                            <div class="row gy-5">
                                @foreach ($chunk as $index => $service)
                                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" style="margin-bottom: 50px">
                                        <div class="service-item">
                                            <div class="details position-relative">
                                                <div class="image" style="margin-top: 10px">
                                                    <img src="{{ asset('uploads/ser/' . $service->image_ser) }}" class="d-block w-100"  style="max-height: 200px;" alt="">
                                                </div>
                                                <h3>{{ $service->title }}</h3>
                                                <p>{{ Str::limit($service->text, 70) }}</p>
                                            </div>
                                        </div>
                                    </div><!-- End Service Item -->
                    @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
                
            </div>
            <!-- Carousel controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#serviceCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#serviceCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</section>
