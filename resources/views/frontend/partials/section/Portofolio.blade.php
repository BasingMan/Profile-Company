<style>
    .image-container {
    display: flex;
    justify-content: center;
}

    .image-container img {
        max-width: 100%;
        height: auto;
}
</style>

<section id="portfolio" class="portfolio" data-aos="fade-up">

    <div class="container">

        <div class="section-header">
            <h2>Portfolio</h2>
            <p>The Profile Company Portfolio</p>
        </div>

    </div>

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
    
            <div class="row g-0 portfolio-container">
                @foreach($portofolios as $portofolio)
                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="image-container">
                            <img src="{{ asset('uploads/porto/' . $portofolio->image) }}" class="img-fluid" alt="">
                        </div>
                        <div class="portfolio-info">
                            <h4>{{ $portofolio->judul }}</h4>
                            <a href="{{ asset('uploads/porto/' . $portofolio->image) }}" title="{{ $portofolio->judul }}" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->
                @endforeach
            </div><!-- End Portfolio Container -->
        </div>
    </div>
    
    
        </div>
    </div>


            </div><!-- End Portfolio Container -->

        </div>

    </div>
</section>