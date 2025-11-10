@extends('layouts.public')

@section('title', 'Beranda - Yayasan Alza el Rahmah')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-center text-white">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Selamat Datang di Yayasan Alza el Rahmah</h1>
            <p class="lead mb-4">
                Membantu anak-anak yatim piatu meraih masa depan yang lebih baik melalui pendidikan, kasih sayang, dan
                dukungan
            </p>
            <a href="{{ route('donation.form') }}" class="btn btn-light btn-lg px-4 me-2">
                <i class="fas fa-donate me-2"></i>Donasi Sekarang
            </a>

            <a href="{{ route('public.profil') }}" class="btn btn-outline-light btn-lg px-4">
                <i class="fas fa-info-circle me-2"></i>Pelajari Lebih Lanjut
            </a>

        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4 mb-4">
                    <div class="feature-box">
                        <i class="fas fa-heart fa-3x text-success mb-3"></i>
                        <h4>Peduli & Kasih Sayang</h4>
                        <p>Memberikan kasih sayang dan perhatian kepada setiap anak</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="feature-box">
                        <i class="fas fa-graduation-cap fa-3x text-success mb-3"></i>
                        <h4>Pendidikan Berkualitas</h4>
                        <p>Menyediakan akses pendidikan terbaik untuk masa depan cerah</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="feature-box">
                        <i class="fas fa-hands-helping fa-3x text-success mb-3"></i>
                        <h4>Dukungan Masyarakat</h4>
                        <p>Bersama-sama membangun masa depan yang lebih baik</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    .hero-section {
        background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
        padding: 120px 0;
        box-shadow: 0 10px 30px rgba(22, 163, 74, 0.2);
    }

    .feature-box {
        padding: 30px 20px;
        border-radius: 12px;
        border: 1px solid rgba(22, 163, 74, 0.1);
        background: linear-gradient(135deg, #ffffff, #f8fafc);
        box-shadow: 0 5px 15px rgba(22, 163, 74, 0.05);
        transition: all 0.3s ease;
    }

    .feature-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(22, 163, 74, 0.1);
    }
</style>