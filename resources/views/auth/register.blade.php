<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun | MIS</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #f4f6f9 0%, #e0e5ec 100%);
            display: flex;
            align-items: center;
            min-height: 100vh;
            padding: 2rem 0; 
        }
        .card-register {
            border: none;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .bg-mis-navy {
            background-color: #003366;
            color: white;
        }
        
        .btn-mis-blue {
            background-color: #004080;
            color: white;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-mis-blue:hover {
            background-color: #002244;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 51, 102, 0.3);
        }

        .logo-placeholder {
            font-weight: bold;
            font-size: 1.5rem;
            letter-spacing: 1px;
        }

        .input-group-text {
            background-color: #f8f9fa;
            border-right: none;
        }
        .form-control {
            border-left: none;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #dee2e6;
        }
        .input-group:focus-within {
            box-shadow: 0 0 0 0.25rem rgba(0, 51, 102, 0.25);
            border-radius: 0.375rem;
        }
        .input-group:focus-within .input-group-text,
        .input-group:focus-within .form-control {
            border-color: #003366;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card card-register">
                    
                    <div class="card-header bg-mis-navy text-center py-4">
                        <i class="bi bi-person-vcard-fill fs-1 text-warning mb-2 d-block"></i>
                        <div class="logo-placeholder mb-1">Buat Akun MIS</div>
                        <p class="mb-0 small text-light opacity-75">Daftarkan akun Orang Tua/Wali Wali untuk memulai</p>
                    </div>

                    <div class="card-body p-4">
                        
                        <form method="POST" action="{{ route('register') }}">
                            @csrf 

                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold text-secondary small">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text text-muted"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="John Doe">
                                </div>
                                @error('name')
                                    <small class="text-danger mt-1 d-block"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold text-secondary small">Alamat Email</label>
                                <div class="input-group">
                                    <span class="input-group-text text-muted"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="contoh@domain.com">
                                </div>
                                @error('email')
                                    <small class="text-danger mt-1 d-block"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold text-secondary small">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text text-muted"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter">
                                </div>
                                @error('password')
                                    <small class="text-danger mt-1 d-block"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-bold text-secondary small">Konfirmasi Password</label>
                                <div class="input-group">
                                    <span class="input-group-text text-muted"><i class="bi bi-check-circle-fill"></i></span>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password">
                                </div>
                                @error('password_confirmation')
                                    <small class="text-danger mt-1 d-block"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-grid mb-4 mt-2">
                                <button type="submit" class="btn btn-mis-blue btn-lg fw-bold">
                                    <i class="bi bi-person-plus-fill me-2"></i> Daftar Akun Baru
                                </button>
                            </div>
                            
                            <div class="text-center">
                                <p class="text-muted small mb-0">Sudah punya akun? 
                                    <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">Login di sini</a>
                                </p>
                                <a href="{{ url('/') }}" class="text-decoration-none text-muted small mt-2 d-inline-block"><i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>