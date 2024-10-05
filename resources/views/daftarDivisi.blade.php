<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>IP3A</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    @include('style.main')
    <!-- Favicons -->
    <link href="{{ asset('QuickStart/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('QuickStart/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('QuickStart/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('QuickStart/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('QuickStart/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('QuickStart/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('QuickStart/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('QuickStart/assets/css/main.css') }}" rel="stylesheet">
    <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    @include('operasi.navbar')

    <main class="main">

        <!-- Featured Services Section -->
        <section id="hero" class="hero section light-background justify-content-center">
            <div id="featured-services" class="featured-services section">
        
                <div class="hero-bg">
                    <img src="{{ asset('QuickStart/assets/img/hero-bg-light.webp') }}" alt="">
                </div>
        
                <div class="container d-flex flex-column flex-md-column flex-lg-row justify-content-center align-items-center">
                    
                    <div class="col-lg-4 text-center align-content-center order-0">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <h1 data-aos="fade-up">Daftar <span>Divisi</span></h1>
                        </div>
                    </div>
        
                    <div class="col-lg-8 container order-1">
                        <div class="row gy-6">
                            @foreach ($divisi as $index => $data)
                                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                                    <div class="service-item d-flex">
                                        <div class="icon flex-shrink-0">
                                            <img src="{{ asset('storage/' . $data->foto) }}" alt="" class="img-fluid">
                                        </div>
                                        <div>
                                            <h4 class="title">
                                                <a href="{{ route('divisi.detail', $data->id) }}" class="stretched-link">{{ $data->nama_divisi }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
        
                </div>
            </div>
        </section>
        <!-- /Featured Services Section -->

    </main>

    @include('operasi.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('QuickStart/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('QuickStart/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('QuickStart/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('QuickStart/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('QuickStart/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('QuickStart/assets/js/main.js') }}"></script>


</body>

</html>
