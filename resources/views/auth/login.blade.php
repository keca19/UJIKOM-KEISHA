<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SMKN 4 Bogor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card border-0 shadow-lg p-4 rounded-4">
                
                <!-- Logo & Judul -->
                <div class="text-center mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 4 Bogor" class="mb-3" style="height: 70px;" onerror="this.src='https://via.placeholder.com/70'">
                    <h4 class="fw-bold mb-1" style="color: #0F2D52;">Masuk Admin</h4>
                    <p class="text-secondary small">Masukkan email & password untuk masuk</p>
                </div>

                <!-- Alert error session -->
                @if(session('error'))
                    <div class="alert alert-danger p-2 small text-center mb-3 rounded-3" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Alert error validasi form -->
                @if($errors->any())
                    <div class="alert alert-danger p-2 small mb-3 rounded-3" role="alert">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Login (Action disesuaikan ke route login.authenticate) -->
                <form action="{{ route('login.authenticate') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Email</label>
                        <input type="email" name="email" class="form-control rounded-3" value="{{ old('email') }}" placeholder="Masukkan email..." required autofocus>
                    </div>

                    <!-- Input Kata Sandi dengan Tombol Mata -->
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control rounded-start-3" placeholder="Masukkan password..." required>
                            <button class="btn btn-outline-secondary rounded-end-3" type="button" id="togglePassword">
                                <i class="bi bi-eye-slash" id="iconEye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4 small">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label text-secondary" for="remember">Ingat saya</label>
                        </div>
                    </div>

                    <button type="submit" class="btn text-white w-100 fw-bold py-2 rounded-3 shadow-sm" style="background-color: #0F2D52;">Masuk</button>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('home') }}" class="small link-secondary text-decoration-none">
                        &larr; Kembali ke Beranda
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script Toggle Lihat Password -->
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const iconEye = document.getElementById('iconEye');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            iconEye.classList.remove('bi-eye-slash');
            iconEye.classList.add('bi-eye');
        } else {
            passwordInput.type = 'password';
            iconEye.classList.remove('bi-eye');
            iconEye.classList.add('bi-eye-slash');
        }
    });
</script>
</body>
</html>