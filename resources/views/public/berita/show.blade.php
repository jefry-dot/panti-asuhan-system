@extends('layouts.public')

@section('title', $berita->judul)

@section('content')
    <article class="card shadow-sm p-4">
        <h2>{{ $berita->judul }}</h2>
        <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid my-3 rounded">
        <p>{!! nl2br(e($berita->konten)) !!}</p>
        <a href="{{ route('public.berita') }}" class="btn btn-secondary mt-3">← Kembali ke daftar berita</a>
    </article>
@endsection