<section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">

        <div class="testimonials-slider swiper">
            <div class="swiper-wrapper">
                @if ($testimonies->isEmpty())
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <h3>Anonymous</h3>
                        <h4>-</h4>
                        <div class="stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star-fill"></i>
                            @endfor
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            No Testimoni Available
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>
            @else

                @foreach ($testimonies as $testimoni)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('uploads/testi/' . $testimoni->image_testi ?? '') }}" class="testimonial-img" alt="">
                            <h3>{{ $testimoni->name }}</h3>
                            <h4>{{ $testimoni->company }}</h4>
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="bi bi-star{{ $testimoni->rating >= $i ? '-fill' : '' }}"></i>
                                @endfor
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                {{ Str::limit($testimoni->testimoni, 35) }}
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->
                @endforeach
            @endif

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Testimonials Section -->
