@extends('layouts.admin')

@section('title', 'Detail Acara')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="color: #16a34a !important;">Detail Acara</h1>
        <div>
            <a href="{{ route('admin.acara.edit', $acara->id) }}" class="d-none d-sm-inline-block btn btn-warning shadow-sm">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit Acara
            </a>
            <a href="{{ route('admin.acara.index') }}" class="d-none d-sm-inline-block btn btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Detail Card -->
    <div class="card shadow mb-4 dashboard-card">
        <div class="card-header py-3" style="border-bottom: 2px solid #22c55e;">
            <h6 class="m-0 font-weight-bold" style="color: #16a34a;">
                <i class="fas fa-info-circle"></i> Informasi Acara
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Poster -->
                <div class="col-md-4 mb-4">
                    <div class="text-center">
                        @if($acara->poster)
                            <img src="{{ asset('storage/' . $acara->poster) }}" 
                                 alt="{{ $acara->nama_acara }}" 
                                 class="img-fluid rounded shadow-sm"
                                 style="max-height: 400px; object-fit: cover;">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                 style="height: 300px;">
                                <i class="fas fa-calendar-alt fa-3x text-muted"></i>
                            </div>
                            <p class="text-muted mt-2">Tidak ada poster</p>
                        @endif
                    </div>
                </div>

                <!-- Detail Information -->
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mb-3" style="color: #16a34a;">{{ $acara->nama_acara }}</h2>
                            
                            <div class="mb-4">
                                <p class="text-muted">{{ $acara->deskripsi }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <h6 class="font-weight-bold text-primary">
                                    <i class="fas fa-map-marker-alt mr-2"></i>Lokasi
                                </h6>
                                <p class="ml-4">{{ $acara->lokasi }}</p>
                            </div>

                            <div class="info-item mb-3">
                                <h6 class="font-weight-bold text-primary">
                                    <i class="fas fa-calendar mr-2"></i>Tanggal Mulai
                                </h6>
                                <p class="ml-4">{{ $acara->tanggal_mulai->format('d F Y') }}</p>
                            </div>

                            <div class="info-item mb-3">
                                <h6 class="font-weight-bold text-primary">
                                    <i class="fas fa-clock mr-2"></i>Waktu Mulai
                                </h6>
                                <p class="ml-4">{{ $acara->waktu_mulai }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <h6 class="font-weight-bold text-primary">
                                    <i class="fas fa-calendar-check mr-2"></i>Tanggal Selesai
                                </h6>
                                <p class="ml-4">{{ $acara->tanggal_selesai->format('d F Y') }}</p>
                            </div>

                            <div class="info-item mb-3">
                                <h6 class="font-weight-bold text-primary">
                                    <i class="fas fa-clock mr-2"></i>Waktu Selesai
                                </h6>
                                <p class="ml-4">{{ $acara->waktu_selesai }}</p>
                            </div>

                            <div class="info-item mb-3">
                                <h6 class="font-weight-bold text-primary">
                                    <i class="fas fa-users mr-2"></i>Kuota Peserta
                                </h6>
                                <p class="ml-4">
                                    {{ $acara->kuota_peserta ? $acara->kuota_peserta . ' orang' : 'Tidak terbatas' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="info-item">
                                <h6 class="font-weight-bold text-primary">
                                    <i class="fas fa-link mr-2"></i>Slug URL
                                </h6>
                                <p class="ml-4">
                                    <code>{{ $acara->slug }}</code>
                                </p>
                            </div>

                            <div class="info-item mt-3">
                                <h6 class="font-weight-bold text-primary">
                                    <i class="fas fa-calendar-plus mr-2"></i>Dibuat Pada
                                </h6>
                                <p class="ml-4">{{ $acara->created_at->format('d F Y H:i') }}</p>
                            </div>

                            <div class="info-item mt-3">
                                <h6 class="font-weight-bold text-primary">
                                    <i class="fas fa-calendar-check mr-2"></i>Diupdate Pada
                                </h6>
                                <p class="ml-4">{{ $acara->updated_at->format('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row mt-4">
        <div class="col-12 text-center">
            <div class="btn-group" role="group">
                <a href="{{ route('admin.acara.edit', $acara->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit mr-2"></i> Edit Acara
                </a>
                <form action="{{ route('admin.acara.destroy', $acara->id) }}" 
                      method="POST" 
                      class="d-inline ml-2"
                      onsubmit="return confirm('Hapus acara ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash mr-2"></i> Hapus Acara
                    </button>
                </form>
                <a href="{{ route('admin.acara.index') }}" class="btn btn-secondary ml-2">
                    <i class="fas fa-list mr-2"></i> Daftar Acara
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .info-item {
        padding: 10px;
        border-left: 3px solid #22c55e;
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        border-radius: 0 8px 8px 0;
    }
    
    .info-item h6 {
        margin-bottom: 5px;
    }
</style>
@endsection