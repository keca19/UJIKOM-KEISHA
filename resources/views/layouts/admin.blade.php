<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - SMKN 4 Bogor</title>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Panggil Sidebar Admin -->
            @include('components.sidebar')

            <!-- Area Konten Utama Admin -->
            <div id="adminMainContent" class="col-md-9 col-lg-10 d-flex flex-column">
                
                <!-- Topbar Admin -->
                <div class="bg-white py-3 px-4 border-bottom d-flex justify-content-end align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-warning text-white rounded-circle fw-bold d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">A</div>
                        <span class="fw-semibold text-dark small">Admin</span>
                    </div>
                </div>

                <!-- Isi Halaman (Dashboard / Kontak / Berita / Galeri) -->
                <div class="p-4 flex-grow-1">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Dynamic Styling JS -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Apply styling dasar ke body
            document.body.style.fontFamily = "'Poppins', sans-serif";
            document.body.style.backgroundColor = "#f8f9fa";

            const mainContent = document.getElementById('adminMainContent');

            function applyResponsiveStyles() {
                mainContent.style.minHeight = "100vh";
                if (window.innerWidth >= 768) {
                    mainContent.style.marginLeft = "16.66667%";
                } else {
                    mainContent.style.marginLeft = "0px";
                }
            }

            // Jalankan saat halaman di-load dan di-resize
            applyResponsiveStyles();
            window.addEventListener('resize', applyResponsiveStyles);
        });
    </script>
</body>
</html>