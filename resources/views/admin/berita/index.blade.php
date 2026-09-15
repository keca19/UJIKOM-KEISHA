<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita - SMKN 4 Bogor</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container-fluid p-0">
    <div class="row g-0">
        @include('components.sidebar')

        <div class="col-md-9 col-lg-10 min-vh-100 d-flex flex-column ms-auto">
            <!-- Header Admin -->
            <div class="bg-white py-3 px-4 border-bottom d-flex justify-content-end align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-warning text-white rounded-circle fw-bold d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">A</div>
                    <span class="fw-semibold text-dark small">Admin</span>
                </div>
            </div>

            <div class="p-4 flex-grow-1">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold mb-0" style="color: #0F2D52;">Kelola Berita</h3>
                    <button class="btn text-white px-4 py-2 rounded-3 fw-medium" style="background-color: #0F2D52;" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        Tambah+
                    </button>
                </div>

                <div class="mb-4">
                    <form action="{{ route('admin.berita.index') }}" method="GET" style="max-width: 380px;">
                        <div class="position-relative">
                            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary"></i>
                            <input type="text" name="search" class="form-control ps-5 border-0 rounded-3 shadow-sm py-2" placeholder="Cari berita berdasarkan judul" value="{{ request('search') }}">
                        </div>
                    </form>
                </div>

                <!-- Grid Card Berita -->
                <div class="row g-4">
                    @forelse($berita as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card border-0 rounded-3 overflow-hidden bg-white shadow-sm h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-100 object-fit-cover" style="height: 140px;" onerror="this.src='https://via.placeholder.com/400x250?text=SMKN+4+Bogor'">
                                    
                                    <div class="p-3">
                                        <small class="text-secondary d-block mb-1" style="font-size: 0.72rem;">
                                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                                        </small>
                                        <h6 class="fw-bold mb-2" style="color: #0F2D52; font-size: 0.88rem; line-height: 1.3;">
                                            {{ $item->judul }}
                                        </h6>
                                        <p class="text-secondary small mb-0" style="font-size: 0.75rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                            {{ $item->ringkasan }}
                                        </p>
                                    </div>
                                </div>

                                <div class="p-3 pt-0 d-flex justify-content-center gap-2">
                                    <!-- Tombol Edit -->
                                    <button class="btn text-white rounded-3 border-0 d-inline-flex align-items-center justify-content-center btn-edit" 
                                            style="background-color: #00B69B; width: 38px; height: 38px;"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalEdit"
                                            data-id="{{ $item->id }}"
                                            data-judul="{{ $item->judul }}"
                                            data-tanggal="{{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d') }}"
                                            data-ringkasan="{{ $item->ringkasan }}"
                                            data-gambar="{{ asset('storage/' . $item->gambar) }}"
                                            title="Edit">
                                        <i class="bi bi-pencil-fill" style="font-size: 0.9rem;"></i>
                                    </button>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-white rounded-3 border-0 d-inline-flex align-items-center justify-content-center" style="background-color: #EE2A41; width: 38px; height: 38px;" title="Hapus">
                                            <i class="bi bi-trash-fill" style="font-size: 0.9rem;"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <p class="text-secondary">Belum ada berita yang ditambahkan.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH BERITA -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 p-2">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" style="color: #0F2D52;">Tambah Berita Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" onsubmit="this.querySelector('button[type=submit]').disabled = true;">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-medium" style="color: #0F2D52;">Judul Berita</label>
                        <input type="text" name="judul" class="form-control rounded-3" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-medium" style="color: #0F2D52;">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control rounded-3" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-medium" style="color: #0F2D52;">Gambar</label>
                        <input type="file" name="gambar" class="form-control rounded-3" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-medium" style="color: #0F2D52;">Ringkasan Berita</label>
                        <textarea name="ringkasan" class="form-control rounded-3" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn text-white rounded-3 px-4" style="background-color: #0F2D52;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDIT BERITA -->
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 p-2">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" style="color: #0F2D52;">Edit Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="formEdit" method="POST" enctype="multipart/form-data" onsubmit="this.querySelector('button[type=submit]').disabled = true;">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-medium" style="color: #0F2D52;">Judul Berita</label>
                        <input type="text" id="edit_judul" name="judul" class="form-control rounded-3" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-medium" style="color: #0F2D52;">Tanggal</label>
                        <input type="date" id="edit_tanggal" name="tanggal" class="form-control rounded-3" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-medium" style="color: #0F2D52;">Gambar Baru (Opsional)</label>
                        <input type="file" name="gambar" class="form-control rounded-3" accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                    </div>
                    <div class="mb-2">
                        <img id="edit_preview_gambar" src="" alt="Preview" class="rounded-3 img-thumbnail" style="max-height: 100px;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-medium" style="color: #0F2D52;">Ringkasan Berita</label>
                        <textarea id="edit_ringkasan" name="ringkasan" class="form-control rounded-3" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn text-white rounded-3 px-4" style="background-color: #0F2D52;">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.btn-edit');
        const formEdit = document.getElementById('formEdit');
        const inputJudul = document.getElementById('edit_judul');
        const inputTanggal = document.getElementById('edit_tanggal');
        const inputRingkasan = document.getElementById('edit_ringkasan');
        const previewGambar = document.getElementById('edit_preview_gambar');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const judul = this.getAttribute('data-judul');
                const tanggal = this.getAttribute('data-tanggal');
                const ringkasan = this.getAttribute('data-ringkasan');
                const gambar = this.getAttribute('data-gambar');

                formEdit.action = `/admin/berita/${id}`;

                inputJudul.value = judul;
                inputTanggal.value = tanggal;
                inputRingkasan.value = ringkasan;
                previewGambar.src = gambar;
            });
        });
    });
</script>
</body>
</html>