@extends('layouts.admin')

@section('title', 'Edit Acara')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Acara</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.acara.update', $acara->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="judul" class="form-label">Judul Acara *</label>
                        <input type="text" name="judul" id="judul" class="form-control"
                            value="{{ old('judul', $acara->judul) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="lokasi" class="form-label">Lokasi *</label>
                        <input type="text" name="lokasi" id="lokasi" class="form-control"
                            value="{{ old('lokasi', $acara->lokasi) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="tanggal" class="form-label">Tanggal *</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control"
                            value="{{ old('tanggal', $acara->tanggal ? $acara->tanggal->format('Y-m-d') : '') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="waktu_mulai" class="form-label">Waktu Mulai *</label>
                        <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control"
                            value="{{ old('waktu_mulai', $acara->waktu_mulai) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="waktu_selesai" class="form-label">Waktu Selesai *</label>
                        <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control"
                            value="{{ old('waktu_selesai', $acara->waktu_selesai) }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi *</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required>{{ old('deskripsi', $acara->deskripsi) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Poster Acara</label><br>
                    @if ($acara->gambar)
                        <img src="{{ asset('storage/' . $acara->gambar) }}" width="180" class="rounded mb-2">
                    @endif
                    <input type="file" name="gambar" id="gambar" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                </div>

                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('admin.acara.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Perbarui Acara</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
