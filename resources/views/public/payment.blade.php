@extends('layouts.public')

@section('title', 'Pembayaran Donasi')

@section('styles')
    <style>
        .payment-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(187, 247, 208, 0.4);
            box-shadow: 0 15px 35px rgba(34, 197, 94, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            padding: 2.5rem;
            transition: all 0.3s ease;
            max-width: 650px;
            margin: 0 auto;
        }

        .payment-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(34, 197, 94, 0.15);
        }

        .payment-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .payment-header h1 {
            color: #16a34a;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .payment-header p {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .donation-info {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 500;
            color: #065f46;
        }

        .info-value {
            color: #374151;
            font-weight: 600;
        }

        .amount-highlight {
            font-size: 1.5rem;
            color: #16a34a;
        }

        .btn-pay {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .btn-pay:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.3);
        }

        .btn-pay:disabled {
            background: #9ca3af;
            cursor: not-allowed;
            transform: none;
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .instructions {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 10px;
            padding: 1.5rem;
            margin-top: 1.5rem;
        }

        .instructions h3 {
            color: #1e40af;
            font-size: 1rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .instructions ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        .instructions li {
            color: #1e3a8a;
            margin-bottom: 0.5rem;
        }

        .share-section {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
            text-align: center;
        }

        .share-section p {
            color: #6b7280;
            margin-bottom: 1rem;
        }

        .btn-copy {
            background: #f3f4f6;
            border: 1px solid #d1d5db;
            color: #374151;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-copy:hover {
            background: #e5e7eb;
        }
    </style>
@endsection

@section('content')
    <div class="payment-card">
        <div class="payment-header">
            <h1>💳 Pembayaran Donasi</h1>
            <p>Lanjutkan pembayaran untuk donasi Anda</p>
            <span class="status-badge status-pending">⏳ Menunggu Pembayaran</span>
        </div>

        <div class="donation-info">
            <div class="info-row">
                <span class="info-label">Nama Donatur:</span>
                <span class="info-value">{{ $donation->donor_name }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Email:</span>
                <span class="info-value">{{ $donation->donor_email }}</span>
            </div>
            @if($donation->donation_type)
            <div class="info-row">
                <span class="info-label">Jenis Donasi:</span>
                <span class="info-value">{{ $donation->donation_type }}</span>
            </div>
            @endif
            <div class="info-row">
                <span class="info-label">Jumlah Donasi:</span>
                <span class="info-value amount-highlight">Rp {{ number_format($donation->amount, 0, ',', '.') }}</span>
            </div>
            @if($donation->note)
            <div class="info-row">
                <span class="info-label">Catatan:</span>
                <span class="info-value">{{ $donation->note }}</span>
            </div>
            @endif
        </div>

        <button id="pay-button" class="btn-pay">
            <i class="fas fa-credit-card me-2"></i>Bayar Sekarang
        </button>

        <div class="instructions">
            <h3>📋 Panduan Pembayaran</h3>
            <ul>
                <li>Klik tombol "Bayar Sekarang" untuk membuka popup pembayaran</li>
                <li>Pilih metode pembayaran yang Anda inginkan</li>
                <li>Ikuti instruksi pembayaran yang muncul</li>
                <li>Jika Anda menutup popup, klik tombol lagi untuk melanjutkan</li>
                <li>Simpan halaman ini untuk melanjutkan pembayaran nanti</li>
            </ul>
        </div>

        <div class="share-section">
            <p>💡 <strong>Tips:</strong> Simpan link halaman ini untuk melanjutkan pembayaran kapan saja</p>
            <button onclick="copyPaymentLink()" class="btn-copy">
                <i class="fas fa-copy me-2"></i>Salin Link Pembayaran
            </button>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ $clientKey }}"></script>

    <script>
        const snapToken = "{{ $donation->snap_token }}";
        const payButton = document.getElementById('pay-button');

        // Auto open payment popup on page load
        window.addEventListener('load', function() {
            console.log('Payment page loaded');
            console.log('Snap token:', snapToken);
        });

        // Pay button click handler
        payButton.addEventListener('click', function() {
            openPayment();
        });

        function openPayment() {
            payButton.disabled = true;
            payButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Membuka pembayaran...';

            snap.pay(snapToken, {
                onSuccess: function(result) {
                    console.log('Payment success:', result);
                    window.location.href = "{{ route('public.donasi.finish') }}?status=success&order_id=" + result.order_id;
                },
                onPending: function(result) {
                    console.log('Payment pending:', result);
                    window.location.href = "{{ route('public.donasi.finish') }}?status=pending&order_id=" + result.order_id;
                },
                onError: function(result) {
                    console.log('Payment error:', result);
                    window.location.href = "{{ route('public.donasi.finish') }}?status=failed&order_id=" + result.order_id;
                },
                onClose: function() {
                    console.log('Payment popup closed');
                    payButton.disabled = false;
                    payButton.innerHTML = '<i class="fas fa-credit-card me-2"></i>Bayar Sekarang';

                    Swal.fire({
                        icon: 'warning',
                        title: 'Pembayaran Belum Selesai',
                        text: 'Anda menutup popup pembayaran. Klik tombol "Bayar Sekarang" untuk melanjutkan.',
                        confirmButtonText: 'Mengerti',
                        confirmButtonColor: '#16a34a',
                        backdrop: true,
                        allowOutsideClick: true
                    });
                }
            });
        }

        // Copy payment link
        function copyPaymentLink() {
            const link = window.location.href;

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(link).then(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Link pembayaran berhasil disalin ke clipboard',
                        timer: 2000,
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-end'
                    });
                }, function(err) {
                    console.error('Failed to copy link:', err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Menyalin',
                        text: 'Silakan copy link secara manual dari address bar',
                        confirmButtonColor: '#16a34a'
                    });
                });
            } else {
                // Fallback for older browsers
                Swal.fire({
                    icon: 'info',
                    title: 'Copy Link Manual',
                    html: `<input type="text" value="${link}" class="form-control" id="payment-link-input" readonly>`,
                    confirmButtonText: 'Tutup',
                    confirmButtonColor: '#16a34a',
                    didOpen: () => {
                        document.getElementById('payment-link-input').select();
                    }
                });
            }
        }
    </script>
@endsection
