@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="color: #16a34a !important;">Manajemen Berita</h1>
        <a href="{{ route('admin.berita.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Berita
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

    <!-- Berita Table -->
    <div class="card shadow mb-4 table-card">
        <div class="card-header py-3" style="border-bottom: 2px solid #22c55e;">
            <h6 class="m-0 font-weight-bold" style="color: #16a34a;">
                <i class="fas fa-newspaper"></i> Daftar Berita
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th width="50">No</th>
                            <th width="100">Gambar</th>
                            <th>Judul</th>
                            <th width="120">Penulis</th>
                            <th width="120">Tanggal</th>
                            <th width="150" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($berita as $item)
                        <tr class="donation-item">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" 
                                         alt="{{ $item->judul }}" 
                                         class="img-fluid rounded"
                                         style="width: 80px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                         style="width: 80px; height: 60px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ Str::limit($item->judul, 60) }}</strong>
                                <br>
                                <small class="text-muted">
                                    {{ Str::limit(strip_tags($item->konten), 80) }}
                                </small>
                            </td>
                            <td>
                                <i class="fas fa-user text-primary mr-1"></i>
                                {{ $item->penulis }}
                            </td>
                            <td>
                                <i class="fas fa-calendar text-success mr-1"></i>
                                {{ $item->tanggal_publikasi->format('d/m/Y') }}
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('admin.berita.show', $item->id) }}" 
                                       class="btn btn-info action-btn" 
                                       title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.berita.edit', $item->id) }}" 
                                       class="btn btn-warning action-btn" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', $item->id) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Hapus berita ini?')">
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
                            <td colspan="6" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-inbox fa-2x mb-3"></i>
                                    <br>
                                    Belum ada berita yang ditambahkan.
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($berita->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Menampilkan {{ $berita->firstItem() }} - {{ $berita->lastItem() }} dari {{ $berita->total() }} berita
                </div>
                <nav>
                    {{ $berita->links() }}
                </nav>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Additional scripts if needed
    $(document).ready(function() {
        // Add smooth animations
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