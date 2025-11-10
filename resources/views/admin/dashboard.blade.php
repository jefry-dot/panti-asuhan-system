@extends('layouts.admin')

@section('title', 'Dashboard Utama')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Panti Asuhan</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <div class="row">

        {{-- Donasi Bulan Ini --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card card h-100 py-2 stat-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Donasi (Bulan Ini)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp {{ number_format($donasiBulanIni, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Berita Aktif --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card card h-100 py-2 stat-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Berita Aktif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $jumlahBerita }} Post
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Acara Mendatang --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card card h-100 py-2 stat-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Acara Mendatang
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $jumlahAcara }} Acara
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Aktivitas Donasi Terbaru --}}
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="table-card card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Aktivitas Donasi Terbaru</h6>
                    <a href="{{ route('admin.donasi.index') }}" class="btn btn-sm btn-outline-primary">
                        Lihat Semua Transaksi &rarr;
                    </a>
                </div>
                <div class="card-body">
                    @php
                        $donasiTerbaru = \App\Models\Donasi::latest()->take(5)->get();
                    @endphp

                    @if($donasiTerbaru->isEmpty())
                        <p class="text-muted mb-0">Belum ada donasi yang tercatat.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>Nama Donatur</th>
                                        <th>Jenis Donasi</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($donasiTerbaru as $donasi)
                                        <tr>
                                            <td>{{ $donasi->donor_name ?? '-' }}</td>
                                            <td>{{ $donasi->donation_type ?? '-' }}</td>
                                            <td>Rp {{ number_format($donasi->jumlah ?? $donasi->amount, 0, ',', '.') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($donasi->created_at)->translatedFormat('d M Y') }}</td>
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
    <script>
        console.log("Dashboard loaded successfully!");
    </script>
@endsection