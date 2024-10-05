<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('/') }}" class="logo d-flex align-items-center me-auto">
            <img src="{{ asset('img/Osis IP3A Gede.png') }}" alt="">
            <h1 class="sitename">IP3A</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('/') }}">Home</a></li>
                <li></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('divisi.daftar') }}">Divisi</a>

    </div>
</header>