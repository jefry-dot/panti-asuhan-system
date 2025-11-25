@extends('layouts.public')

@section('title', 'Donasi')

@section('styles')
    <style>
        .donation-card {
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

        .donation-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(34, 197, 94, 0.15);
        }

        .donation-card h1 {
            text-align: center;
            color: #16a34a;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        label {
            font-weight: 500;
            color: #065f46;
            margin-top: 10px;
        }

        input,
        textarea {
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            background-color: #f0fdf4;
            padding: 10px 12px;
            transition: all 0.3s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
            background-color: #fff;
        }

        button {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 10px;
            margin-top: 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.3);
        }
    </style>
@endsection

@section('content')
    <div class="donation-card">
        <h1>Formulir Donasi</h1>

        <form id="donation-form">
            <label>Nama:</label>
            <input type="text" name="donor_name" class="form-control" placeholder="Masukkan nama lengkap" required>

            <label>Email:</label>
            <input type="email" name="donor_email" class="form-control" placeholder="Masukkan email" required>

            <label>Jenis Donasi:</label>
            <input type="text" name="donation_type" class="form-control" placeholder="Contoh: Uang, Barang, dll.">

            <label>Jumlah Donasi (Rp):</label>
            <input type="number" name="amount" class="form-control" min="1000" placeholder="Masukkan nominal" required>

            <label>Catatan:</label>
            <textarea name="note" class="form-control" rows="3" placeholder="Pesan atau doa..."></textarea>

            <button type="submit">Donasi Sekarang</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.clientKey') }}"></script>

    <script>
        $(document).ready(function () {
            $('#donation-form').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('public.donasi.store') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.error) {
                            alert("❌ " + response.message);
                            console.error('Donation error:', response.message);
                            return;
                        }

                        if (response.snap_token) {
                            snap.pay(response.snap_token, {
                                onSuccess: function (result) {
                                    window.location.href = "{{ route('public.donasi.finish') }}?status=success&order_id=" + result.order_id;
                                },
                                onPending: function (result) {
                                    window.location.href = "{{ route('public.donasi.finish') }}?status=pending&order_id=" + result.order_id;
                                },
                                onError: function (result) {
                                    window.location.href = "{{ route('public.donasi.finish') }}?status=failed&order_id=" + result.order_id;
                                },
                                onClose: function () {
                                    alert("⚠️ Anda menutup popup tanpa menyelesaikan pembayaran.");
                                }
                            });
                        } else {
                            alert("❌ Terjadi kesalahan. Token pembayaran tidak ditemukan.");
                        }
                    },
                    error: function (xhr) {
                        let errorMessage = "Terjadi kesalahan saat memproses donasi.";

                        console.log('XHR Status:', xhr.status);
                        console.log('XHR Response:', xhr.responseText);

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            errorMessage = "Terdapat kesalahan validasi:\n";
                            $.each(errors, function (key, value) {
                                errorMessage += "- " + value[0] + "\n";
                            });
                        } else if (xhr.status === 419) {
                            errorMessage = "Sesi Anda telah berakhir. Silakan segarkan halaman ini dan coba lagi.";
                        } else if (xhr.status === 500) {
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            } else if (xhr.responseText.includes("Midtrans")) {
                                errorMessage = "Terjadi kesalahan pada server. Kemungkinan konfigurasi pembayaran (Midtrans) belum lengkap. Silakan hubungi admin.";
                            } else {
                                errorMessage = "Terjadi kesalahan internal pada server. Silakan coba lagi nanti atau hubungi admin.";
                            }
                        } else if (xhr.status === 0) {
                            errorMessage = "Tidak dapat terhubung ke server. Periksa koneksi internet Anda.";
                        }

                        alert("❌ " + errorMessage);
                    }
                });
            });
        });
    </script>
@endsection