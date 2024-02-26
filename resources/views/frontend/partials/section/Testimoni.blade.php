<section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">

        <div class="testimonials-slider swiper">
            <div class="swiper-wrapper">

                @foreach ($testimonies as $testimoni)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>{{ $testimoni->name }}</h3>
                            <h4>{{ $testimoni->company }}</h4>
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="bi bi-star{{ $testimoni->rating >= $i ? '-fill' : '' }}"></i>
                                @endfor
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                {{ $testimoni->testimoni }}
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Testimonials Section -->
