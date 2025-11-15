@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Detail Pesan</h1>

        <div class="card-body">
            <p><strong>Nama:</strong> {{ $message->nama }}</p>
            <p><strong>Nomor Telepon:</strong> {{ $message->telepon }}</p>
            <p><strong>Dikirim Pada:</strong> {{ $message->created_at->format('d M Y H:i') }}</p>
            <hr>
            <p>{{ $message->pesan }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('admin.pesan.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <form action="{{ route('admin.pesan.destroy', $message->id) }}" method="POST"
                onsubmit="return confirm('Yakin hapus pesan ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> Hapus
                </button>
            </form>
        </div>
    </div>
    </div>
@endsection