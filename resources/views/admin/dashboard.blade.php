@extends('layouts.admin')

@section('content')
<div class="p-4 flex-grow-1">
    <div class="mb-4">
        <h3 class="fw-bold text-dark mb-1">Dashboard</h3>
        <p class="text-secondary small mb-0">Selamat datang, Admin!</p>
    </div>

    <!-- Stats Cards Grid -->
    <div class="row g-4">
        <!-- Card Berita -->
        <div class="col-12 col-md-4">
            <a href="{{ route('admin.berita.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm shadow-hover rounded-4 p-3 h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary-subtle text-primary rounded-4 p-3 d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                            <i class="bi bi-file-earmark-text-fill fs-3"></i>
                        </div>
                        <div>
                            <span class="text-secondary small d-block fw-medium">Berita</span>
                            <h2 class="fw-bold text-dark mb-0">{{ $totalBerita ?? 0 }}</h2>
                            <small class="text-muted fs-7">Total Berita</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Galeri -->
        <div class="col-12 col-md-4">
            <a href="{{ route('admin.galeri.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm shadow-hover rounded-4 p-3 h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-success-subtle text-success rounded-4 p-3 d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                            <i class="bi bi-image-fill fs-3"></i>
                        </div>
                        <div>
                            <span class="text-secondary small d-block fw-medium">Galeri</span>
                            <h2 class="fw-bold text-dark mb-0">{{ $totalGaleri ?? 0 }}</h2>
                            <small class="text-muted fs-7">Total Foto</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Pesan Masuk -->
        <div class="col-12 col-md-4">
            <a href="{{ route('admin.kontak.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm shadow-hover rounded-4 p-3 h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-danger-subtle text-danger rounded-4 p-3 d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                            <i class="bi bi-envelope-fill fs-3"></i>
                        </div>
                        <div>
                            <span class="text-secondary small d-block fw-medium">Pesan Masuk</span>
                            <h2 class="fw-bold text-dark mb-0">{{ $totalPesan ?? 0 }}</h2>
                            <small class="text-muted fs-7">Total Pesan</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection