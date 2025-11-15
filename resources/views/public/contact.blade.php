@extends('layouts.public')

@section('title', 'Kontak Kami')

@section('content')

    <div class="container" style="max-width: 650px;">

        {{-- Judul --}}
        <div class="text-center mb-4">
            <h1 class="fw-bold text-success">Hubungi Kami</h1>
            <p class="text-muted">Silakan kirimkan pesan, pertanyaan, atau kebutuhan Anda melalui formulir berikut.</p>
        </div>

        {{-- Alert Success --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Card Form --}}
        <div class="card-glass p-4 shadow-sm">

            <form action="{{ route('public.contact.store') }}" method="POST">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required placeholder="Masukkan nama Anda">
                    @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Telepon --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">No. Telepon / WA (Opsional)</label>
                    <input type="text" name="telepon" class="form-control" placeholder="0812xxxxxxx">
                    @error('telepon') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Pesan --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Pesan Anda</label>
                    <textarea name="pesan" rows="5" class="form-control" required
                        placeholder="Tulis pesan Anda di sini..."></textarea>
                    @error('pesan') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Tombol Submit --}}
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-5 py-2" style="border-radius: 50px;">
                        <i class="fas fa-paper-plane me-1"></i> Kirim Pesan
                    </button>
                </div>

            </form>

        </div>

    </div>

@endsection