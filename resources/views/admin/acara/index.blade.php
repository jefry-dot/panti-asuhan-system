@extends('layouts.admin')

@section('title', 'Manajemen Acara')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="color: #16a34a !important;">Manajemen Acara</h1>
        <a href="{{ route('admin.acara.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Acara
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show dashboard-card" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Acara Table -->
    <div class="card shadow mb-4 table-card">
        <div class="card-header py-3" style="border-bottom: 2px solid #22c55e;">
            <h6 class="m-0 font-weight-bold" style="color: #16a34a;">
                <i class="fas fa-calendar-alt"></i> Daftar Acara
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th width="50">No</th>
                            <th width="100">Poster</th>
                            <th>Nama Acara</th>
                            <th width="150">Lokasi</th>
                            <th width="150">Tanggal</th>
                            <th width="120">Waktu</th>
                            <th width="150" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($acara as $item)
                        <tr class="donation-item">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                @if($item->poster)
                                    <img src="{{ asset('storage/' . $item->poster) }}" 
                                         alt="{{ $item->nama_acara }}" 
                                         class="img-fluid rounded"
                                         style="width: 80px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                         style="width: 80px; height: 60px;">
                                        <i class="fas fa-calendar text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ Str::limit($item->nama_acara, 50) }}</strong>
                                <br>
                                <small class="text-muted">
                                    {{ Str::limit(strip_tags($item->deskripsi), 70) }}
                                </small>
                            </td>
                            <td>
                                <i class="fas fa-map-marker-alt text-danger mr-1"></i>
                                {{ Str::limit($item->lokasi, 25) }}
                            </td>
                            <td>
                                <small>
                                    <div><strong>Mulai:</strong> {{ $item->tanggal_mulai->format('d/m/Y') }}</div>
                                    <div><strong>Selesai:</strong> {{ $item->tanggal_selesai->format('d/m/Y') }}</div>
                                </small>
                            </td>
                            <td>
                                <small>
                                    <div>{{ $item->waktu_mulai }}</div>
                                    <div>s/d {{ $item->waktu_selesai }}</div>
                                </small>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('admin.acara.show', $item->id) }}" 
                                       class="btn btn-info action-btn" 
                                       title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.acara.edit', $item->id) }}" 
                                       class="btn btn-warning action-btn" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.acara.destroy', $item->id) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Hapus acara ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-danger action-btn" 
                                                title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-calendar-times fa-2x mb-3"></i>
                                    <br>
                                    Belum ada acara yang ditambahkan.
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($acara->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Menampilkan {{ $acara->firstItem() }} - {{ $acara->lastItem() }} dari {{ $acara->total() }} acara
                </div>
                <nav>
                    {{ $acara->links() }}
                </nav>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.action-btn').hover(
            function() {
                $(this).addClass('shadow');
            },
            function() {
                $(this).removeClass('shadow');
            }
        );
    });
</script>
@endsection