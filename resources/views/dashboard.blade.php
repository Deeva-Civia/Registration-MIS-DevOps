<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | MIS Registration</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; }
        .bg-mis-navy { background-color: #003366 !important; color: white; }
        .text-mis-navy { color: #003366 !important; }
        .bg-mis-red { background-color: #CC0000 !important; color: white; }
        .text-mis-red { color: #CC0000 !important; }
        .bg-mis-yellow { background-color: #FFD100 !important; color: #003366; }
        
        .kpi-card { border: 1px solid #eaeaea; border-radius: 12px; background: white; transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .kpi-card:hover { transform: translateY(-3px); box-shadow: 0 8px 15px rgba(0,0,0,0.03); }
        .icon-box-clean { width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 10px; font-size: 1.5rem; background-color: #f4f6f9; }
        
        .table-custom { background: white; border-radius: 12px; border: 1px solid #eaeaea; }
        .table-custom th { background-color: #fdfdfd; color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.5px; border-bottom: 2px solid #eaeaea; vertical-align: middle; }
        .table-custom td { vertical-align: middle; border-bottom: 1px solid #f0f0f0; }
        
        .badge-soft { padding: 0.4em 0.8em; font-weight: 600; border-radius: 6px; font-size: 0.85rem; }
        .badge-soft-pending { background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; }
        .badge-soft-approved { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .badge-soft-rejected { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        
        .badge-section { font-size: 0.8rem; font-weight: 500; padding: 0.35em 0.65em; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-mis-navy border-bottom border-secondary">
        <div class="container-fluid px-4 py-1">
            <a class="navbar-brand fw-bold" href="{{ url('admin/dashboard') }}"><i class="bi bi-shield-check text-warning me-2"></i>MIS Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item me-4 text-light opacity-75 small">
                        <i class="bi bi-calendar-event me-1"></i> Tahun Ajaran 2026/2027
                    </li>
                    <li class="nav-item me-3 text-light fw-medium border-start border-secondary ps-3">
                        <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name ?? 'Admin' }}
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light rounded-pill px-3 opacity-75"><i class="bi bi-box-arrow-right me-1"></i>Keluar</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4 py-4">
        
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h4 class="fw-bold text-mis-navy mb-0">Dashboard Overview</h4>
                <p class="text-muted small mb-0 mt-1">Ringkasan pendaftaran siswa baru secara *real-time*.</p>
            </div>
            <button class="btn btn-outline-secondary btn-sm rounded-3"><i class="bi bi-download me-2"></i>Unduh Laporan CSV</button>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card kpi-card h-100 p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1 fw-semibold small">Total Pendaftar</p>
                            <h3 class="fw-bold text-dark mb-0">{{ $total }}</h3> 
                        </div>
                        <div class="icon-box-clean text-mis-navy"><i class="bi bi-people"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card kpi-card h-100 p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1 fw-semibold small">Status Pending</p>
                            <h3 class="fw-bold text-warning mb-0">{{ $pending }}</h3>
                        </div>
                        <div class="icon-box-clean text-warning"><i class="bi bi-clock-history"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card kpi-card h-100 p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1 fw-semibold small">Siswa Diterima</p>
                            <h3 class="fw-bold text-success mb-0">{{ $approved }}</h3>
                        </div>
                        <div class="icon-box-clean text-success"><i class="bi bi-check2-circle"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card kpi-card h-100 p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1 fw-semibold small">Ditolak / Batal</p>
                            <h3 class="fw-bold text-mis-red mb-0">{{ $rejected }}</h3>
                        </div>
                        <div class="icon-box-clean text-mis-red"><i class="bi bi-x-circle"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 border border-light">
                    <div class="card-header bg-white border-0 pt-4 pb-2">
                        <h6 class="fw-bold text-dark mb-0"><i class="bi bi-pie-chart text-muted me-2"></i>Pendaftar per Jenjang</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="sectionChart" style="max-height: 280px;"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-header bg-white border-bottom border-light pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold text-dark mb-0"><i class="bi bi-table text-muted me-2"></i>Pendaftaran Terbaru</h6>
                        <a href="#" class="text-decoration-none text-primary small fw-semibold">Lihat Semua Data &rarr;</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-custom mb-0">
                                <thead>
                                    <tr>
                                        <th class="ps-4">Nama Siswa</th>
                                        <th>Section</th>
                                        <th>Grade</th>
                                        <th>Status</th>
                                        <th class="text-end pe-4">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($latestRegistrations as $reg)
                                        <tr>
                                            <td class="ps-4 fw-bold text-dark">{{ $reg->student_name }}</td>
                                            
                                            <td>
                                                @php
                                                    $sectionClass = match($reg->section) {
                                                        'Kindergarten' => 'bg-secondary',
                                                        'Elementary' => 'bg-mis-red',
                                                        'Middle School' => 'bg-mis-navy',
                                                        'High School' => 'bg-warning text-dark',
                                                        default => 'bg-primary'
                                                    };
                                                @endphp
                                                <span class="badge badge-section {{ $sectionClass }}">{{ $reg->section }}</span>
                                            </td>
                                            
                                            <td class="text-muted fw-semibold">{{ $reg->grade }}</td>
                                            
                                            <td>
                                                @if($reg->status == 'pending')
                                                    <span class="badge-soft badge-soft-pending"><i class="bi bi-circle-fill small me-1"></i>Pending</span>
                                                @elseif($reg->status == 'approved')
                                                    <span class="badge-soft badge-soft-approved"><i class="bi bi-check-circle-fill small me-1"></i>Approved</span>
                                                @else
                                                    <span class="badge-soft badge-soft-rejected"><i class="bi bi-x-circle-fill small me-1"></i>Rejected</span>
                                                @endif
                                            </td>
                                            
                                            <td class="text-end pe-4">
                                                @if($reg->status == 'pending')
                                                    <button class="btn btn-sm btn-light border text-success" title="Approve"><i class="bi bi-check-lg"></i></button>
                                                    <button class="btn btn-sm btn-light border text-danger" title="Reject"><i class="bi bi-x-lg"></i></button>
                                                @else
                                                    <button class="btn btn-sm btn-light border text-secondary" title="View"><i class="bi bi-eye"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted">Belum ada data pendaftaran masuk.</td>
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

    <script>
        const ctx = document.getElementById('sectionChart').getContext('2d');
        const sectionChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Kindergarten', 'Elementary', 'Middle School', 'High School'],
                datasets: [{
                    data: @json($chartData),
                    backgroundColor: [
                        '#6c757d', // Kindergarten (Abu-abu)
                        '#CC0000', // Elementary (Merah)
                        '#003366', // Middle School (Navy)
                        '#FFD100'  // High School (Kuning)
                    ],
                    borderWidth: 2,
                    borderColor: '#ffffff', 
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%', 
                plugins: {
                    legend: { 
                        position: 'bottom',
                        labels: { usePointStyle: true, padding: 20 }
                    }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>