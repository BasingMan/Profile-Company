<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Welcome to Our Blog</title>

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
    <style>
        .posts-list .col-lg-6 {
            margin-top: 50px; 
        }


    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
    }
    .pagination li {
        margin: 0 5px;
    }
    .pagination li a {
        color: #333;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .pagination li a:hover {
        background-color: #f0f0f0;
    }
    .pagination .active a {
        background-color: #007bff;
        color: #fff;
    }
    .logo {
    text-decoration: none;
    color: #000;
    display: flex;
    align-items: center;
    }

    .logo-img {
        width: 50px;
        height: 100px; 
        border-radius: 50%; 
        margin-right: 10px; 
    }

    .logo-text {
        font-size: 24px; 
        font-weight: bold;
    }

    </style>

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
   
    

    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-8">
                    {{-- Display Articles --}}
                    <div class="row gy-4 posts-list">
                            @if ($articles->isEmpty())
                                <div class="alert alert-info" role="alert" style="margin-top: 100px">
                                    <h2>No matching articles found. Please try a different search term.</h2>
                                </div>
                            @else
                                @foreach ($articles as $article)
                                    <div class="col-lg-6">
                                        <article class="d-flex flex-column">
                                            <div class="post-img">
                                                <img src="{{ asset('upload/art/' . $article->image_art ?? 'No Image Available') }}" alt="" class="img-fluid">
                                            </div>
                                            <h2 class="title">{{ $article->header }}</h2>
                                            <div class="meta-top">
                                                <ul>
                                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="{{ $article->tgl }}">{{ $article->tgl }}</time></li>
                                                </ul>
                                            </div>
                                            <div class="content">
                                                <p>{{ $article->text_prev }}</p>
                                            </div>
                                            <div class="read-more mt-auto align-self-end">
                                                <a href="{{ route('frontend.blog.details', ['id' => $article->id]) }}">Read More</a>
                                            </div>
                                        </article>
                                    </div><!-- End post list item -->
                                @endforeach
                            @endif
                        </div>
                    {{-- End Display Articles --}}
                    <div class="pagination justify-content-center mt-5" >
                        {{ $articles->links('pagination::bootstrap-4') }}
                    </div>
                    
                </div>
    
                {{-- Sidebar --}}
                <div class="col-lg-4">
                    <div class="sidebar" style="margin-top: 30px">
                        <div class="search-form">
                            <form action="{{ route('frontend.blog') }}" method="GET" class="mt-3">
                                <input type="text" name="query" placeholder="Search title/text on article..." value="{{ $query ?? '' }}">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End Sidebar --}}
            </div>
        </div>
    </section><!-- End Blog Section -->
    
    
    

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