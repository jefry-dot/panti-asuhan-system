@extends('public.layout')

@section('title', 'Berita - Panti Asuhan')

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
            <h1 class="display-4 font-weight-bold mb-3" style="color: #16a34a;">Berita Terbaru</h1>
            <p class="lead text-muted">Ikuti perkembangan dan kegiatan terbaru dari Panti Asuhan Kami</p>
            <div class="divider mx-auto" style="width: 100px;"></div>
        </div>
    </div>

    <!-- Berita List -->
    <div class="row">
        @forelse($berita as $item)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm dashboard-card">
                @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" 
                         class="card-img-top" 
                         alt="{{ $item->judul }}" 
                         style="height: 250px; object-fit: cover;">
                @else
                    <div class="card-img-top d-flex align-items-center justify-content-center bg-light" 
                         style="height: 250px;">
                        <i class="fas fa-newspaper fa-3x text-muted"></i>
                    </div>
                @endif
                
                <div class="card-body d-flex flex-column">
                    <div class="mb-3">
                        <h5 class="card-title font-weight-bold" style="color: #16a34a;">
                            {{ Str::limit($item->judul, 60) }}
                        </h5>
                        <p class="card-text text-muted">
                            {{ Str::limit(strip_tags($item->konten), 120) }}
                        </p>
                    </div>
                    
                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center text-muted small mb-3">
                            <span>
                                <i class="fas fa-user text-success mr-1"></i> 
                                {{ $item->penulis }}
                            </span>
                            <span>
                                <i class="fas fa-calendar text-success mr-1"></i> 
                                {{ $item->tanggal_publikasi->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-transparent border-top-0">
                    <a href="#" class="btn btn-primary btn-block py-2">
                        <i class="fas fa-book-reader mr-2"></i> Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card shadow-sm dashboard-card text-center py-5">
                <div class="card-body">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">Belum Ada Berita</h4>
                    <p class="text-muted">Silahkan kembali lagi nanti untuk melihat berita terbaru.</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($berita->hasPages())
    <div class="row mt-5">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <nav>
                    {{ $berita->links() }}
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