<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 4 Bogor</title>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* Mengunci font Poppins secara global untuk SEMUA elemen */
        *, ::before, ::after, body, input, button, select, textarea, .nav-link, .btn, table {
            font-family: 'Poppins', sans-serif !important;
        }

        /* Smooth scroll saat navbar diklik */
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        /* Color Scheme */
        .text-navy { color: #0F2D52 !important; }
        .bg-navy { background-color: #0F2D52 !important; }

        /* Navbar Link Status Mati (Biru Navy) */
        .navbar-nav .nav-link {
            color: #0F2D52 !important;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }

        /* Navbar Link Status Nyala / Hover (#F97316) */
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #F97316 !important;
            font-weight: 700;
            border-bottom: 3px solid #F97316;
            padding-bottom: 2px;
        }

        .btn-navy {
            background-color: #0F2D52;
            color: #ffffff;
            font-weight: 600;
        }

        .btn-navy:hover {
            background-color: #0a213d;
            color: #ffffff;
        }
    </style>
</head>
<body>

    {{-- Sembunyikan Navbar Publik jika URL diawali dengan 'admin' --}}
    @unless(request()->is('admin*'))
        @include('components.navbar')
    @endunless

    <main>
        @yield('content')
    </main>

    {{-- Sembunyikan Footer Publik jika URL diawali dengan 'admin' --}}
    @unless(request()->is('admin*'))
        @include('components.footer')
    @endunless

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script indikator aktif otomatis saat di-scroll -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            const sections = document.querySelectorAll('section[id]');

            // Jalankan indikator scroll hanya jika halaman memiliki tag <section id="...">
            if (sections.length > 0) {
                window.addEventListener('scroll', function() {
                    let current = '';
                    sections.forEach(section => {
                        const sectionTop = section.offsetTop - 100;
                        if (window.pageYOffset >= sectionTop) {
                            current = section.getAttribute('id');
                        }
                    });

                    navLinks.forEach(link => {
                        const href = link.getAttribute('href');
                        if (href && (href.endsWith('#' + current) || href === '#' + current)) {
                            navLinks.forEach(l => l.classList.remove('active'));
                            link.classList.add('active');
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>