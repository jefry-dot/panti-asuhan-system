<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi untuk Panti Asuhan</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Midtrans Snap.js -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" 
        data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9fafb;
            margin: 50px auto;
            max-width: 600px;
            color: #333;
        }

        form {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #22c55e;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        button {
            margin-top: 15px;
            width: 100%;
            background: #22c55e;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #16a34a;
        }
    </style>
</head>
<body>
    <h1>Formulir Donasi</h1>

    <form id="donation-form">
        <label>Nama:</label>
        <input type="text" name="donor_name" placeholder="Masukkan nama lengkap" required>

        <label>Email:</label>
        <input type="email" name="donor_email" placeholder="Masukkan email" required>

        <label>Jenis Donasi:</label>
        <input type="text" name="donation_type" placeholder="Contoh: Uang, Barang, dll.">

        <label>Jumlah Donasi (Rp):</label>
        <input type="number" name="amount" min="1000" placeholder="Masukkan nominal" required>

        <label>Catatan:</label>
        <textarea name="note" rows="3" placeholder="Pesan atau doa..."></textarea>

        <button type="submit">Donasi Sekarang</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#donation-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('donation.store') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    headers: { 
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                    },
                    success: function(response) {
                        if (response.snap_token) {
                            snap.pay(response.snap_token, {
                                onSuccess: function(result) {
                                    alert("✅ Pembayaran berhasil!");
                                    console.log(result);
                                },
                                onPending: function(result) {
                                    alert("⌛ Menunggu pembayaran...");
                                    console.log(result);
                                },
                                onError: function(result) {
                                    alert("❌ Pembayaran gagal!");
                                    console.log(result);
                                },
                                onClose: function() {
                                    alert("⚠️ Anda menutup popup tanpa menyelesaikan pembayaran.");
                                }
                            });
                        } else {
                            alert("Terjadi kesalahan. Token pembayaran tidak ditemukan.");
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert("Terjadi kesalahan saat memproses donasi.");
                    }
                });
            });
        });
    </script>
</body>
</html>
