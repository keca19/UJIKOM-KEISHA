@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm rounded-4 border-0 p-4">
                <h4 class="fw-bold text-navy mb-4">Tambah Berita Baru</h4>

                <!-- Menampilkan Error Validasi jika tombol simpan tidak merespons -->
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Judul Berita -->
                    <div class="mb-3">
                        <label for="judul" class="form-label fw-semibold">Judul Berita</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
                    </div>

                    <!-- Ringkasan -->
                    <div class="mb-3">
                        <label for="ringkasan" class="form-label fw-semibold">Ringkasan Berita</label>
                        <textarea class="form-control" id="ringkasan" name="ringkasan" rows="2">{{ old('ringkasan') }}</textarea>
                    </div>

                    <!-- Isi Berita -->
                    <div class="mb-3">
                        <label for="isi" class="form-label fw-semibold">Isi Lengkap Berita</label>
                        <textarea class="form-control" id="isi" name="isi" rows="5" required>{{ old('isi') }}</textarea>
                    </div>

                    <!-- Upload Gambar -->
                    <div class="mb-4">
                        <label for="gambar" class="form-label fw-semibold">Gambar Utama</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('home') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn bg-navy text-white px-4">Simpan Berita</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection