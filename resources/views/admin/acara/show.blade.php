@extends('layouts.admin')

@section('title', 'Detail Acara')

@section('content')
    <div class="container-fluid">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="color: #16a34a !important;">
                <i class="fas fa-calendar-alt mr-2"></i> Detail Acara
            </h1>
            <a href="{{ route('admin.acara.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <!-- Card Detail -->
        <div class="card shadow-lg mb-4 border-left-success">
            <div class="card-header py-3 bg-light border-bottom">
                <h6 class="m-0 font-weight-bold text-success">
                    <i class="fas fa-info-circle"></i> Informasi Acara
                </h6>
            </div>
            <div class="card-body">
                <!-- Poster -->
                <div class="text-center mb-4">
                    @if($acara->gambar)
                        <img src="{{ asset('storage/' . $acara->gambar) }}" alt="{{ $acara->judul }}"
                            class="img-fluid rounded shadow-sm" style="max-height: 300px; object-fit: cover;">
                    @else
                        <div class="bg-light p-5 rounded">
                            <i class="fas fa-image fa-3x text-muted"></i>
                            <p class="mt-2 text-muted">Tidak ada poster</p>
                        </div>
                    @endif
                </div>


                <!-- Detail Table -->
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th width="200">Judul Acara</th>
                            <td>{{ $acara->judul ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{!! $acara->deskripsi ?? '-' !!}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>
                                <i class="fas fa-map-marker-alt text-danger mr-2"></i>
                                {{ $acara->lokasi ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ \Carbon\Carbon::parse($acara->tanggal)->translatedFormat('d F Y') ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Waktu</th>
                            <td>
                                {{ $acara->waktu_mulai ?? '-' }} - {{ $acara->waktu_selesai ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>{{ $acara->created_at ? $acara->created_at->timezone('Asia/Jakarta')->format('d F Y H:i') : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Diperbarui Pada</th>
                            <td>{{ $acara->updated_at ? $acara->updated_at->timezone('Asia/Jakarta')->format('d F Y H:i') : '-' }}
                            </td>
                        </tr>
                    </tbody>
                </table>


                <!-- Action Buttons -->
                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('admin.acara.edit', $acara->id) }}" class="btn btn-warning mr-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.acara.destroy', $acara->id) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus acara ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection