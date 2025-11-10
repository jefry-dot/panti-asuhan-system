@extends('layouts.public')

@section('title', 'Acara')

@section('content')
    <h2 class="mb-4 text-success">Acara Yayasan</h2>

    <div class="row">
        @foreach ($acara as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($item->deskripsi, 100) }}</p>
                        <a href="{{ route('public.acara.show', $item->slug) }}" class="btn btn-outline-primary btn-sm">Lihat
                            Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection