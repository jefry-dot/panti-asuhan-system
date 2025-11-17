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
                    <img src="/images/slide1.jpg" class="d-block w-100 img-fluid" style="object-fit: cover; height: 350px;" alt="Foto Yayasan 1">
                </div>
                <div class="carousel-item">
                    <img src="/images/slide2.jpg" class="d-block w-100 img-fluid" style="object-fit: cover; height: 350px;" alt="Foto Yayasan 2">
                </div>
                <div class="carousel-item">
                    <img src="/images/slide3.jpg" class="d-block w-100 img-fluid" style="object-fit: cover; height: 350px;" alt="Foto Yayasan 3">
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

    {{-- Quick Stats --}}
    <div class="row text-center mb-5">
        <div class="col-md-4">
            <div class="card-glass p-3">
                <i class="fas fa-child fa-2x text-success mb-2"></i>
                <h4 class="fw-bold text-success">50+</h4>
                <p class="text-muted mb-0">Anak Asuh</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-glass p-3">
                <i class="fas fa-calendar-alt fa-2x text-success mb-2"></i>
                <h4 class="fw-bold text-success">10+</h4>
                <p class="text-muted mb-0">Tahun Berdiri</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-glass p-3">
                <i class="fas fa-heart fa-2x text-success mb-2"></i>
                <h4 class="fw-bold text-success">1000+</h4>
                <p class="text-muted mb-0">Donatur</p>
            </div>
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

    {{-- Visi & Misi --}}
    <div class="row mb-5">
        <div class="col-md-6">
            <div class="card-glass p-4 h-100">
                <h4 class="fw-semibold text-success mb-3">
                    <i class="fas fa-bullseye me-2"></i>Visi
                </h4>
                <p class="mb-0" style="text-align: justify;">
                    Menjadi lembaga terdepan dalam membentuk generasi yang berakhlak mulia, 
                    cerdas intelektual dan spiritual, serta mandiri secara ekonomi.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-glass p-4 h-100">
                <h4 class="fw-semibold text-success mb-3">
                    <i class="fas fa-tasks me-2"></i>Misi
                </h4>
                <ul class="mb-0">
                    <li>Menyelenggarakan pendidikan formal dan non-formal</li>
                    <li>Memberikan pembinaan akhlak dan spiritual</li>
                    <li>Melaksanakan program pemberdayaan ekonomi</li>
                    <li>Memberikan layanan sosial kemanusiaan</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Program Unggulan --}}
    <div class="card-glass p-4 mb-5">
        <h3 class="fw-semibold text-success mb-4">Program Unggulan</h3>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="text-center p-3">
                    <i class="fas fa-graduation-cap fa-2x text-success mb-3"></i>
                    <h5 class="fw-semibold">Pendidikan</h5>
                    <p class="text-muted small">Program bimbingan belajar dan beasiswa pendidikan</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="text-center p-3">
                    <i class="fas fa-hands-helping fa-2x text-success mb-3"></i>
                    <h5 class="fw-semibold">Santunan</h5>
                    <p class="text-muted small">Santunan rutin untuk anak yatim dan dhuafa</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="text-center p-3">
                    <i class="fas fa-briefcase fa-2x text-success mb-3"></i>
                    <h5 class="fw-semibold">Keterampilan</h5>
                    <p class="text-muted small">Pelatihan keterampilan untuk kemandirian</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tentang Yayasan --}}
    <div class="card-glass p-4 mb-5">
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

    {{-- Gallery Section --}}
    <div class="card-glass p-4 mb-5">
        <h3 class="fw-semibold text-success mb-4 text-center">Gallery Kegiatan</h3>

        {{-- Gallery Grid - REDESIGN --}}
        <div class="row gallery-grid">
            {{-- Item 1 - Pendidikan --}}
            <div class="col-md-4 mb-4 gallery-item pendidikan">
                <div class="gallery-card rounded shadow-sm overflow-hidden">
                    <div class="position-relative">
                        <img src="/images/gallery/pendidikan1.jpg" 
                             class="img-fluid w-100" 
                             style="height: 200px; object-fit: cover;"
                             alt="Kegiatan Pendidikan"
                             onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjNmOWVmIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNCIgZmlsbD0jOTlhYWI5IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+R2FtYmFyIFBlbmRpZGlrYW48L3RleHQ+PC9zdmc+'">
                    </div>
                    {{-- Keterangan di bawah gambar --}}
                    <div class="p-3 text-center">
                        <h6 class="fw-semibold text-success mb-1">Pendidikan Rutinan</h6>
                        <p class="text-muted small mb-0">Kegiatan Belajar</p>
                    </div>
                </div>
            </div>

            {{-- Item 2 - Santunan --}}
            <div class="col-md-4 mb-4 gallery-item santunan">
                <div class="gallery-card rounded shadow-sm overflow-hidden">
                    <div class="position-relative">
                        <img src="/images/gallery/santunan1.jpg" 
                             class="img-fluid w-100" 
                             style="height: 200px; object-fit: cover;"
                             alt="Program Santunan"
                             onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjNmOWVmIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNCIgZmlsbD0jOTlhYWI5IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+R2FtYmFyIFNhbnR1bmFuPC90ZXh0Pjwvc3ZnPg=='">
                    </div>
                    {{-- Keterangan di bawah gambar --}}
                    <div class="p-3 text-center">
                        <h6 class="fw-semibold text-success mb-1">Kegiatan Santunan</h6>
                        <p class="text-muted small mb-0">Bantuan untuk anak yatim & dhuafa</p>
                    </div>
                </div>
            </div>

            {{-- Item 3 - Kegiatan --}}
            <div class="col-md-4 mb-4 gallery-item kegiatan">
                <div class="gallery-card rounded shadow-sm overflow-hidden">
                    <div class="position-relative">
                        <img src="/images/gallery/kegiatan1.jpg" 
                             class="img-fluid w-100" 
                             style="height: 200px; object-fit: cover;"
                             alt="Kegiatan Sosial"
                             onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjNmOWVmIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNCIgZmlsbD0jOTlhYWI5IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+R2FtYmFyIEtlZ2lhdGFuPC90ZXh0Pjwvc3ZnPg=='">
                    </div>
                    {{-- Keterangan di bawah gambar --}}
                    <div class="p-3 text-center">
                        <h6 class="fw-semibold text-success mb-1">Kunjungan Mahasiswa</h6>
                        <p class="text-muted small mb-0">Mahasiswa Unsika</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CTA Section --}}
    <div class="text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="{{ route('public.donasi') }}" class="btn btn-success btn-lg w-100 mb-3">
                    <i class="fas fa-heart me-2"></i>Donasi Sekarang
                </a>
                <a href="{{ route('public.contact') }}" class="btn btn-outline-success btn-lg w-100">
                    <i class="fas fa-headset me-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>

@endsection

@push('styles')
<style>
.gallery-card {
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
}

.gallery-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(34, 197, 94, 0.15);
}

.filter-btn.active {
    background: linear-gradient(135deg, #22c55e, #16a34a);
    color: white;
    border-color: #22c55e;
}
</style>
@endpush

@push('scripts')
<script>
// FIXED GALLERY FILTER - SUPER SIMPLE
function initGalleryFilter() {
    const buttons = document.querySelectorAll('.filter-btn');
    const items = document.querySelectorAll('.gallery-item');
    
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            // Get filter value
            const filterValue = this.getAttribute('data-filter');
            
            // Filter items
            items.forEach(item => {
                if (filterValue === 'all' || item.classList.contains(filterValue)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Update active button
            buttons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    console.log('Gallery filter initialized');
}

// Initialize when page loads
document.addEventListener('DOMContentLoaded', initGalleryFilter);

// Fallback - juga initialize ketika window load
window.addEventListener('load', initGalleryFilter);
</script>
@endpush