@extends('layouts.main')

@section('content')
<div class="container py-5 mt-4">
    
    <!-- Tombol Kembali ke Beranda -->
    <div class="mb-4">
        <a href="{{ route('home') }}" class="btn rounded-3 px-3 py-2 d-inline-flex align-items-center gap-2 border" style="color: #0F2D52; border-color: #0F2D52;">
            <i class="bi bi-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>

    <!-- Header Page -->
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #0F2D52;">Galeri SMKN 4 Bogor</h2>
        <p class="text-secondary">Momen-momen terbaik dalam kegiatan belajar, prestasi, dan aktivitas sekolah.</p>
    </div>

    <!-- Grid Galeri -->
    <div class="row g-4 mb-5">
        @forelse($galeri as $item)
            <div class="col-md-4 col-sm-6">
                <!-- Card dibungkus link agar saat diklik langsung masuk ke detail galeri -->
                <a href="{{ route('galeri.show', $item->id) }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                        <img src="{{ asset('storage/' . $item->foto) }}" 
                             alt="{{ $item->judul }}" 
                             class="card-img-top" 
                             style="height: 220px; object-fit: cover;"
                             onerror="this.src='https://via.placeholder.com/400x250?text=SMKN+4+Bogor'">
                        
                        <div class="card-body p-3 text-start">
                            <h6 class="fw-bold mb-1 text-truncate" style="color: #0F2D52;">{{ $item->judul }}</h6>
                            <small class="text-muted">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at)->translatedFormat('d M Y') }}
                            </small>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center py-5 text-muted">
                Belum ada foto galeri.
            </div>
        @endforelse
    </div>

</div>
@endsection