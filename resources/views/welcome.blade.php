<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerimaan Siswa Baru | Manado Independent School</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/images/MIS.jpg') center/cover no-repeat;
            padding: 100px 0;
            min-height: 80vh;
            display: flex;
            align-items: center;
            color: white; 
        }

        .navbar-brand {
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Warna khusus tema MIS */
        .bg-mis-yellow {
            background-color: #FFD100; 
            border: none;
        }
        .text-mis-navy {
            color: #003366 !important; 
        }
        .btn-mis-red {
            background-color: #CC0000; 
            color: white;
            border: none;
        }
        .btn-mis-red:hover {
            background-color: #990000;
            color: white;
        }

        .btn-login-custom:hover {
            background-color: white !important; 
            color: #003366 !important; 
            border-color: white !important;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #003366;">
        <div class="container">
            <a class="navbar-brand" href="/">MIS Registration</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item align-self-center">
                        <a class="nav-link active" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light ms-2 px-3 btn-login-custom" href="/login">Login Portal</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container text-center col-lg-8">
            <h1 class="display-4 fw-bold mb-4">Masa Depan Cerah Dimulai dari Sini</h1>
            <p class="lead mb-5">Portal Pendaftaran Manado Independent School. <br> Bergabunglah dengan komunitas pendidikan bertaraf internasional terbaik di Sulawesi Utara.</p>
            
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a href="/register" class="btn btn-mis-red btn-lg px-4 gap-3 fw-bold">Daftar Sekarang</a>
                <a href="#info" class="btn btn-outline-light btn-lg px-4">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </section>

    <section id="info" class="py-5">
        <div class="container py-4">
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <div class="p-4 rounded-3 shadow-sm bg-mis-yellow h-100">
                        <h3 class="h5 fw-bold text-mis-navy">K - 12 Education</h3>
                        <p class="mb-0 text-mis-navy">Sistem pendidikan berkelanjutan dari TK hingga SMA dengan kurikulum berstandar global.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="p-4 rounded-3 shadow-sm bg-mis-yellow h-100">
                        <h3 class="h5 fw-bold text-mis-navy">Fasilitas Modern</h3>
                        <p class="mb-0 text-mis-navy">Didukung oleh laboratorium digital dan infrastruktur teknologi terkini.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="p-4 rounded-3 shadow-sm bg-mis-yellow h-100">
                        <h3 class="h5 fw-bold text-mis-navy">Keamanan Data Terjamin</h3>
                        <p class="mb-0 text-mis-navy">Sistem pendaftaran yang diaudit secara ketat untuk melindungi privasi data siswa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer text-center">
        <div class="container">
            <span class="text-muted">© 2026 Manado Independent School. All rights reserved. (DevOps Class Demo Project)</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>