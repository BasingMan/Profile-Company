<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $parameter['website_name'] }}</title>
    <meta content="description" name="{{ $parameter['website_name'] }} adalah perusahaan startup, melayani apa yang dibutuhkan oleh client kita">
    <meta content="keywords" name="Triwikrama, Startup, Vendor Aplikasi, Lowongan Kerja, Vendor">

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

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
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

  <style>
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

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            {{-- @dd($logos->logo_image) --}}
            <a href="#" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                @if ($logos)
                    <img src="{{ asset('uploads/logo/' . $logos->logo_image) }}" alt="Logo" class="logo-img">
                @else
                    <h1 class="logo-text">{{ $parameter['website_name'] }}<span>.</span></h1>
                @endif
            </a>

            @include('frontend.partials.navbar')
            {{-- <a class="btn-getstarted scrollto hidden" href="index.html#about">Get Started</a> --}}

        </div>
    </header><!-- End Header -->

    <!-- ======= Banner Section ======= -->
    @include('frontend.partials.section.Banner')
    <!-- End Banner Section -->

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        {{-- @include('frontend.partials.section.FeaturedService') --}}
        <!-- End Featured Services Section -->

        <!-- ======= About Section ======= -->
        @include('frontend.partials.section.AboutUs')
        <!-- End About Section -->

        <!-- ======= Clients Section ======= -->
        {{-- @include('frontend.partials.section.Client') --}}
        <!-- End Clients Section -->

        <!-- ======= Call To Action Section ======= -->
        {{-- @include('frontend.partials.section.CallToAction') --}}
        <!-- End Call To Action Section -->

        <!-- ======= On Focus Section ======= -->
        {{-- @include('frontend.partials.section.OnFocus') --}}
        <!-- End On Focus Section -->

        <!-- ======= Features Section ======= -->
        {{-- @include('frontend.partials.section.Features') --}}
        <!-- End Features Section -->

        <!-- ======= Services Section ======= -->
        @include('frontend.partials.section.Service')
        <!-- End Services Section -->

        <!-- ======= Testimonials Section ======= -->
        @include('frontend.partials.section.Testimoni')
        <!-- End Testimonials Section -->

        <!-- ======= F.A.Q Section ======= -->
        {{-- @include('frontend.partials.section.faq') --}}
        <!-- End F.A.Q Section -->

        <!-- ======= Portfolio Section ======= -->
        @include('frontend.partials.section.Portofolio')
        <!-- End Portfolio Section -->

        <!-- ======= Team Section ======= -->
        {{-- @include('frontend.partials.section.Team') --}}
        <!-- End Team Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        @include('frontend.partials.section.Blog')
        <!-- End Recent Blog Posts Section -->

        <!-- ======= Contact Section ======= -->
        @include('frontend.partials.section.Contact')
        <!-- End Contact Section -->

    </main><!-- End #main -->

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

                    <div class="col-lg-2 col-md-6 footer-links" style="margin-left: 50%">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#about">About us</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#services">Services</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#portfolio">Portfolio</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#contact">Contact Us</a></li>
                        </ul>
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

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script> --}}
    {{-- <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script> --}}

    <!-- Template Main JS File -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>
