@extends('layouts.public')

@section('title', $acara->judul)

@section('content')
    <article class="card shadow-sm p-4">
        <h2>{{ $acara->judul }}</h2>
        <img src="{{ asset('storage/' . $acara->gambar) }}" class="img-fluid my-3 rounded">
        <p><strong>Tanggal:</strong> {{ $acara->tanggal }}</p>
        <p>{!! nl2br(e($acara->deskripsi)) !!}</p>
        <a href="{{ route('public.acara') }}" class="btn btn-secondary mt-3">← Kembali ke daftar acara</a>
    </article>
@endsection