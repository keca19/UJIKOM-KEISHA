@extends('layouts.main')

@section('content')

    <!-- Section Hero (Fullscreen & Responsive) -->
    <section id="beranda" class="position-relative text-white d-flex align-items-center text-start"
        style="background: linear-gradient(rgba(15, 45, 82, 0.75), rgba(15, 45, 82, 0.75)), url('{{ asset('images/smkn4.jpg') }}') center/cover no-repeat; min-height: calc(100vh - 81px);">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-10 col-12 text-start">
                    <!-- Sub-title Hero -->
                    <p class="mb-2 fw-medium fs-2 fs-md-1" style="line-height: 1.2;">
                        Selamat Datang di
                    </p>

                    <!-- Judul Utama Hero -->
                    <h1 class="mb-3 fw-bold display-3 display-md-2" style="line-height: 1.1; letter-spacing: 1px;">
                        SMKN 4 BOGOR
                    </h1>

                    <!-- Deskripsi Hero -->
                    <p class="mb-0 fw-medium fs-4 fs-md-3 text-light" style="line-height: 1.3;">
                        Mewujudkan generasi yang kompeten, berkarakter, dan siap menghadapi masa depan
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Statistik & 3 Card Fitur -->
    <section class="py-4 bg-white">
        <div class="container">

            <!-- Box Statistik -->
            <div class="bg-navy text-white py-4 px-4 rounded-4 shadow-sm mb-5 mt-4">
                <div class="row text-center align-items-center g-4">
                    <div class="col-md-4 col-12 d-flex align-items-center justify-content-center gap-3">
                        <i class="bi bi-people-fill display-5"></i>
                        <div class="text-start">
                            <h3 class="fw-bold mb-0 fs-2">1200+</h3>
                            <p class="mb-0 fs-5 opacity-90 fw-medium">Siswa Aktif</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 d-flex align-items-center justify-content-center gap-3">
                        <i class="bi bi-person-badge-fill display-5"></i>
                        <div class="text-start">
                            <h3 class="fw-bold mb-0 fs-2">50+</h3>
                            <p class="mb-0 fs-5 opacity-90 fw-medium">Guru Profesional</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 d-flex align-items-center justify-content-center gap-3">
                        <i class="bi bi-globe-americas display-5"></i>
                        <div class="text-start">
                            <h3 class="fw-bold mb-0 fs-2">4</h3>
                            <p class="mb-0 fs-5 opacity-90 fw-medium">Jurusan Unggulan</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3 Card Fitur -->
            <div class="row g-4 justify-content-center">
                <!-- Card 1: Pembelajaran Berkualitas -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-10">
                    <div
                        class="card bg-navy text-white border-0 shadow-sm rounded-4 p-4 d-flex flex-column align-items-center justify-content-center text-center h-100">
                        <i class="bi bi-book-fill mb-3 text-white" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold fs-5 mb-0">Pembelajaran<br>Berkualitas</h5>
                    </div>
                </div>

                <!-- Card 2: Fasilitas Lengkap -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-10">
                    <div
                        class="card bg-navy text-white border-0 shadow-sm rounded-4 p-4 d-flex flex-column align-items-center justify-content-center text-center h-100">
                        <i class="bi bi-laptop mb-3 text-white" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold fs-5 mb-0">Fasilitas Lengkap</h5>
                    </div>
                </div>

                <!-- Card 3: Lingkungan Nyaman -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-10">
                    <div
                        class="card bg-navy text-white border-0 shadow-sm rounded-4 p-4 d-flex flex-column align-items-center justify-content-center text-center h-100">
                        <i class="bi bi-tree-fill mb-3 text-white" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold fs-5 mb-0">Lingkungan<br>Nyaman</h5>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Section Tentang Kami (#tentang) -->
    <section id="tentang" class="py-5 bg-white">
        <div class="container py-3">

            <!-- Detail Tentang SMKN 4 Bogor -->
            <div class="row align-items-center g-5 mb-5">
                <!-- Gambar Kegiatan (Kiri) -->
                <div class="col-lg-5">
                    <div class="rounded-4 overflow-hidden shadow-sm">
                        <img src="{{ asset('images/foto1.jpg') }}" alt="Kegiatan SMKN 4 Bogor" class="img-fluid w-100"
                            style="height: 300px; object-fit: cover;"
                            onerror="this.src='https://via.placeholder.com/600x400?text=Siswa+SMKN+4+Bogor'">
                    </div>
                </div>

                <!-- Teks Deskripsi (Kanan) -->
                <div class="col-lg-7">
                    <h3 class="fw-bold text-navy mb-3 fs-3">Tentang SMKN 4 Bogor</h3>
                    <p class="text-secondary lh-lg mb-0" style="font-size: 0.95rem; text-align: justify;">
                        SMKN 4 Bogor adalah sekolah menengah kejuruan yang berfokus pada pengembangan kompetensi peserta
                        didik sesuai dengan kebutuhan dunia kerja dan perkembangan teknologi. Melalui proses pembelajaran
                        yang inovatif, lingkungan sekolah yang kondusif, serta dukungan tenaga pendidik yang profesional,
                        sekolah berupaya menciptakan lulusan yang unggul, disiplin, berkarakter, dan siap menghadapi
                        tantangan di masa depan.
                    </p>
                </div>
            </div>

            <!-- Box Visi & Misi -->
            <div class="row g-4 mb-5">
                <!-- Card Visi (Kiri) -->
                <div class="col-md-6">
                    <div class="card h-100 border border-1 border-secondary-subtle rounded-4 p-4 shadow-sm">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-light border border-secondary-subtle"
                                style="width: 48px; height: 48px;">
                                <i class="bi bi-rocket-takeoff-fill text-navy fs-5"></i>
                            </div>
                            <h5 class="fw-bold text-navy mb-0 fs-5">Visi SMKN 4 Bogor</h5>
                        </div>
                        <p class="text-secondary mb-0 lh-base" style="font-size: 0.92rem;">
                            Menjadi sekolah menengah kejuruan yang unggul dalam prestasi, berkarakter, berwawasan
                            lingkungan, serta mampu menghasilkan lulusan yang kompeten dan siap bersaing di dunia kerja
                            maupun dunia industri.
                        </p>
                    </div>
                </div>

                <!-- Card Misi (Kanan) -->
                <div class="col-md-6">
                    <div class="card h-100 border border-1 border-secondary-subtle rounded-4 p-4 shadow-sm">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3 bg-navy text-white"
                                style="width: 40px; height: 40px;">
                                <i class="bi bi-check-lg fs-4"></i>
                            </div>
                            <h5 class="fw-bold text-navy mb-0 fs-5">Misi SMKN 4 Bogor</h5>
                        </div>
                        <ul class="text-secondary mb-0 ps-3 lh-lg" style="font-size: 0.92rem;">
                            <li>Menyelenggarakan pembelajaran yang berkualitas.</li>
                            <li>Membentuk karakter peserta didik yang disiplin dan bertanggung jawab.</li>
                            <li>Mengembangkan kompetensi sesuai kebutuhan dunia kerja.</li>
                            <li>Mendorong prestasi akademik dan nonakademik.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Program Keahlian -->
            <div class="mb-5">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-navy">
                        Program Keahlian di SMKN 4 Bogor
                    </h3>
                </div>

                <div class="row g-4 justify-content-center">
                    <!-- PPLG -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card h-100 border border-secondary-subtle rounded-4 text-center shadow-sm p-3">
                            <div class="d-flex justify-content-center align-items-center mb-3" style="height: 100px;">
                                <img src="{{ asset('images/pplg.jpg') }}" alt="PPLG" class="img-fluid"
                                    style="max-height: 85px;"
                                    onerror="this.src='https://via.placeholder.com/100?text=PPLG'">
                            </div>
                            <h5 class="fw-bold text-navy mb-1">PPLG</h5>
                            <p class="text-secondary small mb-0">Pengembangan Perangkat Lunak dan Gim</p>
                        </div>
                    </div>

                    <!-- TPFL -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card h-100 border border-secondary-subtle rounded-4 text-center shadow-sm p-3">
                            <div class="d-flex justify-content-center align-items-center mb-3" style="height: 100px;">
                                <img src="{{ asset('images/tpfl.jpg') }}" alt="TPFL" class="img-fluid"
                                    style="max-height: 85px;"
                                    onerror="this.src='https://via.placeholder.com/100?text=TPFL'">
                            </div>
                            <h5 class="fw-bold text-navy mb-1">TPFL</h5>
                            <p class="text-secondary small mb-0">Teknik Pengelasan dan Fabrikasi Logam</p>
                        </div>
                    </div>

                    <!-- TJKT -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card h-100 border border-secondary-subtle rounded-4 text-center shadow-sm p-3">
                            <div class="d-flex justify-content-center align-items-center mb-3" style="height: 100px;">
                                <img src="{{ asset('images/tjkt.jpg') }}" alt="TJKT" class="img-fluid"
                                    style="max-height: 85px;"
                                    onerror="this.src='https://via.placeholder.com/100?text=TJKT'">
                            </div>
                            <h5 class="fw-bold text-navy mb-1">TJKT</h5>
                            <p class="text-secondary small mb-0">Teknik Jaringan Komputer dan Telekomunikasi</p>
                        </div>
                    </div>

                    <!-- TKRO -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card h-100 border border-secondary-subtle rounded-4 text-center shadow-sm p-3">
                            <div class="d-flex justify-content-center align-items-center mb-3" style="height: 100px;">
                                <img src="{{ asset('images/tkro.jpg') }}" alt="TKRO" class="img-fluid"
                                    style="max-height: 85px;"
                                    onerror="this.src='https://via.placeholder.com/100?text=TKRO'">
                            </div>
                            <h5 class="fw-bold text-navy mb-1">TKRO</h5>
                            <p class="text-secondary small mb-0">Teknik Kendaraan Ringan Otomotif</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Section Berita & Informasi (#berita) -->
    <section id="berita" class="py-5 bg-white">
        <div class="container py-3">

            <div class="text-center mb-4">
                <h2 class="fw-bold" style="color: #0F2D52;">Berita Terbaru</h2>
                <p class="text-secondary small">Dapatkan informasi terbaru seputar kegiatan dan prestasi di SMKN 4 Bogor</p>
            </div>>

            <!-- Grid Card Berita -->
            <div class="row g-4 mb-4">
                @forelse($beritas ?? $berita ?? [] as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top"
                                alt="{{ $item->judul ?? 'Berita' }}" style="height: 200px; object-fit: cover;"
                                onerror="this.src='https://via.placeholder.com/400x250?text=Berita+SMKN+4'">
                            <div class="card-body d-flex flex-column">
                                <small class="text-muted mb-2">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at)->translatedFormat('d M Y') }}
                                </small>
                                <h5 class="card-title fw-bold text-navy mb-2">{{ Str::limit($item->judul ?? '', 50) }}</h5>
                                <p class="card-text text-secondary small flex-grow-1">
                                    {{ Str::limit(strip_tags($item->isi ?? $item->ringkasan ?? ''), 100) }}
                                </p>

                                <!-- Tombol Baca Selengkapnya -->
                                <a href="{{ route('berita.show', $item->slug ?? $item->id) }}"
                                    class="text-primary fw-semibold text-decoration-none mt-3">
                                    Baca Selengkapnya <i class="bi bi-chevron-right small"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5 text-muted">
                        Belum ada berita yang diterbitkan.
                    </div>
                @endforelse
            </div>

            <!-- Tombol Lihat Semua Berita -->
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('berita.index') }}"
                    class="btn text-white fw-semibold d-inline-flex align-items-center justify-content-center text-decoration-none shadow-sm px-4 py-3"
                    style="background-color: #0F2D52; width: 100%; max-width: 287px; border-radius: 10px; font-size: 16px;">
                    Lihat semua berita
                </a>
            </div>

        </div>
    </section>

    <!-- Section Galeri (#galeri) -->
    <section id="galeri" class="py-5 bg-white">
        <div class="container py-3">

            <div class="text-center mb-5">
                <h3 class="fw-bold text-navy mb-2 fs-3">Galeri SMKN 4 Bogor</h3>
                <p class="text-secondary small mb-0">Momen-momen terbaik dalam kegiatan belajar, prestasi, dan aktivitas
                    sekolah.</p>
            </div>

            <div class="row g-4 mb-5">
                @forelse($galeri ?? [] as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card border-0 shadow-sm rounded-3 overflow-hidden h-100 d-flex flex-column">
                            <!-- Foto Galeri (Klik mengarah ke detail) -->
                            <a href="{{ route('galeri.show', $item->id) }}">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul ?? 'Galeri' }}"
                                    class="card-img-top" style="height: 220px; object-fit: cover;"
                                    onerror="this.src='https://via.placeholder.com/400x250?text=SMKN+4+Bogor'">
                            </a>

                            <div class="card-body p-3 text-start d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <h6 class="fw-bold text-navy mb-1">
                                        <a href="{{ route('galeri.show', $item->id) }}" class="text-navy text-decoration-none">
                                            {{ Str::limit($item->judul ?? '', 50) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted d-block">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at)->translatedFormat('d M Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4">
                        <p class="text-muted">Belum ada foto galeri.</p>
                    </div>
                @endforelse
            </div>

            <!-- Tombol Lihat Semua Galeri (Ukurannya sama persis dengan tombol berita) -->
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('galeri.index') }}"
                    class="btn text-white fw-semibold d-inline-flex align-items-center justify-content-center text-decoration-none shadow-sm px-4 py-3"
                    style="background-color: #0F2D52; width: 100%; max-width: 287px; border-radius: 10px; font-size: 16px;">
                    Lihat semua galeri
                </a>
            </div>

        </div>
    </section>

    <!-- Section Kontak Kami (#kontak) -->
    <section id="kontak" class="py-5 bg-white">
        <div class="container py-3">
            <div class="row g-5">
                <!-- Kolom Kiri: Form Kirim Pesan -->
                <div class="col-lg-6">
                    <h3 class="fw-bold text-navy mb-1 fs-3">Kirim Pesan</h3>
                    <p class="text-secondary small mb-4">Kirimkan pesan kepada kami, tim kami akan segera merespons Anda</p>

                    <!-- Alert Notifikasi Berhasil -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('kontak.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="nama"
                                class="form-control rounded-3 p-3 bg-white border border-secondary-subtle"
                                placeholder="Nama Lengkap" style="font-size: 0.9rem;" value="{{ old('nama') }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email"
                                class="form-control rounded-3 p-3 bg-white border border-secondary-subtle"
                                placeholder="Email" style="font-size: 0.9rem;" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" name="telepon"
                                class="form-control rounded-3 p-3 bg-white border border-secondary-subtle"
                                placeholder="Nomor Telepon" style="font-size: 0.9rem;" value="{{ old('telepon') }}">
                        </div>
                        <div class="mb-4">
                            <textarea name="pesan"
                                class="form-control rounded-3 p-3 bg-white border border-secondary-subtle" rows="4"
                                placeholder="Pesan Anda" style="font-size: 0.9rem;" required>{{ old('pesan') }}</textarea>
                        </div>
                        <button type="submit" class="btn bg-navy text-white px-4 py-2.5 rounded-3 fw-semibold shadow-sm"
                            style="font-size: 0.9rem;">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

                <!-- Kolom Kanan: Informasi Kontak & Maps -->
                <div class="col-lg-6">
                    <h3 class="fw-bold text-navy mb-4 fs-3">Informasi Kontak</h3>

                    <div class="d-flex flex-column gap-3 mb-4">
                        <!-- Alamat -->
                        <div class="d-flex align-items-start gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle border border-secondary-subtle text-navy flex-shrink-0"
                                style="width: 42px; height: 42px; background-color: #F8FAFC;">
                                <i class="bi bi-geo-alt-fill fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-navy mb-1" style="font-size: 0.95rem;">Alamat</h6>
                                <p class="text-secondary mb-0 small" style="line-height: 1.4;">
                                    Jl. Raya Tajur Kp. Buntar RT02/RW08, Kel. Muarasari, Kec. Bogor Selatan, Kota Bogor.
                                </p>
                            </div>
                        </div>

                        <!-- Telepon -->
                        <div class="d-flex align-items-start gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle border border-secondary-subtle text-navy flex-shrink-0"
                                style="width: 42px; height: 42px; background-color: #F8FAFC;">
                                <i class="bi bi-telephone-fill fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-navy mb-1" style="font-size: 0.95rem;">Telepon</h6>
                                <p class="text-secondary mb-0 small">+62 821 226 2442</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="d-flex align-items-start gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle border border-secondary-subtle text-navy flex-shrink-0"
                                style="width: 42px; height: 42px; background-color: #F8FAFC;">
                                <i class="bi bi-envelope-fill fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-navy mb-1" style="font-size: 0.95rem;">Email</h6>
                                <p class="text-secondary mb-0 small">smkn4@smkn4bogor.sch.id</p>
                            </div>
                        </div>

                        <!-- Jam Operasional -->
                        <div class="d-flex align-items-start gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle border border-secondary-subtle text-navy flex-shrink-0"
                                style="width: 42px; height: 42px; background-color: #F8FAFC;">
                                <i class="bi bi-clock-fill fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-navy mb-1" style="font-size: 0.95rem;">Jam Operasional</h6>
                                <p class="text-secondary mb-0 small">Senin - Jumat: 07.00 - 17.00 WIB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Google Maps Embed -->
                    <div class="rounded-4 overflow-hidden border border-1 border-secondary-subtle shadow-sm"
                        style="height: 210px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.049883582496!2d106.82211897587121!3d-6.6407333933538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16a61e275%3A0x82a515f45863d0b2!2sSMK%20Negeri%204%20Bogor!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection