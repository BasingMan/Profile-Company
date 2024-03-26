<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>{{ $articles->header }}</title>

    {{-- Dinamis meta tags for SEO --}}
    @if(isset($artikel))
    <?php
    $description = substr(strip_tags($artikel->header), 0, 160);
    $keywords = implode(', ', array_slice(array_unique(str_word_count($artikel->header, 1)), 0, 5));
    ?>

    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="{{ $keywords }}">

    @endif


    <!-- Favicons -->
    <link href="{{ asset('frontend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/assets/css/variables.css') }}" rel="stylesheet">
    <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: HeroBiz
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
          @if ($logos)
              <img src="{{ asset('uploads/logo/' . $logos->logo_image) }}" alt="Logo" class="logo-img">
          @else
              <h1 class="logo-text">{{ $parameter['website_name'] }}<span>.</span></h1>
          @endif
        </a>

        <nav id="navbar" class="navbar">
            <ul>
        
                <li><a class="nav-link scrollto" href="{{ route('frontend.index') }}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{ route('frontend.index') }}">About</a></li>
                <li><a class="nav-link scrollto" href="{{ route('frontend.index') }}">Services</a></li>
                <li><a class="nav-link scrollto" href="{{ route('frontend.index') }}">Portfolio</a></li>
                <li><a href="{{ route('frontend.blog') }}" class="active">Blog</a></li>
                <li><a class="nav-link scrollto" href="{{ route('frontend.index') }}">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->


<section id="blog" class="blog" style="margin-top: 40px">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                <img src="{{ asset('uploads/art/' . $articles['image_art'] ?? 'No Image Available') }}" alt="" class="img-fluid">
              </div>

              <h2 class="title">{{ $articles['header'] }}</h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="{{ $articles['tgl'] }}">{{ $articles['tgl'] }}</time></a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <p>{!! $articles['article']!!}</p>
              </div><!-- End post content -->

            </article><!-- End blog post -->

            </div><!-- End Blog Sidebar -->
            <div class="col-lg-4">

              <div class="sidebar">
                <h3 class="sidebar-title">Recent Posts</h3>
                @foreach ($recentArticles as $recentArticle)
                    <div class="sidebar-item recent-posts">
                        <div class="mt-3">
                            <div class="post-item mt-3">
                              <a href="{{ route('frontend.blog.details', ['id' => $recentArticle->id]) }}" class="post-item mt-2">
                                <img src="{{ asset('uploads/art/' . $recentArticle->image_art ?? 'No Image Available') }}" alt="" class="flex-shrink-0">
                                <div>
                                    <h4>{{ $recentArticle->header }}</h4>
                                    <time datetime="{{ $recentArticle->tgl }}">{{ $recentArticle->tgl }}</time>
                                </div>
                            </div><!-- End recent post item-->
                        </div>
                    </div>
                @endforeach
            </div>
            
            

              </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  
  <div id="preloader"></div>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>{{ $parameter['website_name'] }}</h3>
                        <p>
                            {{ $parameter['address'] }}
                            <br>
                            <strong>Phone:</strong> {{ $parameter['phone'] }}<br>
                            <strong>Email:</strong> {{ $parameter['email'] }}<br>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-legal text-center">
        <div
            class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

            <div class="d-flex flex-column align-items-center align-items-lg-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>{{ $parameter['website_name'] }}</span></strong>. All Rights
                    Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">{{ $parameter['website_name'] }}</a>
                </div>
            </div>

            <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
              <a href="https://www.twitter.com/{{ $parameter['twitter'] }}" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://www.facebook.com/{{ $parameter['facebook'] }}" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/{{ $parameter['instagram'] }}" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="https://www.skype.com/{{ $parameter['skype'] }}" class="google-plus"><i class="bi bi-skype"></i></a>
              <a href="https://id.linkedin.com/{{ $parameter['linkedin'] }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>

        </div>
    </div>

</footer><!-- End Footer -->
  
  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>
  
  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
  
  </body>
  
  </html>