@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Berita</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="judul" class="form-label">Judul *</label>
                            <input type="text" name="judul" id="judul" class="form-control"
                                value="{{ old('judul', $berita->judul) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="penulis" class="form-label">Penulis *</label>
                            <input type="text" name="penulis" id="penulis" class="form-control"
                                value="{{ old('penulis', $berita->penulis) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_publikasi" class="form-label">Tanggal Publikasi *</label>
                        <input type="date" name="tanggal_publikasi" id="tanggal_publikasi" class="form-control"
                            value="{{ old('tanggal_publikasi', optional($berita->tanggal_publikasi)->format('Y-m-d')) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Berita</label><br>
                        @if ($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" width="180" class="rounded mb-2">
                        @endif
                        <input type="file" name="gambar" id="gambar" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                    </div>

                    <div class="mb-3">
                        <label for="konten" class="form-label">Isi Berita *</label>
                        <textarea name="konten" id="konten" rows="7" class="form-control"
                            required>{{ old('konten', $berita->konten) }}</textarea>
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Perbarui Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection