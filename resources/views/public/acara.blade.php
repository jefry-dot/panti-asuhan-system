@extends('public.layout')

@section('title', 'Acara - Panti Asuhan')

@section('content')
<!-- Floating Background Shapes -->
<div class="floating-shapes">
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
</div>

<div class="container mt-5 pt-4">
    <!-- Header Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 font-weight-bold mb-3" style="color: #16a34a;">Acara Mendatang</h1>
            <p class="lead text-muted">Ikuti kegiatan dan acara terbaru dari Panti Asuhan Kami</p>
            <div class="divider mx-auto" style="width: 100px;"></div>
        </div>
    </div>

    <!-- Acara List -->
    <div class="row">
        @forelse($acara as $item)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm dashboard-card">
                @if($item->poster)
                    <img src="{{ asset('storage/' . $item->poster) }}" 
                         class="card-img-top" 
                         alt="{{ $item->nama_acara }}" 
                         style="height: 250px; object-fit: cover;">
                @else
                    <div class="card-img-top d-flex align-items-center justify-content-center bg-light" 
                         style="height: 250px;">
                        <i class="fas fa-calendar-alt fa-3x text-muted"></i>
                    </div>
                @endif
                
                <div class="card-body d-flex flex-column">
                    <div class="mb-3">
                        <h5 class="card-title font-weight-bold" style="color: #16a34a;">
                            {{ Str::limit($item->nama_acara, 60) }}
                        </h5>
                        <p class="card-text text-muted">
                            {{ Str::limit(strip_tags($item->deskripsi), 120) }}
                        </p>
                    </div>
                    
                    <div class="mt-auto">
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-map-marker-alt text-danger mr-2"></i>
                                <small class="text-muted">{{ Str::limit($item->lokasi, 30) }}</small>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar text-success mr-2"></i>
                                <small class="text-muted">
                                    {{ $item->tanggal_mulai->format('d M Y') }} - {{ $item->tanggal_selesai->format('d M Y') }}
                                </small>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-clock text-success mr-2"></i>
                                <small class="text-muted">
                                    {{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}
                                </small>
                            </div>
                        </div>

                        @if($item->kuota_peserta)
                        <div class="mb-3">
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar" 
                                     style="width: 60%; background: linear-gradient(90deg, #22c55e 0%, #16a34a 100%);">
                                </div>
                            </div>
                            <small class="text-muted">
                                Kuota: {{ $item->kuota_peserta }} peserta
                            </small>
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="card-footer bg-transparent border-top-0">
                    <a href="#" class="btn btn-primary btn-block py-2">
                        <i class="fas fa-info-circle mr-2"></i> Detail Acara
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card shadow-sm dashboard-card text-center py-5">
                <div class="card-body">
                    <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">Belum Ada Acara</h4>
                    <p class="text-muted">Tidak ada acara yang sedang berlangsung atau akan datang.</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($acara->hasPages())
    <div class="row mt-5">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <nav>
                    {{ $acara->links() }}
                </nav>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
    .card {
        transition: all 0.3s ease;
        border: 1px solid rgba(187, 247, 208, 0.4);
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(34, 197, 94, 0.15);
    }
    
    .pagination .page-link {
        color: #16a34a;
        border: 1px solid #dcfce7;
    }
    
    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
        border-color: #16a34a;
    }
</style>
@endsection