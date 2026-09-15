@extends('layouts.main')

@section('content')
<div class="container py-5">
    
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($berita->judul, 25) }}</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Judul Berita -->
            <h1 class="fw-bold text-navy mb-3">{{ $berita->judul }}</h1>

            <!-- Meta Info (Tanggal & Penulis) -->
            <div class="d-flex align-items-center text-muted small mb-4 gap-3">
                <span>
                    <i class="bi bi-calendar3 me-1"></i> 
                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                </span>
                <span>
                    <i class="bi bi-person me-1"></i> Admin SMKN 4 Bogor
                </span>
            </div>

            <!-- Gambar Utama Berita -->
            @if($berita->gambar)
                <div class="mb-4 rounded-4 overflow-hidden shadow-sm">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" 
                         alt="{{ $berita->judul }}" 
                         class="img-fluid w-100" 
                         style="max-height: 500px; object-fit: cover;">
                </div>
            @endif

            <!-- Deskripsi / Isi Berita -->
            <div class="berita-content text-secondary lh-lg fs-5 mb-5" style="text-align: justify; white-space: pre-line;">
                {!! nl2br(e($berita->ringkasan ?? $berita->isi)) !!}
            </div>

            <!-- Tombol Kembali ke Beranda Paling Atas di Sebelah Kanan Bawah -->
            <div class="pt-4 border-top d-flex justify-content-end">
                <a href="{{ route('home') }}" class="btn btn-outline-navy rounded-pill px-4">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
</div>
@endsection