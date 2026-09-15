@extends('layouts.main')

@section('content')

    <!-- Section Detail Galeri -->
    <section class="py-5 bg-white">
        <div class="container py-3">

            <!-- Breadcrumb & Tombol Kembali -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-decoration-none text-muted">Beranda</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('galeri.index') }}" class="text-decoration-none text-muted">Galeri</a>
                        </li>
                        <li class="breadcrumb-item active text-navy fw-semibold" aria-current="page">
                            Detail Galeri
                        </li>
                    </ol>
                </nav>

                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-3 px-3 py-1.5 btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <!-- Header Detail (Judul & Tanggal) -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-10 text-start">
                    <!-- Judul Foto -->
                    <h2 class="fw-bold text-navy mb-3 display-6">
                        {{ $galeri->judul ?? 'Detail Galeri' }}
                    </h2>

                    <!-- Meta Tanggal/Informasi -->
                    <div class="d-flex align-items-center gap-3 text-muted small border-bottom pb-3">
                        <span class="d-flex align-items-center gap-1">
                            <i class="bi bi-calendar3"></i>
                            {{ \Carbon\Carbon::parse($galeri->tanggal ?? $galeri->created_at)->translatedFormat('d F Y') }}
                        </span>
                        <span>•</span>
                        <span class="d-flex align-items-center gap-1">
                            <i class="bi bi-image"></i> Foto Galeri
                        </span>
                    </div>
                </div>
            </div>

            <!-- Tampilan Foto Utama -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="rounded-4 overflow-hidden shadow-sm border border-secondary-subtle">
                        <img src="{{ asset('storage/' . $galeri->foto) }}" 
                             alt="{{ $galeri->judul ?? 'Foto Galeri' }}" 
                             class="img-fluid w-100" 
                             style="max-height: 550px; object-fit: cover;"
                             onerror="this.src='https://via.placeholder.com/1000x600?text=SMKN+4+Bogor'">
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection