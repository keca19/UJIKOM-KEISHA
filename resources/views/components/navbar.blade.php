<nav class="navbar navbar-expand-lg bg-white sticky-top shadow-sm py-3">
    <div class="container">
        <!-- Logo & Branding -->
        <a class="navbar-brand d-flex align-items-center gap-3" href="{{ url('/') }}">
            <img src="{{ asset('images/logosmkn4.jpg') }}" alt="Logo SMKN 4 Bogor" height="50" onerror="this.src='https://via.placeholder.com/50?text=Logo'">
            <div>
                <h1 class="fw-bold text-navy mb-0 lh-1" style="font-size: 1.35rem; letter-spacing: -0.2px;">SMKN 4 BOGOR</h1>
                <small class="text-navy d-block fw-medium" style="font-size: 0.75rem; margin-top: 4px; opacity: 0.9;">Kreatif, Hebat, dan Bersahabat</small>
            </div>
        </a>

        <!-- Toggle Button untuk Mobile -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#tentang">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#galeri">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#kontak">Kontak</a>
                </li>
            </ul>

            <!-- Tombol Masuk -->
            <div class="d-flex ms-lg-3">
                <a href="{{ url('/login') }}" class="btn btn-navy px-4 py-2 rounded-3 fw-semibold shadow-sm" style="font-size: 0.88rem;">
                    Masuk
                </a>
            </div>
        </div>
    </div>
</nav>