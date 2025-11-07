@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="color: #16a34a !important;">Detail Berita</h1>
        <div>
            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="d-none d-sm-inline-block btn btn-warning shadow-sm">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit Berita
            </a>
            <a href="{{ route('admin.berita.index') }}" class="d-none d-sm-inline-block btn btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Detail Card -->
    <div class="card shadow mb-4 dashboard-card">
        <div class="card-header py-3" style="border-bottom: 2px solid #22c55e;">
            <h6 class="m-0 font-weight-bold" style="color: #16a34a;">
                <i class="fas fa-newspaper"></i> Informasi Berita
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Gambar/Poster Berita -->
                <div class="col-md-4 mb-4">
                    <div class="text-center">
                        @if($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" 
                                 alt="{{ $berita->judul }}" 
                                 class="img-fluid rounded shadow-sm"
                                 style="max-height: 400px; object-fit: cover;">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                 style="height: 300px;">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                            <p class="text-muted mt-2">Tidak ada gambar utama</p>
                        @endif
                    </div>
                </div>

                <!-- Detail Informasi -->
                <div class="col-md-8">
                    <h2 class="mb-3" style="color: #16a34a;">{{ $berita->judul }}</h2>
                    
                    <div class="info-item mb-4">
                        <h6 class="font-weight-bold text-primary">
                            <i class="fas fa-pencil-alt mr-2"></i>Konten Singkat
                        </h6>
                        {{-- Menampilkan konten dan memungkinkan tag HTML dasar jika ada --}}
                        <div class="ml-4">{!! Str::limit(strip_tags($berita->konten), 300, '...') !!}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <h6 class="font-weight-bold text-primary">
                                    <i class="fas fa-calendar-plus mr-2"></i>Dibuat Pada
                                </h6>
                                <p class="ml-4">{{ $berita->created_at->format('d F Y H:i') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <h6 class="font-weight-bold text-primary">
                                    <i class="fas fa-calendar-check mr-2"></i>Diupdate Pada
                                </h6>
                                <p class="ml-4">{{ $berita->updated_at->format('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="info-item mt-4">
                        <h6 class="font-weight-bold text-primary">
                            <i class="fas fa-link mr-2"></i>Slug URL
                        </h6>
                        <p class="ml-4">
                            <code>{{ $berita->slug }}</code>
                        </p>
                    </div>
                </div>
            </div>

            <hr class="mt-4 mb-4">

            <!-- Konten Lengkap -->
            <div class="row">
                <div class="col-12">
                    <h5 class="font-weight-bold mb-3" style="color: #16a34a;">Konten Lengkap</h5>
                    <div class="p-3 border rounded bg-light" style="min-height: 150px; overflow-y: auto;">
                        {!! $berita->konten !!}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row mt-4">
        <div class="col-12 text-center">
            <div class="btn-group" role="group">
                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit mr-2"></i> Edit Berita
                </a>
                <form action="{{ route('admin.berita.destroy', $berita->id) }}" 
                      method="POST" 
                      class="d-inline ml-2"
                      onsubmit="return confirm('Hapus berita ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash mr-2"></i> Hapus Berita
                    </button>
                </form>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary ml-2">
                    <i class="fas fa-list mr-2"></i> Daftar Berita
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

    .dashboard-card {
        border-radius: 12px;
        border: none;
    }
</style>
@endsection