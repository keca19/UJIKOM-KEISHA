@extends('layouts.main')

@section('content')
<div class="container-fluid p-0">
    <div class="row g-0">
        @include('components.sidebar')

        <div class="col-md-9 col-lg-10 min-vh-100 d-flex flex-column ms-auto">
            <!-- Header Nav Admin -->
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

                <!-- Page Header & Search -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                    <div>
                        <h3 class="fw-bold mb-1" style="color: #0F2D52;">Kelola Kontak</h3>
                        <p class="text-secondary small mb-0">Melihat daftar pesan masuk dari pengunjung website</p>
                    </div>
                    <div style="width: 260px;">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-secondary"><i class="bi bi-search"></i></span>
                            <input type="text" id="searchInput" class="form-control border-start-0 ps-0" placeholder="Cari nama atau email..." onkeyup="filterTable()">
                        </div>
                    </div>
                </div>

                <!-- Table Card -->
                <div class="card border-0 shadow-sm rounded-4 p-3">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0" id="kontakTable">
                            <thead>
                                <tr class="text-secondary border-bottom">
                                    <th class="text-center" style="width: 50px;">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th class="text-center">Status</th>
                                    <th>Tanggal</th>
                                    <th class="text-center" style="width: 110px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kontak ?? [] as $index => $item)
                                    <tr id="row-kontak-{{ $item->id }}">
                                        <td class="text-center fw-medium text-secondary">{{ $index + 1 }}</td>
                                        <td class="fw-semibold text-dark">{{ $item->nama }}</td>
                                        <td class="text-secondary">{{ $item->email }}</td>
                                        <td>
                                            <span class="d-inline-block text-truncate" style="max-width: 220px;">
                                                {{ $item->pesan }}
                                            </span>
                                        </td>
                                        <td class="text-center status-cell">
                                            @if(($item->status ?? 'unread') == 'read')
                                                <span class="badge bg-success text-white px-3 py-2 rounded-pill fw-medium">Sudah Dibaca</span>
                                            @else
                                                <span class="badge bg-danger text-white px-3 py-2 rounded-pill fw-medium">Belum Dibaca</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="lh-sm">
                                                <div class="fw-medium text-dark">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</div>
                                                <small class="text-muted">{{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }}</small>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <!-- Tombol Detail / Lihat Pesan -->
                                                <button type="button" 
                                                        class="btn text-white btn-sm border-0 rounded-3 p-2 d-inline-flex align-items-center justify-content-center btn-detail" 
                                                        style="background-color: #0F2D52;"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#modalDetail"
                                                        data-id="{{ $item->id }}"
                                                        data-nama="{{ $item->nama }}"
                                                        data-email="{{ $item->email }}"
                                                        data-pesan="{{ $item->pesan }}"
                                                        data-status="{{ $item->status ?? 'unread' }}"
                                                        data-tanggal="{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y, H:i') }}"
                                                        title="Lihat Pesan">
                                                    <i class="bi bi-eye-fill fs-6"></i>
                                                </button>

                                                <!-- Form Tombol Hapus -->
                                                <form action="{{ route('admin.kontak.destroy', $item->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm border-0 rounded-3 p-2 d-inline-flex align-items-center justify-content-center" title="Hapus Pesan">
                                                        <i class="bi bi-trash3-fill fs-6"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5 text-muted">
                                            Belum ada pesan masuk dari pengunjung.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- MODAL DETAIL PESAN -->
<div class="modal fade" id="modalDetail" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 p-3 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" style="color: #0F2D52;">Detail Pesan Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <div class="mb-2">
                        <small class="text-secondary d-block">Pengirim:</small>
                        <strong class="text-dark fs-6" id="detail_nama">-</strong>
                    </div>
                    <div class="mb-2">
                        <small class="text-secondary d-block">Email:</small>
                        <span class="text-dark" id="detail_email">-</span>
                    </div>
                    <div>
                        <small class="text-secondary d-block">Waktu Kirim:</small>
                        <small class="text-muted" id="detail_tanggal">-</small>
                    </div>
                </div>

                <div>
                    <label class="form-label small fw-medium" style="color: #0F2D52;">Isi Pesan:</label>
                    <div class="p-3 border rounded-3 bg-white" id="detail_pesan" style="min-height: 100px; max-height: 250px; overflow-y: auto; white-space: pre-line;">
                        -
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn text-white rounded-3 px-4" style="background-color: #0F2D52;" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const detailButtons = document.querySelectorAll('.btn-detail');
        detailButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const nama = this.getAttribute('data-nama');
                const email = this.getAttribute('data-email');
                const pesan = this.getAttribute('data-pesan');
                const tanggal = this.getAttribute('data-tanggal');
                const status = this.getAttribute('data-status');

                document.getElementById('detail_nama').innerText = nama;
                document.getElementById('detail_email').innerText = email;
                document.getElementById('detail_pesan').innerText = pesan;
                document.getElementById('detail_tanggal').innerText = tanggal;

                if (status === 'unread') {
                    // Update tampilan UI lokal
                    const row = document.getElementById(`row-kontak-${id}`);
                    if (row) {
                        const statusCell = row.querySelector('.status-cell');
                        if (statusCell) {
                            statusCell.innerHTML = '<span class="badge bg-success text-white px-3 py-2 rounded-pill fw-medium">Sudah Dibaca</span>';
                        }
                    }
                    this.setAttribute('data-status', 'read');

                    // Kirim Request PUT ke Database
                    fetch(`/admin/kontak/${id}/read`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Status ter-update di database:', data);
                    })
                    .catch(err => console.error('Status update error:', err));
                }
            });
        });
    });

    function filterTable() {
        const input = document.getElementById("searchInput");
        const filter = input.value.toLowerCase();
        const table = document.getElementById("kontakTable");
        const tr = table.getElementsByTagName("tr");

        for (let i = 1; i < tr.length; i++) {
            let tdNama = tr[i].getElementsByTagName("td")[1];
            let tdEmail = tr[i].getElementsByTagName("td")[2];
            if (tdNama || tdEmail) {
                let txtNama = tdNama.textContent || tdNama.innerText;
                let txtEmail = tdEmail.textContent || tdEmail.innerText;
                if (txtNama.toLowerCase().indexOf(filter) > -1 || txtEmail.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection