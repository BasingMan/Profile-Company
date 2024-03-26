<section id="recent-blog-posts" class="recent-blog-posts">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Recent Blog</h2>
            <p>Recent posts from our Blog</p>
        </div>

        <div class="row">
        @if ($articles->isEmpty())
        <div class="text-center">
            <h3 class="m-auto">No Recent Post yet</h3>
        </div>
        @else
            @foreach ($articles as $article)
                    
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="post-box">
                        <div class="post-img"><img src="{{ asset('uploads/art/' . $article->image_art ?? 'No Image Available') }}" class="img-fluid"
                                alt=""></div>
                        <div class="meta">
                            <span class="post-date">{{ $article->tgl }}</span>
                        </div>
                        <h3 class="post-title">{{ $article->header }}</h3>
                        <p>{{ $article->text_prev }}</p>
                        <a href="{{ route('frontend.blog.details', ['id' => $article->id]) }}" class="readmore stretched-link"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

            @endforeach
        @endif
        
            
        </div>

    </div>

</section>