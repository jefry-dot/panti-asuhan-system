@extends('layouts.admin')

@section('title', 'Riwayat Donasi')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">📜 Riwayat Donasi</h1>

    @if($donations->isEmpty())
        <div class="alert alert-info">
            Belum ada donasi yang tercatat.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Donatur</th>
                            <th>Email</th>
                            <th>Jenis Donasi</th>
                            <th>Jumlah (Rp)</th>
                            <th>Catatan</th> {{-- ⬅️ Tambahkan kolom ini --}}
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donations as $index => $donation)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $donation->donor_name ?? '-' }}</td>
                                <td>{{ $donation->donor_email ?? '-' }}</td>
                                <td>{{ $donation->donation_type ?? '-' }}</td>
                                <td>{{ number_format($donation->amount, 0, ',', '.') }}</td>
                                <td>{{ $donation->note ?? '-' }}</td> {{-- ⬅️ Tampilkan catatan --}}
                                <td>
                                    @if ($donation->status === 'success')
                                        <span class="badge bg-success">Berhasil</span>
                                    @elseif ($donation->status === 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @else
                                        <span class="badge bg-danger">Gagal</span>
                                    @endif
                                </td>
                                <td>{{ $donation->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('admin.donasi.destroy', $donation->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus donasi ini?')">
                                     @csrf
                                     @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>

                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
