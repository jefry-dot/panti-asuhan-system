@extends('layouts.public')

@section('title', 'Berita')

@section('content')
    <h2 class="mb-4 text-success">Berita Terbaru</h2>
    <div class="row">
        @foreach ($berita as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($item->deskripsi, 100) }}</p>
                        <a href="{{ route('public.berita.show', $item->slug) }}" class="btn btn-outline-primary btn-sm">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection