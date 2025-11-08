@extends('layouts.public')

@section('title', 'Beranda - Panti Asuhan Bahagia')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-center text-white">
    <div class="container">
        <h1 class="display-4 fw-bold mb-4">Selamat Datang di Panti Asuhan Bahagia</h1>
        <p class="lead mb-4">Membantu anak-anak yatim piatu meraih masa depan yang lebih baik melalui pendidikan, kasih sayang, dan dukungan</p>
        <a 
        {{-- href="{{ route('donasi') }}" --}}
         class="btn btn-light btn-lg px-4 me-2">
            <i class="fas fa-donate me-2"></i>Donasi Sekarang
        </a>
        <a 
        {{-- href="{{ route('profil') }}"  --}}
        class="btn btn-outline-light btn-lg px-4">
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
                    <i class="fas fa-heart fa-3x text-primary mb-3"></i>
                    <h4>Peduli & Kasih Sayang</h4>
                    <p>Memberikan kasih sayang dan perhatian kepada setiap anak</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="feature-box">
                    <i class="fas fa-graduation-cap fa-3x text-primary mb-3"></i>
                    <h4>Pendidikan Berkualitas</h4>
                    <p>Menyediakan akses pendidikan terbaik untuk masa depan cerah</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="feature-box">
                    <i class="fas fa-hands-helping fa-3x text-primary mb-3"></i>
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
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 120px 0;
}
.feature-box {
    padding: 30px 20px;
    border-radius: 10px;
    transition: transform 0.3s ease;
}
.feature-box:hover {
    transform: translateY(-5px);
}
</style>