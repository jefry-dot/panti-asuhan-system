@extends('layouts.admin')

@section('title', 'Dashboard Utama')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-chart-line me-2"></i>Dashboard Panti Asuhan
        </h1>
        <div>
            <span class="badge bg-success me-2">
                <i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
            </span>
            <a href="{{ route('admin.donasi.laporan') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm me-1"></i> Generate Report
            </a>
        </div>
    </div>

    {{-- Statistik Utama --}}
    <div class="row">

        {{-- Donasi Bulan Ini --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Donasi Bulan Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp {{ number_format($donasiBulanIni, 0, ',', '.') }}
                            </div>
                            <small class="text-muted">{{ $donaturBulanIni }} donatur</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hand-holding-usd fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Donasi --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Donasi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp {{ number_format($totalDonasi, 0, ',', '.') }}
                            </div>
                            <small class="text-muted">{{ $totalDonatur }} transaksi</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-donate fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Donasi Pending --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Donasi Pending
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $donasiPending }} Transaksi
                            </div>
                            <small class="text-muted">Menunggu pembayaran</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Rata-rata Donasi --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Rata-rata Donasi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp {{ number_format($rataRataDonasi, 0, ',', '.') }}
                            </div>
                            <small class="text-muted">Per transaksi</small>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Statistik Tambahan --}}
    <div class="row">
        {{-- Berita Aktif --}}
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="dashboard-card card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Berita Aktif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $jumlahBerita }} Post
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Acara Mendatang --}}
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="dashboard-card card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Acara Mendatang
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $jumlahAcara }} Acara
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Grafik dan Top Donatur --}}
    <div class="row">
        {{-- Grafik Donasi 7 Hari Terakhir --}}
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-area me-2"></i>Tren Donasi 7 Hari Terakhir
                    </h6>
                </div>
                <div class="card-body">
                    <canvas id="donasiChart" height="80"></canvas>
                </div>
            </div>
        </div>

        {{-- Top 5 Donatur Bulan Ini --}}
        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-trophy me-2"></i>Top Donatur Bulan Ini
                    </h6>
                </div>
                <div class="card-body">
                    @if($topDonatur->isEmpty())
                        <p class="text-muted text-center mb-0">Belum ada donasi bulan ini</p>
                    @else
                        <div class="list-group list-group-flush">
                            @foreach($topDonatur as $index => $donatur)
                                <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-{{ $index === 0 ? 'warning' : ($index === 1 ? 'secondary' : 'success') }} rounded-circle me-2" style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
                                            {{ $index + 1 }}
                                        </span>
                                        <div>
                                            <div class="fw-bold">{{ $donatur->donor_name }}</div>
                                            <small class="text-muted">{{ $donatur->donor_email }}</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <div class="fw-bold text-success">Rp {{ number_format($donatur->amount, 0, ',', '.') }}</div>
                                        <small class="text-muted">{{ $donatur->donation_type ?? 'Umum' }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Aktivitas Donasi Terbaru --}}
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-history me-2"></i>Aktivitas Donasi Terbaru
                    </h6>
                    <a href="{{ route('admin.donasi.index') }}" class="btn btn-sm btn-outline-primary">
                        Lihat Semua Transaksi <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body">
                    @if($donasiTerbaru->isEmpty())
                        <div class="text-center py-5">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <p class="text-muted mb-0">Belum ada donasi yang tercatat.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Donatur</th>
                                        <th>Email</th>
                                        <th>Jenis Donasi</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($donasiTerbaru as $donasi)
                                        <tr>
                                            <td><span class="badge bg-secondary">#{{ $donasi->id }}</span></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-circle bg-primary text-white me-2" style="width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                                        {{ strtoupper(substr($donasi->donor_name, 0, 1)) }}
                                                    </div>
                                                    {{ $donasi->donor_name }}
                                                </div>
                                            </td>
                                            <td>{{ $donasi->donor_email }}</td>
                                            <td>
                                                <span class="badge bg-info">
                                                    {{ $donasi->donation_type ?? 'Umum' }}
                                                </span>
                                            </td>
                                            <td class="fw-bold text-success">Rp {{ number_format($donasi->amount, 0, ',', '.') }}</td>
                                            <td>
                                                @if($donasi->status === 'success')
                                                    <span class="badge bg-success">
                                                        <i class="fas fa-check-circle"></i> Berhasil
                                                    </span>
                                                @elseif($donasi->status === 'pending')
                                                    <span class="badge bg-warning">
                                                        <i class="fas fa-clock"></i> Pending
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger">
                                                        <i class="fas fa-times-circle"></i> Gagal
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($donasi->created_at)->translatedFormat('d M Y, H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <script>
        // Data dari controller
        const donasi7Hari = @json($donasi7Hari);

        // Extract labels dan data
        const labels = donasi7Hari.map(item => item.tanggal);
        const data = donasi7Hari.map(item => item.total);

        // Create gradient
        const ctx = document.getElementById('donasiChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(78, 115, 223, 0.4)');
        gradient.addColorStop(1, 'rgba(78, 115, 223, 0.05)');

        // Chart configuration
        const donasiChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Donasi (Rp)',
                    data: data,
                    backgroundColor: gradient,
                    borderColor: 'rgba(78, 115, 223, 1)',
                    borderWidth: 3,
                    pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                family: 'Poppins',
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        titleFont: {
                            family: 'Poppins',
                            size: 14
                        },
                        bodyFont: {
                            family: 'Poppins',
                            size: 13
                        },
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            font: {
                                family: 'Poppins'
                            },
                            callback: function(value) {
                                if (value >= 1000000) {
                                    return 'Rp ' + (value / 1000000) + 'jt';
                                } else if (value >= 1000) {
                                    return 'Rp ' + (value / 1000) + 'rb';
                                }
                                return 'Rp ' + value;
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                family: 'Poppins'
                            }
                        },
                        grid: {
                            display: false
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });

        console.log("Dashboard loaded successfully!");
    </script>

    {{-- Custom Styles --}}
    <style>
        .border-left-primary {
            border-left: 4px solid #4e73df !important;
        }
        .border-left-success {
            border-left: 4px solid #1cc88a !important;
        }
        .border-left-warning {
            border-left: 4px solid #f6c23e !important;
        }
        .border-left-info {
            border-left: 4px solid #36b9cc !important;
        }
        .border-left-danger {
            border-left: 4px solid #e74a3b !important;
        }
        .border-left-secondary {
            border-left: 4px solid #858796 !important;
        }

        .dashboard-card:hover {
            transform: translateY(-3px);
            transition: all 0.3s ease;
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        .list-group-item {
            border: none;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

        .avatar-circle {
            font-size: 14px;
            flex-shrink: 0;
        }
    </style>
@endsection