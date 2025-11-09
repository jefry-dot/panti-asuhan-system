@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Detail Berita</h1>

    <div class="card shadow">
        <div class="card-body">
            <h3 class="mb-3">{{ $berita->judul }}</h3>
            <p class="text-muted">
                <i class="fas fa-user"></i> {{ $berita->penulis ?? 'Tidak diketahui' }} |
                <i class="fas fa-calendar"></i> {{ optional($berita->tanggal_publikasi)->format('d F Y') ?? '-' }}
            </p>

            @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid rounded mb-4" alt="Thumbnail">
            @endif

            <div>{!! $berita->konten !!}</div>

            <hr>

            <p><strong>Dibuat:</strong> {{ $berita->created_at->timezone('Asia/Jakarta')->format('d F Y H:i') }}</p>
            <p><strong>Diperbarui:</strong> {{ $berita->updated_at->timezone('Asia/Jakarta')->format('d F Y H:i') }}</p>

            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
