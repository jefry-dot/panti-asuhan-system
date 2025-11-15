@extends('layouts.public')

@section('title', 'Profil Yayasan')

@section('content')

    {{-- Hero Section --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold text-success mb-3">Profil Yayasan Alza el Rohmah</h1>
        <p class="text-muted">Membangun Generasi Berakhlak, Cerdas, dan Mandiri</p>
    </div>

    {{-- Carousel Foto --}}
    <div class="d-flex justify-content-center mb-5">
        <div id="profilCarousel" class="carousel slide" data-bs-ride="carousel" style="max-width: 650px; width: 100%;">

            <div class="carousel-inner rounded shadow">

                <div class="carousel-item active">
                    <img src="/images/slide1.jpg" class="d-block w-100 img-fluid" style="object-fit: cover; height: 350px;"
                        alt="Foto Yayasan 1">
                </div>

                <div class="carousel-item">
                    <img src="/images/slide2.jpg" class="d-block w-100 img-fluid" style="object-fit: cover; height: 350px;"
                        alt="Foto Yayasan 2">
                </div>

                <div class="carousel-item">
                    <img src="/images/slide3.jpg" class="d-block w-100 img-fluid" style="object-fit: cover; height: 350px;"
                        alt="Foto Yayasan 3">
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#profilCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#profilCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>
    </div>

    {{-- Sejarah Yayasan --}}
    <div class="card-glass p-4 mb-5">
        <h3 class="fw-semibold text-success mb-3">Sejarah Yayasan</h3>
        <p style="text-align: justify;">
            Yayasan Alza el Rohmah didirikan sebagai bentuk kepedulian terhadap anak-anak yatim, dhuafa,
            dan keluarga kurang mampu dalam mendapatkan perhatian, pendidikan, serta pembinaan akhlak.
            Berawal dari kegiatan sosial skala kecil di lingkungan masyarakat, yayasan ini tumbuh dan berkembang
            menjadi lembaga yang konsisten memberikan kontribusi positif bagi masyarakat.
        </p>
        <p style="text-align: justify;">
            Seiring berjalannya waktu, Yayasan Alza el Rohmah terus meningkatkan kualitas program pendidikan,
            dakwah, bantuan sosial, serta pemberdayaan masyarakat agar mampu mencetak generasi yang beriman,
            berakhlak baik, dan mandiri secara ekonomi.
        </p>
    </div>

    {{-- Tentang Yayasan --}}
    <div class="card-glass p-4">
        <h3 class="fw-semibold text-success mb-3">Tentang Yayasan</h3>
        <p style="text-align: justify;">
            Yayasan Alza el Rohmah adalah lembaga sosial dan pendidikan yang berfokus pada pembinaan
            anak yatim, piatu, dhuafa, serta masyarakat umum. Yayasan ini memiliki program-program utama
            seperti pendidikan agama, bimbingan belajar, kegiatan sosial kemanusiaan, santunan rutin,
            serta pelatihan keterampilan untuk meningkatkan kualitas hidup penerima manfaat.
        </p>

        <ul>
            <li>Pembinaan akhlak dan pendidikan keagamaan</li>
            <li>Program santunan anak yatim dan dhuafa</li>
            <li>Kegiatan sosial & kemanusiaan</li>
            <li>Kegiatan pendidikan dan pelatihan keterampilan</li>
            <li>Membangun karakter dan kemandirian penerima manfaat</li>
        </ul>

        <p style="text-align: justify;">
            Dengan semangat kebersamaan dan dukungan dari masyarakat, Yayasan Alza el Rohmah
            berkomitmen untuk menjadi lembaga terpercaya yang menebarkan manfaat dan membawa
            perubahan menuju masa depan yang lebih baik.
        </p>
    </div>

    {{-- Kontak Kami --}}
    <div class="text-center mt-5">
        <a href="{{ route('public.contact') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 px-4 py-2"
            style="font-size: 1.1rem; border-radius: 50px;">

            <i class="fas fa-headset fa-lg"></i>
            <span>Hubungi Kami</span>

        </a>
    </div>
@endsection