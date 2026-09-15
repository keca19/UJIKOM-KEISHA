<div class="col-md-3 col-lg-2 p-3 d-flex flex-column justify-content-between position-fixed top-0 bottom-0 start-0 z-3" 
     style="background-color: #0b2545 !important; color: #ffffff !important; font-family: 'Poppins', sans-serif !important;">
    <div>
        <!-- Brand Header: Logo + Text SMKN 4 BOGOR -->
        <div class="d-flex align-items-center gap-3 mb-4 px-2 pt-2">
            <img src="{{ asset('images/logosmkn4.jpg') }}" height="42" width="42" style="object-fit: contain;" alt="Logo SMKN 4 Bogor" onerror="this.src='https://via.placeholder.com/42?text=Logo'">
            <div class="lh-sm">
                <span class="fw-bold d-block text-white fs-6 mb-0" style="font-family: 'Poppins', sans-serif !important;">SMKN 4 BOGOR</span>
                <small class="text-white-50" style="font-size: 0.72rem; font-family: 'Poppins', sans-serif !important;">Panel Admin</small>
            </div>
        </div>

        <!-- Menu Navigation -->
        <div class="nav flex-column mt-4">
            <a href="{{ route('admin.dashboard') }}" 
               class="nav-link mb-1 rounded-3 px-3 py-2 d-flex align-items-center" 
               style="font-family: 'Poppins', sans-serif !important; {{ request()->routeIs('admin.dashboard') ? 'background-color: #133a68 !important; color: #ffffff !important; font-weight: 600;' : 'color: rgba(255, 255, 255, 0.75) !important;' }}">
                <i class="bi bi-house-door-fill me-3 fs-5"></i> Dashboard
            </a>
            
            <a href="{{ route('admin.berita.index') }}" 
               class="nav-link mb-1 rounded-3 px-3 py-2 d-flex align-items-center" 
               style="font-family: 'Poppins', sans-serif !important; {{ request()->routeIs('admin.berita.*') ? 'background-color: #133a68 !important; color: #ffffff !important; font-weight: 600;' : 'color: rgba(255, 255, 255, 0.75) !important;' }}">
                <i class="bi bi-file-earmark-text-fill me-3 fs-5"></i> Berita
            </a>

            <a href="{{ route('admin.galeri.index') }}" 
               class="nav-link mb-1 rounded-3 px-3 py-2 d-flex align-items-center" 
               style="font-family: 'Poppins', sans-serif !important; {{ request()->routeIs('admin.galeri.*') ? 'background-color: #133a68 !important; color: #ffffff !important; font-weight: 600;' : 'color: rgba(255, 255, 255, 0.75) !important;' }}">
                <i class="bi bi-image-fill me-3 fs-5"></i> Galeri
            </a>

            <a href="{{ route('admin.kontak.index') }}" 
               class="nav-link mb-1 rounded-3 px-3 py-2 d-flex align-items-center" 
               style="font-family: 'Poppins', sans-serif !important; {{ request()->routeIs('admin.kontak.*') ? 'background-color: #133a68 !important; color: #ffffff !important; font-weight: 600;' : 'color: rgba(255, 255, 255, 0.75) !important;' }}">
                <i class="bi bi-envelope-fill me-3 fs-5"></i> Kontak
            </a>
        </div>
    </div>

    <!-- Tombol Keluar dengan Konfirmasi -->
    <div class="pb-2">
        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar?')">
            @csrf
            <button type="submit" class="btn w-100 text-start px-3 py-2 border-0 bg-transparent d-flex align-items-center" style="color: rgba(255, 255, 255, 0.75) !important; font-family: 'Poppins', sans-serif !important;">
                <i class="bi bi-box-arrow-right me-3 fs-5"></i> Keluar
            </button>
        </form>
    </div>
</div>