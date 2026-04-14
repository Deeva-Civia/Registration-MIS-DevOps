<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Orang Tua | MIS Registration</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; }
        .bg-mis-navy { background-color: #003366 !important; color: white; }
        .text-mis-navy { color: #003366 !important; }
        .bg-mis-yellow { background-color: #FFD100 !important; color: #003366; }

        .navbar-custom { background-color: white; border-bottom: 1px solid #eaeaea; }
        .offcanvas-custom { background-color: #003366; color: white; width: 280px !important; }
        .nav-link-custom { color: rgba(255, 255, 255, 0.75); padding: 12px 20px; border-radius: 8px; margin-bottom: 8px; font-weight: 500; transition: all 0.2s ease; }
        .nav-link-custom:hover, .nav-link-custom.active { color: white; background-color: rgba(255, 255, 255, 0.1); }

        .student-card { border: none; border-radius: 16px; background: white; box-shadow: 0 4px 15px rgba(0,0,0,0.03); transition: transform 0.2s ease, box-shadow 0.2s ease; overflow: hidden; }
        .student-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
        
        .badge-status { font-size: 0.8rem; font-weight: 600; padding: 0.4em 0.8em; border-radius: 6px; }
        .status-pending { background-color: #fdf5e6; color: #b8860b; border: 1px solid #faebd7; }
        .status-approved { background-color: #e8f5e9; color: #2e7d32; border: 1px solid #c8e6c9; }
        .status-rejected { background-color: #fce4e4; color: #c62828; border: 1px solid #f8bbd0; }

        .btn-register-new { background-color: #003366; color: white; border-radius: 10px; padding: 12px 24px; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(0, 51, 102, 0.15); }
        .btn-register-new:hover { background-color: #002244; color: white; box-shadow: 0 6px 15px rgba(0, 51, 102, 0.25); transform: translateY(-2px); }

        .avatar-circle { width: 55px; height: 55px; background-color: #f8f9fa; border: 1px solid #eaeaea; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: #adb5bd; }
        .avatar-approved { background-color: #003366; color: white; border: none; }
        .avatar-rejected { background-color: #CC0000; color: white; border: none; }
    </style>
</head>
<body>

    <div class="offcanvas offcanvas-start offcanvas-custom" tabindex="-1" id="sidebarMenu">
        <div class="offcanvas-header border-bottom border-secondary py-3">
            <h5 class="offcanvas-title fw-bold text-white"><i class="bi bi-shield-check text-warning me-2"></i>MIS Portal</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body py-4">
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link nav-link-custom active" href="{{ route('parent.dashboard') }}"><i class="bi bi-house-door me-3"></i> Dashboard Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('parent.register.student') }}"><i class="bi bi-person-plus me-3"></i> Daftarkan Siswa Baru</a>
                </li>
            </ul>
        </div>
        <div class="offcanvas-footer border-top border-secondary p-3">
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn btn-outline-light w-100 rounded-3 opacity-75"><i class="bi bi-box-arrow-right me-2"></i>Keluar Sistem</button>
            </form>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-custom sticky-top py-2">
        <div class="container">
            <button class="btn btn-light border-0 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
                <i class="bi bi-list fs-4 text-dark"></i>
            </button>
            
            <span class="navbar-brand fw-bold text-mis-navy mb-0 h1 d-none d-sm-block">Dashboard Orang Tua</span>

            <div class="d-flex align-items-center ms-auto">
                <div class="text-end me-3 d-none d-sm-block">
                    <p class="mb-0 fw-semibold text-dark">{{ Auth::user()->name ?? 'Bapak/Ibu' }}</p>
                    <p class="mb-0 small text-muted">Orang Tua / Wali</p>
                </div>
                <div class="bg-light rounded-circle p-2 border">
                    <i class="bi bi-person text-secondary fs-4"></i>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4 shadow-sm border-0" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class="row mb-5 align-items-center">
            <div class="col-md-8">
                <h3 class="fw-bold text-mis-navy mb-2">Selamat datang, {{ Auth::user()->name ?? 'Bapak/Ibu' }}!</h3>
                <p class="text-muted">Pantau status pendaftaran anak Anda atau daftarkan siswa baru untuk tahun ajaran 2026/2027.</p>
            </div>
            <div class="col-md-4 text-md-end mt-4 mt-md-0">
                <a href="{{ route('parent.register.student') }}" class="btn btn-register-new fw-bold text-decoration-none">
                    <i class="bi bi-plus-circle-fill me-2 text-warning"></i>Daftarkan Siswa Baru
                </a>
            </div>
        </div>

        <h6 class="fw-bold text-secondary mb-3 text-uppercase tracking-wide small">Daftar Siswa Anda</h6>

        <div class="row g-4">
            
            @forelse($registrations as $student)
                <div class="col-md-6 col-lg-4">
                    <div class="card student-card h-100 p-0">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-4">
                                
                                <div class="avatar-circle 
                                    {{ $student->status == 'approved' ? 'avatar-approved' : '' }}
                                    {{ $student->status == 'rejected' ? 'avatar-rejected' : '' }}">
                                    @if($student->status == 'approved')
                                        <i class="bi bi-person-check-fill"></i>
                                    @elseif($student->status == 'rejected')
                                        <i class="bi bi-person-x-fill"></i>
                                    @else
                                        <i class="bi bi-person-fill"></i>
                                    @endif
                                </div>
                                
                                @if($student->status == 'pending')
                                    <span class="badge-status status-pending"><i class="bi bi-clock-history me-1"></i> Menunggu Verifikasi</span>
                                @elseif($student->status == 'approved')
                                    <span class="badge-status status-approved"><i class="bi bi-check-circle-fill me-1"></i> Diterima</span>
                                @else
                                    <span class="badge-status status-rejected"><i class="bi bi-x-circle-fill me-1"></i> Ditolak</span>
                                @endif

                            </div>
                            
                            <h5 class="fw-bold text-dark mb-1">{{ $student->student_name }}</h5>
                            <p class="text-muted font-monospace small mb-4">NIK: {{ $student->nik }}</p>
                            
                            <div class="bg-light p-3 rounded-4 mb-0 border">
                                <div class="row text-center">
                                    <div class="col-6 border-end">
                                        <span class="d-block text-muted small mb-1">Section</span>
                                        <span class="fw-bold text-mis-navy">{{ $student->section }}</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="d-block text-muted small mb-1">Grade</span>
                                        <span class="fw-bold text-mis-navy">{{ $student->grade }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-footer bg-white border-top-0 px-4 pb-4 pt-0">
                            @if($student->status == 'approved')
                                <button class="btn btn-outline-success w-100 btn-sm rounded-3 fw-medium"><i class="bi bi-envelope-paper-heart me-2"></i>Lihat Surat Penerimaan</button>
                            @else
                                <button class="btn btn-light border text-secondary w-100 btn-sm rounded-3 fw-medium hover-shadow"><i class="bi bi-printer me-2"></i>Cetak Bukti Daftar</button>
                            @endif
                        </div>
                    </div>
                </div>
            
            @empty
                <div class="col-12 text-center py-5 bg-white rounded-4 border shadow-sm mt-3">
                    <i class="bi bi-folder-x display-1 text-muted opacity-50 mb-3 d-block"></i>
                    <h5 class="fw-bold text-dark">Belum Ada Data Siswa</h5>
                    <p class="text-muted mb-4">Anda belum mendaftarkan anak satupun untuk tahun ajaran ini.</p>
                    <a href="{{ route('parent.register.student') }}" class="btn btn-mis-navy rounded-pill px-4 py-2">
                        <i class="bi bi-plus-circle me-2"></i>Mulai Pendaftaran
                    </a>
                </div>
            @endforelse
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>