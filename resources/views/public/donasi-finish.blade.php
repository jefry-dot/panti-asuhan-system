@extends('layouts.public')

@section('title', 'Terima Kasih - Donasi')

@section('styles')
    <style>
        .finish-container {
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .finish-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(187, 247, 208, 0.4);
            box-shadow: 0 15px 35px rgba(34, 197, 94, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 1.5rem;
            padding: 3rem;
            max-width: 600px;
            width: 100%;
            text-align: center;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .icon-wrapper {
            width: 100px;
            height: 100px;
            margin: 0 auto 2rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: scaleIn 0.6s ease-out 0.2s both;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        .icon-wrapper.success {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            box-shadow: 0 10px 30px rgba(34, 197, 94, 0.3);
        }

        .icon-wrapper.pending {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            box-shadow: 0 10px 30px rgba(245, 158, 11, 0.3);
        }

        .icon-wrapper.failed {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            box-shadow: 0 10px 30px rgba(239, 68, 68, 0.3);
        }

        .icon-wrapper i {
            font-size: 3rem;
            color: white;
        }

        .finish-card h1 {
            color: #16a34a;
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 2rem;
        }

        .finish-card p {
            color: #64748b;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .donation-details {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 1rem;
            padding: 1.5rem;
            margin: 2rem 0;
            text-align: left;
        }

        .donation-details .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #dcfce7;
        }

        .donation-details .detail-item:last-child {
            border-bottom: none;
        }

        .donation-details .detail-label {
            color: #065f46;
            font-weight: 500;
        }

        .donation-details .detail-value {
            color: #047857;
            font-weight: 600;
        }

        .btn-home {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            border: none;
            padding: 1rem 2.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.3);
        }

        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.4);
            color: white;
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .status-badge.success {
            background: #dcfce7;
            color: #16a34a;
        }

        .status-badge.pending {
            background: #fef3c7;
            color: #d97706;
        }

        .status-badge.failed {
            background: #fee2e2;
            color: #dc2626;
        }
    </style>
@endsection

@section('content')
    <div class="finish-container">
        <div class="finish-card">
            @if($status === 'success')
                <div class="icon-wrapper success">
                    <i class="fas fa-check"></i>
                </div>
                <span class="status-badge success">Pembayaran Berhasil</span>
                <h1>Terima Kasih Atas Donasi Anda!</h1>
                <p>Donasi Anda telah berhasil diterima. Semoga menjadi berkah dan bermanfaat untuk anak-anak di panti asuhan kami.</p>
            @elseif($status === 'pending')
                <div class="icon-wrapper pending">
                    <i class="fas fa-clock"></i>
                </div>
                <span class="status-badge pending">Menunggu Pembayaran</span>
                <h1>Pembayaran Sedang Diproses</h1>
                <p>Pembayaran Anda sedang dalam proses verifikasi. Kami akan mengirimkan konfirmasi melalui email setelah pembayaran berhasil diverifikasi.</p>
            @else
                <div class="icon-wrapper failed">
                    <i class="fas fa-times"></i>
                </div>
                <span class="status-badge failed">Pembayaran Gagal</span>
                <h1>Pembayaran Tidak Berhasil</h1>
                <p>Maaf, pembayaran Anda tidak dapat diproses. Silakan coba lagi atau hubungi kami jika masalah berlanjut.</p>
            @endif

            @if($donation)
                <div class="donation-details">
                    <div class="detail-item">
                        <span class="detail-label">Nama Donatur</span>
                        <span class="detail-value">{{ $donation->donor_name }}</span>
                    </div>
                    @if($donation->donation_type)
                        <div class="detail-item">
                            <span class="detail-label">Jenis Donasi</span>
                            <span class="detail-value">{{ $donation->donation_type }}</span>
                        </div>
                    @endif
                    <div class="detail-item">
                        <span class="detail-label">Jumlah Donasi</span>
                        <span class="detail-value">Rp {{ number_format($donation->amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Status</span>
                        <span class="detail-value text-capitalize">{{ $donation->status }}</span>
                    </div>
                </div>
            @endif

            <a href="{{ route('public.home') }}" class="btn-home">
                <i class="fas fa-home me-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
@endsection
