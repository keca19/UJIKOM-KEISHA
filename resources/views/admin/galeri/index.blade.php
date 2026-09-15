<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri - SMKN 4 Bogor</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">

    <div class="container-fluid p-0">
        <div class="row g-0">
            @include('components.sidebar')

            <div class="col-md-9 col-lg-10 min-vh-100 d-flex flex-column ms-auto">
                <!-- Header Nav Admin -->
                <div class="bg-white py-3 px-4 border-bottom d-flex justify-content-end align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-warning text-white rounded-circle fw-bold d-flex align-items-center justify-content-center"
                            style="width: 36px; height: 36px;">A</div>
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

                    <!-- Page Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold mb-0" style="color: #0F2D52;">Kelola Galeri</h3>
                        <button class="btn text-white px-4 py-2 rounded-3 fw-medium" style="background-color: #0F2D52;"
                            data-bs-toggle="modal" data-bs-target="#modalTambah">
                            Tambah+
                        </button>
                    </div>

                    <!-- Grid Card Galeri -->
                    <div class="row g-4">
                        @forelse($galeri ?? [] as $item)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card border-0 rounded-4 overflow-hidden bg-white shadow-sm h-100 p-2">
                                    <div class="rounded-3 overflow-hidden d-flex flex-column h-100">
                                        <!-- Foto -->
                                        <div class="position-relative w-100 overflow-hidden rounded-3"
                                            style="height: 160px;">
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                                class="w-100 h-100 object-fit-cover"
                                                onerror="this.src='https://via.placeholder.com/400x250?text=SMKN+4+Bogor'">
                                        </div>

                                        <!-- Area Judul dan Tanggal -->
                                        <div
                                            class="p-3 pb-1 text-center flex-grow-1 d-flex flex-column justify-content-center">
                                            <h6 class="fw-bold mb-1"
                                                style="color: #0F2D52; font-size: 0.85rem; line-height: 1.3;">
                                                {{ $item->judul }}</h6>
                                            <small class="text-secondary d-block" style="font-size: 0.75rem;">
                                                <i class="bi bi-calendar3 me-1"></i>
                                                {{ isset($item->tanggal) ? \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') : '-' }}
                                            </small>
                                        </div>

                                        <!-- Action Buttons (Edit & Hapus) -->
                                        <div
                                            class="bg-white p-2 pt-0 d-flex justify-content-center align-items-center gap-2">
                                            <button
                                                class="btn text-white rounded-2 border-0 d-inline-flex align-items-center justify-content-center btn-edit"
                                                style="background-color: #2AD1A3; width: 34px; height: 34px; font-size: 0.9rem;"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit" data-id="{{ $item->id }}"
                                                data-judul="{{ $item->judul }}"
                                                data-tanggal="{{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d') }}"
                                                data-foto="{{ asset('storage/' . $item->foto) }}" title="Edit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>

                                            <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn text-white rounded-2 border-0 d-inline-flex align-items-center justify-content-center"
                                                    style="background-color: #EE2A41; width: 34px; height: 34px; font-size: 0.9rem;"
                                                    title="Hapus">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <p class="text-secondary mb-0">Belum ada foto galeri yang ditambahkan.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH FOTO GALERI -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 rounded-4 p-3">
                <div class="modal-header border-0">
                    <div>
                        <h5 class="modal-title fw-bold" style="color: #0F2D52;">Tambah Foto Galeri</h5>
                        <small class="text-secondary">Unggah foto baru untuk SMKN 4 Bogor</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="this.querySelector('button[type=submit]').disabled = true;">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-medium" style="color: #0F2D52;">Judul Foto</label>
                            <input type="text" name="judul" class="form-control rounded-3"
                                placeholder="Masukkan judul foto" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-medium" style="color: #0F2D52;">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control rounded-3" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-medium" style="color: #0F2D52;">Pilih Foto</label>
                            <div class="border border-2 border-dashed rounded-3 p-4 text-center cursor-pointer bg-light"
                                onclick="document.getElementById('inputFotoTambah').click();">
                                <i class="bi bi-cloud-arrow-up fs-1" style="color: #0F2D52;"></i>
                                <p class="mb-0 text-secondary small fw-medium" id="labelFotoTambah">Klik untuk memilih
                                    foto</p>
                            </div>
                            <input type="file" id="inputFotoTambah" name="foto" class="d-none" accept="image/*" required
                                onchange="document.getElementById('labelFotoTambah').innerText = this.files[0].name">
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light rounded-3 px-4"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn text-white rounded-3 px-4"
                            style="background-color: #0F2D52;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT FOTO GALERI -->
    <div class="modal fade" id="modalEdit" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 rounded-4 p-3">
                <div class="modal-header border-0">
                    <div>
                        <h5 class="modal-title fw-bold" style="color: #0F2D52;">Edit Foto Galeri</h5>
                        <small class="text-secondary">Ubah data galeri SMKN 4 Bogor</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="formEdit" method="POST" enctype="multipart/form-data"
                    onsubmit="this.querySelector('button[type=submit]').disabled = true;">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-medium" style="color: #0F2D52;">Judul Foto</label>
                            <input type="text" id="edit_judul" name="judul" class="form-control rounded-3" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-medium" style="color: #0F2D52;">Tanggal</label>
                            <input type="date" id="edit_tanggal" name="tanggal" class="form-control rounded-3" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-medium" style="color: #0F2D52;">Foto Baru
                                (Opsional)</label>
                            <div class="border border-2 border-dashed rounded-3 p-4 text-center cursor-pointer bg-light"
                                onclick="document.getElementById('inputFotoEdit').click();">
                                <i class="bi bi-cloud-arrow-up fs-1" style="color: #0F2D52;"></i>
                                <p class="mb-0 text-secondary small fw-medium" id="labelFotoEdit">Klik jika ingin
                                    mengganti foto</p>
                            </div>
                            <input type="file" id="inputFotoEdit" name="foto" class="d-none" accept="image/*"
                                onchange="document.getElementById('labelFotoEdit').innerText = this.files[0].name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-medium d-block" style="color: #0F2D52;">Preview Foto Saat
                                Ini</label>
                            <img id="edit_preview_foto" src="" alt="Preview" class="rounded-3 img-thumbnail"
                                style="max-height: 120px;">
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light rounded-3 px-4"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn text-white rounded-3 px-4"
                            style="background-color: #0F2D52;">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.btn-edit');
            const formEdit = document.getElementById('formEdit');
            const inputJudul = document.getElementById('edit_judul');
            const inputTanggal = document.getElementById('edit_tanggal');
            const previewFoto = document.getElementById('edit_preview_foto');

            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    const judul = this.getAttribute('data-judul');
                    const tanggal = this.getAttribute('data-tanggal');
                    const foto = this.getAttribute('data-foto');

                    formEdit.action = `/admin/galeri/${id}`;

                    inputJudul.value = judul;
                    inputTanggal.value = tanggal;
                    previewFoto.src = foto;
                });
            });
        });
    </script>
</body>

</html>