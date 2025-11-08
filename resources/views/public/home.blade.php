<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Donasi - Panti Asuhan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        :root {
            --primary-color: #2E86AB;
            --secondary-color: #F26419;
            --light-color: #F8F9FA;
            --dark-color: #343A40;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .donation-container {
            max-width: 800px;
            width: 100%;
        }
        
        .donation-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .donation-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1B5E7A 100%);
            color: white;
            padding: 25px 30px;
            text-align: center;
        }
        
        .donation-header h2 {
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 1.8rem;
        }
        
        .donation-header p {
            opacity: 0.9;
            margin-bottom: 0;
        }
        
        .donation-body {
            padding: 30px;
        }
        
        .form-section {
            margin-bottom: 25px;
        }
        
        .section-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(46, 134, 171, 0.2);
            font-size: 1.2rem;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e1e5e9;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(46, 134, 171, 0.25);
        }
        
        label {
            font-weight: 500;
            margin-bottom: 8px;
            color: #495057;
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        
        .input-icon .form-control {
            padding-left: 45px;
        }
        
        .donation-types {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 10px;
            margin-top: 10px;
        }
        
        .donation-type-card {
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            padding: 15px 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }
        
        .donation-type-card:hover {
            border-color: var(--primary-color);
            background-color: rgba(46, 134, 171, 0.05);
        }
        
        .donation-type-card.active {
            border-color: var(--primary-color);
            background-color: rgba(46, 134, 171, 0.1);
        }
        
        .donation-type-card i {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: var(--primary-color);
        }
        
        .donation-type-card .type-name {
            font-weight: 500;
            font-size: 0.9rem;
            margin-bottom: 0;
        }
        
        .amount-options {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        
        .amount-option {
            flex: 1;
            min-width: 80px;
            text-align: center;
            padding: 10px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .amount-option:hover {
            border-color: var(--primary-color);
            background-color: rgba(46, 134, 171, 0.05);
        }
        
        .amount-option.active {
            border-color: var(--primary-color);
            background-color: rgba(46, 134, 171, 0.1);
        }
        
        .btn-donate {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1B5E7A 100%);
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
            box-shadow: 0 5px 15px rgba(46, 134, 171, 0.4);
        }
        
        .form-note {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 5px;
        }
        
        @media (max-width: 576px) {
            .donation-types {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .amount-options {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="donation-container">
        <div class="donation-card">
            <div class="donation-header">
                <h2><i class="fas fa-hands-helping"></i> Donasi</h2>
                <p>Bantu saudara kita yang membutuhkan</p>
            </div>
            
            <div class="donation-body">
                <form action="#" id="donation_form">
                    <div class="form-section">
                        <h3 class="section-title">Data Donatur</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="donor_name">Nama Lengkap</label>
                                    <div class="input-icon">
                                        <i class="fas fa-user"></i>
                                        <input type="text" name="donor_name" class="form-control" id="donor_name" placeholder="Masukkan nama lengkap">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="donor_email">Alamat Email</label>
                                    <div class="input-icon">
                                        <i class="fas fa-envelope"></i>
                                        <input type="email" name="donor_email" class="form-control" id="donor_email" placeholder="nama@contoh.com">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-section">
                        <h3 class="section-title">Jumlah Donasi</h3>
                        <div class="form-group">
                            <label for="amount">Jumlah Donasi (Rp)</label>
                            <div class="input-icon">
                                <i class="fas fa-money-bill-wave"></i>
                                <input type="number" name="amount" class="form-control" id="amount" placeholder="Contoh: 50000">
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
                            <label for="note">Pesan atau Doa (Opsional)</label>
                            <textarea name="note" cols="30" rows="3" class="form-control" id="note" placeholder="Tuliskan pesan atau doa untuk penerima donasi"></textarea>
                        </div>
                    </div>
                    
                    <button class="btn-donate" type="submit">
                        <i class="fas fa-paper-plane"></i> Kirim Donasi
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Handle donation type selection
            $('.donation-type-card').click(function() {
                $('.donation-type-card').removeClass('active');
                $(this).addClass('active');
                $('#donation_type').val($(this).data('value'));
            });
            
            // Handle amount selection
            $('.amount-option').click(function() {
                $('.amount-option').removeClass('active');
                $(this).addClass('active');
                $('#amount').val($(this).data('amount'));
            });
            
            // Form submission
            $('#donation_form').submit(function(e) {
                e.preventDefault();
                
                // Basic validation
                let donorName = $('#donor_name').val();
                let donorEmail = $('#donor_email').val();
                let donationType = $('#donation_type').val();
                let amount = $('#amount').val();
                
                if (!donorName || !donorEmail || !donationType || !amount) {
                    alert('Harap lengkapi semua field yang wajib diisi.');
                    return;
                }
                
                if (amount < 10000) {
                    alert('Donasi minimum adalah Rp 10.000');
                    return;
                }
                
                // In a real application, you would submit the form data to a server here
                alert('Terima kasih! Donasi Anda telah berhasil dikirim. Kami akan menghubungi Anda melalui email untuk proses selanjutnya.');
                $('#donation_form')[0].reset();
                $('.donation-type-card').removeClass('active');
                $('.amount-option').removeClass('active');
            });
        });
    </script>
</body>
</html>