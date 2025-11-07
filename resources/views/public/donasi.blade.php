@extends('layouts.public')

@section('title', 'Formulir Donasi - Panti Asuhan Bahagia')

@section('styles')
    <style>
        :root {
            /* Skema Warna Hijau Konsisten */
            --primary-color: #22c55e;
            /* Hijau Primer */
            --secondary-color: #16a34a;
            /* Hijau Sekunder */
            --light-color: #F8F9FA;
            --dark-color: #343A40;
        }

        body {
            font-family: 'Poppins', sans-serif;
            /* Menggunakan warna background yang lebih terang */
            background: #f0fdf4;
            min-height: 100vh;
            /* Hapus display: flex, align-items, justify-content jika menggunakan layout public */
            /* Anda bisa mempertahankan ini jika view ini berdiri sendiri */
        }

        .donation-container {
            max-width: 800px;
            margin: 50px auto;
            /* Menambah margin agar tidak menempel ke atas/bawah */
            width: 100%;
        }

        .donation-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(34, 197, 94, 0.1);
            /* Shadow hijau */
            overflow: hidden;
        }

        .donation-header {
            /* Gradien Hijau Konsisten */
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 25px 30px;
            text-align: center;
        }

        .donation-header h2 {
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 1.8rem;
        }

        .donation-body {
            padding: 30px;
        }

        .section-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(34, 197, 94, 0.3);
            /* Border hijau */
            font-size: 1.2rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(34, 197, 94, 0.25);
            /* Shadow fokus hijau */
        }

        .input-icon i {
            color: var(--primary-color);
            /* Ikon berwarna hijau */
        }

        .donation-type-card:hover {
            border-color: var(--primary-color);
            background-color: rgba(34, 197, 94, 0.05);
        }

        .donation-type-card.active {
            border-color: var(--primary-color);
            background-color: rgba(34, 197, 94, 0.1);
        }

        .donation-type-card i {
            color: var(--primary-color);
        }

        .amount-option:hover {
            border-color: var(--primary-color);
            background-color: rgba(34, 197, 94, 0.05);
        }

        .amount-option.active {
            border-color: var(--primary-color);
            background-color: rgba(34, 197, 94, 0.1);
        }

        .btn-donate {
            /* Gradien Hijau pada Tombol */
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border: none;
            padding: 14px 30px;
            font-weight: 600;
            border-radius: 8px;
            width: 100%;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-donate:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(34, 197, 94, 0.4);
        }

        /* Media Query */
        @media (max-width: 576px) {
            .donation-types {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
@endsection

@section('content')
    <div class="donation-container">
        <div class="donation-card">
            <div class="donation-header">
                <h2><i class="fas fa-hands-helping"></i> Formulir Donasi</h2>
                <p>Bantu anak yatim piatu meraih masa depan mereka.</p>
            </div>

            <div class="donation-body">
                {{-- Tambahkan action dan method ke route donasi Anda --}}
                <form action="{{ route('public.donasi.submit') }}" method="POST" id="donation_form">
                    @csrf

                    <div class="form-section">
                        <h3 class="section-title">Data Donatur</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_donatur">Nama Lengkap</label>
                                    <div class="input-icon">
                                        <i class="fas fa-user"></i>
                                        <input type="text" name="nama_donatur" class="form-control" id="nama_donatur"
                                            placeholder="Masukkan nama lengkap" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telepon_donatur">Nomor Telepon</label>
                                    <div class="input-icon">
                                        <i class="fas fa-phone"></i>
                                        <input type="tel" name="telepon_donatur" class="form-control" id="telepon_donatur"
                                            placeholder="Contoh: 081234567890" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email_donatur">Alamat Email (Opsional)</label>
                                    <div class="input-icon">
                                        <i class="fas fa-envelope"></i>
                                        <input type="email" name="email_donatur" class="form-control" id="email_donatur"
                                            placeholder="nama@contoh.com">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">Jenis Donasi</h3>
                        <input type="hidden" name="jenis_donasi" id="jenis_donasi" value="umum" required>
                        <label>Pilih Jenis Bantuan:</label>
                        <div class="donation-types">
                            <div class="donation-type-card active" data-value="umum">
                                <i class="fas fa-hand-holding-usd"></i>
                                <p class="type-name">Umum</p>
                            </div>
                            <div class="donation-type-card" data-value="pendidikan">
                                <i class="fas fa-school"></i>
                                <p class="type-name">Pendidikan</p>
                            </div>
                            <div class="donation-type-card" data-value="kesehatan">
                                <i class="fas fa-briefcase-medical"></i>
                                <p class="type-name">Kesehatan</p>
                            </div>
                            <div class="donation-type-card" data-value="lainnya">
                                <i class="fas fa-ellipsis-h"></i>
                                <p class="type-name">Lainnya</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">Jumlah Donasi</h3>
                        <div class="form-group">
                            <label for="jumlah">Jumlah Donasi (Rp)</label>
                            <div class="input-icon">
                                <i class="fas fa-money-bill-wave"></i>
                                <input type="number" name="jumlah" class="form-control" id="jumlah"
                                    placeholder="Contoh: 50000" required>
                            </div>
                            <div class="form-note">Donasi minimum: Rp 10.000</div>
                        </div>

                        <label>Pilihan Cepat:</label>
                        <div class="amount-options">
                            <div class="amount-option" data-amount="25000">Rp 25.000</div>
                            <div class="amount-option" data-amount="50000">Rp 50.000</div>
                            <div class="amount-option" data-amount="100000">Rp 100.000</div>
                            <div class="amount-option" data-amount="250000">Rp 250.000</div>
                            <div class="amount-option" data-amount="500000">Rp 500.000</div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">Pesan Tambahan</h3>
                        <div class="form-group">
                            <label for="keterangan">Pesan atau Doa (Opsional)</label>
                            <textarea name="keterangan" cols="30" rows="3" class="form-control" id="keterangan"
                                placeholder="Tuliskan pesan atau doa untuk penerima donasi"></textarea>
                        </div>
                    </div>

                    <button class="btn-donate" type="submit">
                        <i class="fas fa-paper-plane"></i> Kirim Donasi
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            // Handle donation type selection
            $('.donation-type-card').click(function () {
                $('.donation-type-card').removeClass('active');
                $(this).addClass('active');
                // Mengubah ID ke 'jenis_donasi' sesuai dengan field name
                $('#jenis_donasi').val($(this).data('value'));
            });

            // Handle amount selection
            $('.amount-option').click(function () {
                $('.amount-option').removeClass('active');
                $(this).addClass('active');
                // Mengubah ID ke 'jumlah' sesuai dengan field name
                $('#jumlah').val($(this).data('amount'));
            });

            // Form submission (hanya untuk validasi frontend, proses backend di Controller)
            $('#donation_form').submit(function (e) {
                // Biarkan e.preventDefault() dihapus agar form disubmit ke Laravel setelah validasi.

                // Validasi Sederhana
                let donorName = $('#nama_donatur').val();
                let donationType = $('#jenis_donasi').val();
                let amount = $('#jumlah').val();

                if (!donorName || !donationType || !amount) {
                    alert('Harap lengkapi Nama Donatur, Jenis Donasi, dan Jumlah Donasi.');
                    e.preventDefault();
                    return;
                }

                if (parseInt(amount) < 10000) {
                    alert('Donasi minimum adalah Rp 10.000');
                    e.preventDefault();
                    return;
                }

                // Jika validasi sukses, form akan disubmit ke route action.
                // alert('Donasi berhasil divalidasi di frontend. Melanjutkan ke proses server...'); 
            });
        });
    </script>
@endsection