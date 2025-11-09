@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Berita</h1>

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
        </div>

        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" class="form-control" 
                   value="{{ old('penulis', Auth::user()->nama ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_publikasi">Tanggal Publikasi</label>
            <input type="date" name="tanggal_publikasi" class="form-control" value="{{ old('tanggal_publikasi') }}" required>
        </div>

        <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="isi">Isi Berita</label>
            <textarea name="isi" class="form-control" rows="7">{{ old('isi') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
