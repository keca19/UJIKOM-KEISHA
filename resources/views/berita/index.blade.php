@extends('layouts.main')

@section('content')
<div class="container py-5" style="margin-top: 30px;">
    
    <!-- Tombol Kembali ke Beranda -->
    <div class="mb-4">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary rounded-3 px-3 py-2 d-inline-flex align-items-center gap-2">
            <i class="bi bi-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>

    <!-- Header Page -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-navy">Semua Berita & Informasi</h2>
        <p class="text-secondary">Temukan berita terbaru dan informasi kegiatan sekolah</p>
    </div>

    <!-- Form Pencarian -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <form action="{{ route('berita.index') }}" method="GET">
                <div class="input-group shadow-sm rounded-3 overflow-hidden">
                    <input type="search" id="inputCariBerita" name="search" class="form-control border-0 p-3" placeholder="Cari berita..." value="{{ request('search') }}">
                    <button class="btn bg-navy text-white px-4" type="submit">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Grid Berita Lengkap -->
    <div class="row g-4 mb-5">
        @forelse($berita as $item)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 200px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/400x250?text=Berita+SMKN+4'">
                    <div class="card-body d-flex flex-column">
                        <small class="text-muted mb-2">
                            <i class="bi bi-calendar3 me-1"></i> {{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at)->translatedFormat('d M Y') }}
                        </small>
                        <h5 class="card-title fw-bold text-navy mb-2">{{ Str::limit($item->judul, 50) }}</h5>
                        <p class="card-text text-secondary small flex-grow-1">
                            {{ Str::limit(strip_tags($item->ringkasan ?? $item->isi), 100) }}
                        </p>
                        
                        <a href="{{ route('berita.show', $item->id) }}" class="text-primary fw-semibold text-decoration-none mt-3">
                            Baca Selengkapnya <i class="bi bi-chevron-right small"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5 text-muted">
                Belum ada berita yang ditemukan.
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $berita->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputCari = document.getElementById('inputCariBerita');

        if (inputCari) {
            inputCari.addEventListener('input', function() {
                // Ketika input kosong/dihapus bersih
                if (this.value.trim() === '') {
                    // Redirect kembali ke halaman index berita tanpa parameter search
                    window.location.href = "{{ route('berita.index') }}";
                }
            });
        }
    });
</script>
@endpush