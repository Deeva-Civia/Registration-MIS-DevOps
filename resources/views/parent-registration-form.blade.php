<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa | MIS</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        
        /* Tema Warna MIS */
        .bg-mis-navy { background-color: #003366 !important; color: white; }
        .text-mis-navy { color: #003366 !important; }

        /* Navbar & Sidebar */
        .navbar-custom {
            background-color: white;
            border-bottom: 1px solid #eaeaea;
        }
        .offcanvas-custom {
            background-color: #003366;
            color: white;
            width: 280px !important;
        }
        .nav-link-custom {
            color: rgba(255, 255, 255, 0.75);
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .nav-link-custom:hover, .nav-link-custom.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Form Card Clean Design */
        .form-card {
            border: 1px solid #eaeaea;
            border-radius: 16px;
            background: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            overflow: hidden;
        }
        
        /* Custom Input & Select */
        .form-label {
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
        }
        .form-control, .form-select {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 0.6rem 1rem;
            box-shadow: none;
        }
        .form-control:focus, .form-select:focus {
            border-color: #003366;
            box-shadow: 0 0 0 0.25rem rgba(0, 51, 102, 0.1);
        }

        /* Tombol Submit */
        .btn-submit {
            background-color: #003366;
            color: white;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #002244;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 51, 102, 0.2);
        }
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
                    <a class="nav-link nav-link-custom" href="/parent/dashboard"><i class="bi bi-house-door me-3"></i> Dashboard Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom active" href="#"><i class="bi bi-person-plus me-3"></i> Daftarkan Siswa Baru</a>
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
            <span class="navbar-brand fw-bold text-mis-navy mb-0 h1 d-none d-sm-block">Formulir Pendaftaran</span>
        </div>
    </nav>

    <div class="container py-5">
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="d-flex align-items-center mb-4">
                    <a href="/parent/dashboard" class="btn btn-light border me-3 rounded-circle" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <div>
                        <h4 class="fw-bold text-mis-navy mb-0">Data Calon Siswa</h4>
                        <p class="text-muted small mb-0">Isi formulir di bawah ini dengan data yang valid dan sesuai dokumen resmi.</p>
                    </div>
                </div>

                <div class="card form-card">
                    <div class="card-body p-4 p-md-5">
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show mb-4 border-0" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show mb-4 border-0" role="alert">
                                <i class="bi bi-exclamation-circle-fill me-2"></i> <strong>Mohon periksa kembali data Anda:</strong>
                                <ul class="mb-0 mt-2 small">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        <form action="{{ route('parent.store.student') }}" method="POST">
                            @csrf

                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <label for="student_name" class="form-label">Nama Lengkap Siswa <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="student_name" name="student_name" required placeholder="Sesuai Akta Kelahiran">
                                </div>
                                <div class="col-md-6">
                                    <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nik" name="nik" maxlength="16" required placeholder="16 Digit NIK Siswa">
                                </div>
                            </div>

                            <div class="row g-4 mb-4">
                                <div class="col-md-4">
                                    <label for="date_of_birth" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                </div>
                                <div class="col-md-8">
                                    <label for="address" class="form-label">Alamat Domisili <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address" required placeholder="Nama Jalan, Kelurahan, Kecamatan">
                                </div>
                            </div>

                            <hr class="my-4 border-light">
                            <h6 class="fw-bold text-mis-navy mb-3"><i class="bi bi-mortarboard me-2"></i>Pilihan Jenjang Pendidikan</h6>

                            <div class="row g-4 mb-5">
                                <div class="col-md-6">
                                    <label for="section" class="form-label">Section (Jenjang) <span class="text-danger">*</span></label>
                                    <select class="form-select" id="section" name="section" required>
                                        <option value="" selected disabled>Pilih Jenjang Pendidikan...</option>
                                        <option value="Kindergarten">Kindergarten (TK)</option>
                                        <option value="Elementary">Elementary (SD)</option>
                                        <option value="Middle School">Middle School (SMP)</option>
                                        <option value="High School">High School (SMA)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="grade" class="form-label">Tingkat Kelas (Grade) <span class="text-danger">*</span></label>
                                    <select class="form-select bg-light" id="grade" name="grade" required disabled>
                                        <option value="" selected disabled>Pilih Section Terlebih Dahulu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a href="/parent/dashboard" class="btn btn-light border px-4 fw-medium">Batal</a>
                                <button type="submit" class="btn btn-submit"><i class="bi bi-save me-2"></i>Simpan & Daftarkan Siswa</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Data relasi antara Section dan Grade
        const gradeData = {
            'Kindergarten': ['K'],
            'Elementary': ['1', '2', '3', '4', '5', '6'],
            'Middle School': ['7', '8', '9'],
            'High School': ['10', '11', '12']
        };

        const sectionSelect = document.getElementById('section');
        const gradeSelect = document.getElementById('grade');

        // Mendengarkan perubahan pada dropdown Section
        sectionSelect.addEventListener('change', function() {
            const selectedSection = this.value;

            // Kosongkan opsi Grade saat ini
            gradeSelect.innerHTML = '<option value="" selected disabled>Pilih Tingkat Kelas (Grade)...</option>';

            // Jika ada section yang dipilih
            if (selectedSection && gradeData[selectedSection]) {
                // Aktifkan dropdown Grade (hapus atribut disabled)
                gradeSelect.disabled = false;
                gradeSelect.classList.remove('bg-light');

                // Looping data array untuk membuat opsi HTML
                gradeData[selectedSection].forEach(function(grade) {
                    const option = document.createElement('option');
                    option.value = grade;
                    // Format tampilan teksnya
                    option.textContent = grade === 'K' ? 'Grade K' : 'Grade ' + grade;
                    gradeSelect.appendChild(option);
                });
            } else {
                // Jika dikosongkan, matikan kembali dropdown grade
                gradeSelect.disabled = true;
                gradeSelect.classList.add('bg-light');
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>