@extends('layouts.admin')

@section('title', 'Daftar Pesan Masuk')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Pesan Masuk</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($messages->isEmpty())
            <div class="alert alert-info">Belum ada pesan masuk.</div>
        @else
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pesan</h6>

                    {{-- Jumlah pesan baru --}}
                    @php
                        $newMessages = $messages->where('is_read', false)->count();
                    @endphp

                    @if($newMessages > 0)
                        <span class="badge bg-danger">
                            {{ $newMessages }} pesan baru
                        </span>
                    @endif
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Status</th>
                                    <th>Nama</th>
                                    <th>Nomor Telepon</th>
                                    <th>Dikirim Pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $msg)
                                    <tr class="{{ $msg->is_read ? '' : 'table-warning' }}">

                                        {{-- Status --}}
                                        <td class="text-center">
                                            @if($msg->is_read)
                                                <span class="badge bg-success">Dibaca</span>
                                            @else
                                                <span class="badge bg-danger">Baru</span>
                                            @endif
                                        </td>

                                        {{-- Nama --}}
                                        <td>
                                            {{ $msg->nama }}
                                        </td>

                                        {{-- Nomor Telepon --}}
                                        <td>{{ $msg->telepon ?? '-' }}</td>

                                        {{-- Tanggal --}}
                                        <td>{{ $msg->created_at->format('d M Y H:i') }}</td>

                                        {{-- Aksi --}}
                                        <td class="text-center">
                                            <a href="{{ route('admin.pesan.show', $msg->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <form action="{{ route('admin.pesan.destroy', $msg->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Yakin hapus pesan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $messages->links() }}
                    </div>

                </div>
            </div>
        @endif
    </div>
@endsection