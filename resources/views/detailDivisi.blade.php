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

        <!-- Hero Section -->
        {{-- <section id="hero" class="hero section">
            <div class="hero-bg">
                <img src="{{ asset('QuickStart/assets/img/hero-bg-light.webp') }}" alt="">
            </div>
            <div class="container text-center">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h1 data-aos="fade-up">Slogan <span>Angkatan</span></h1>
                    <p data-aos="fade-up" data-aos-delay="100">Osis IP3A Masa Khidmat 2024 - 2025<br></p>
                    <img src="{{ asset('img/Osis IP3A Gede.png') }}" class="img-fluid hero-img" alt=""
                        data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>
        </section> --}}
        <!-- /Hero Section -->

        <!-- Features Section -->
        <section id="hero" class="hero section">
            <div class="hero-bg">
                <img src="{{ asset('QuickStart/assets/img/hero-bg-light.webp') }}" alt="">
            </div>
            <div class="container text-center">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-5 d-flex align-items-center">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <h1 data-aos="fade-up">{{ $divisi->nama_divisi }}</h1>
                                <img src="{{ asset('storage/' . $divisi->foto) }}" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
                            </div>
                        </div>
        
                        <div class="col-lg-6">
                            <!-- Search Input -->
                            <div class="mb-3">
                                <input type="text" id="searchSiswa" class="form-control" placeholder="Cari nama siswa..." onkeyup="filterSiswa()">
                            </div>
                            <!-- List of students (tab navigation) -->
                            <ul class="nav nav-tabs" id="siswaList" data-aos="fade-up" data-aos-delay="100">
                                @foreach ($siswa as $data)
                                    <li class="nav-item">
                                        <a class="nav-link siswa-item" href="#" data-bs-toggle="modal" 
                                            data-bs-target="#siswaModal" 
                                            data-id="{{ $data->id }}" 
                                            data-foto="{{ asset('storage/' . $data->foto) }}" 
                                            data-nama="{{ $data->nama_lengkap }}" 
                                            data-gender="{{ $data->gender }}" 
                                            data-kelas="{{ $data->kelas }}" 
                                            data-konsulat="{{ $data->konsulat }}" 
                                            data-divisi="{{ implode(', ', $data->divisi->pluck('nama_divisi')->toArray()) }}"
                                            data-foto-divisi="{{ json_encode($data->divisi->pluck('foto')->toArray()) }}"
                                            data-nama-divisi="{{ json_encode($data->divisi->pluck('nama_divisi')->toArray()) }}">
                                            <i class="bi bi-person"></i>
                                            <div>
                                                <h4 class="d-none d-lg-block">{{ $data->nama_lengkap }}</h4>
                                                <p>{{ $data->kelas }}</p>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul><!-- End Tab Nav -->
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Modal Structure -->
            <div class="modal fade" id="siswaModal" tabindex="-1" aria-labelledby="siswaModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="siswaModalLabel">Detail Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <img id="siswaFoto" src="" alt="Foto Siswa" class="img-fluid mb-3" style="max-width: 150px; border-radius: 50%;">
                            </div>
                            <h4 id="siswaNama"></h4>
                            <p><strong>Gender:</strong> <span id="siswaGender"></span></p>
                            <p><strong>Kelas:</strong> <span id="siswaKelas"></span></p>
                            <p><strong>Konsulat:</strong> <span id="siswaKonsulat"></span></p>
                            <p><strong>Divisi:</strong> <span id="siswaDivisi"></span></p>
        
                            <!-- Section for displaying division images -->
                            <div id="divisiFotoContainer" class="mt-4">
                                <h5>Foto Divisi yang Dipilih:</h5>
                                <div id="divisiFotos" class="d-flex flex-wrap justify-content-center"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- JavaScript to handle dynamic modal content and search -->
            <script>
                var siswaModal = document.getElementById('siswaModal');
                siswaModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var siswaFoto = button.getAttribute('data-foto');
                    var siswaNama = button.getAttribute('data-nama');
                    var siswaGender = button.getAttribute('data-gender');
                    var siswaKelas = button.getAttribute('data-kelas');
                    var siswaKonsulat = button.getAttribute('data-konsulat');
                    var siswaDivisi = button.getAttribute('data-divisi') || 'Tidak ada divisi yang dipilih';
        
                    var divisiFotos = JSON.parse(button.getAttribute('data-foto-divisi'));
                    var divisiNames = JSON.parse(button.getAttribute('data-nama-divisi'));
        
                    var modalBodyFoto = siswaModal.querySelector('#siswaFoto');
                    var modalBodyNama = siswaModal.querySelector('#siswaNama');
                    var modalBodyGender = siswaModal.querySelector('#siswaGender');
                    var modalBodyKelas = siswaModal.querySelector('#siswaKelas');
                    var modalBodyKonsulat = siswaModal.querySelector('#siswaKonsulat');
                    var modalBodyDivisi = siswaModal.querySelector('#siswaDivisi');
                    var divisiFotoContainer = siswaModal.querySelector('#divisiFotos');
        
                    modalBodyFoto.src = siswaFoto;
                    modalBodyNama.textContent = siswaNama;
                    modalBodyGender.textContent = siswaGender;
                    modalBodyKelas.textContent = siswaKelas;
                    modalBodyKonsulat.textContent = siswaKonsulat;
                    modalBodyDivisi.textContent = siswaDivisi;
        
                    divisiFotoContainer.innerHTML = '';
                    divisiFotos.forEach(function(foto, index) {
                        var divisiDiv = document.createElement('div');
                        divisiDiv.className = 'divisi-container position-relative m-2';
        
                        var img = document.createElement('img');
                        img.src = '/storage/' + foto;
                        img.className = 'img-fluid';
                        img.style.aspectRatio = '1 / 1';
                        img.style.maxWidth = '100px';
                        img.style.objectFit = 'cover';
        
                        var divisiOverlay = document.createElement('div');
                        divisiOverlay.className = 'divisi-overlay position-absolute w-100 h-100 d-flex justify-content-center align-items-center';
                        divisiOverlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
                        divisiOverlay.style.color = '#fff';
                        divisiOverlay.style.opacity = '0';
                        divisiOverlay.style.transition = 'opacity 0.3s';
                        divisiOverlay.textContent = divisiNames[index];
        
                        divisiDiv.appendChild(img);
                        divisiDiv.appendChild(divisiOverlay);
                        divisiFotoContainer.appendChild(divisiDiv);
        
                        divisiDiv.addEventListener('mouseenter', function() {
                            divisiOverlay.style.opacity = '1';
                        });
                        divisiDiv.addEventListener('mouseleave', function() {
                            divisiOverlay.style.opacity = '0';
                        });
                    });
                });
        
                function filterSiswa() {
                    var input = document.getElementById('searchSiswa');
                    var filter = input.value.toLowerCase();
                    var siswaList = document.getElementById('siswaList');
                    var siswaItems = siswaList.getElementsByClassName('siswa-item');
        
                    for (var i = 0; i < siswaItems.length; i++) {
                        var siswaNama = siswaItems[i].querySelector('h4').textContent.toLowerCase();
                        if (siswaNama.includes(filter)) {
                            siswaItems[i].style.display = ""; // Show
                        } else {
                            siswaItems[i].style.display = "none"; // Hide
                        }
                    }
                }
            </script>
        </section>
        
        <!-- CSS Styles for Hover Effect and Fixed Ratio -->
        <style>
            .divisi-container {
                position: relative;
                overflow: hidden;
                width: 100px;
                height: 100px;
            }
        
            .divisi-overlay {
                top: 0;
                left: 0;
            }
        </style>
        
        
        <!-- CSS Styles for Hover Effect and Fixed Ratio -->
        <style>
            .divisi-container {
                position: relative;
                overflow: hidden;
                width: 100px;
                height: 100px;
            }
        
            .divisi-overlay {
                top: 0;
                left: 0;
            }
        </style>
        
        
        
        
        

        <!-- /Features Section -->

    </main>

    <footer id="footer" class="footer position-relative light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">QuickStart</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                    <form action="forms/newsletter.php" method="post" class="php-email-form">
                        <div class="newsletter-form"><input type="email" name="email"><input type="submit"
                                value="Subscribe"></div>
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                    </form>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">QuickStart</strong><span>All Rights
                    Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

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
