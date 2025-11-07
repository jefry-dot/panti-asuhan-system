@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="color: #16a34a !important;">Edit Berita</h1>
            <a href="{{ route('admin.berita.index') }}" class="d-none d-sm-inline-block btn btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
            </a>
        </div>

        <!-- Form Card -->
        <div class="card shadow mb-4 form-card">
            <div class="card-header py-3" style="border-bottom: 2px solid #22c55e;">
                <h6 class="m-0 font-weight-bold" style="color: #16a34a;">
                    <i class="fas fa-edit"></i> Form Edit Berita
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data"
                    id="beritaForm">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-8">
                            <!-- Judul Berita -->
                            <div class="form-group mb-4">
                                <label for="judul" class="font-weight-bold">Judul Berita *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                        name="judul" value="{{ old('judul', $berita->judul) }}"
                                        placeholder="Masukkan judul berita..." required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-heading text-success"></i>
                                        </span>
                                    </div>
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Konten Berita -->
                            <div class="form-group mb-4">
                                <label for="konten" class="font-weight-bold">Konten Berita *</label>
                                <!-- Anda dapat mengintegrasikan Rich Text Editor (misalnya CKEditor/TinyMCE) di sini. Untuk sementara, kita gunakan textarea standar. -->
                                <textarea class="form-control @error('konten') is-invalid @enderror" id="konten"
                                    name="konten" rows="15" placeholder="Tulis konten berita lengkap di sini..."
                                    required>{{ old('konten', $berita->konten) }}</textarea>
                                @error('konten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-4">
                            <!-- Sidebar Form (Gambar & Tanggal) -->
                            <div class="sticky-top" style="top: 20px;">
                                <!-- Gambar Utama -->
                                <div class="form-group mb-4">
                                    <label for="gambar" class="font-weight-bold">Gambar Utama</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror"
                                            id="gambar" name="gambar" accept="image/*" onchange="previewImage(this)">
                                        <label class="custom-file-label" for="gambar">
                                            {{ $berita->gambar ? 'Ganti gambar...' : 'Pilih file gambar...' }}
                                        </label>
                                        @error('gambar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <small class="form-text text-muted">
                                        Kosongkan jika tidak ingin mengganti gambar.
                                    </small>

                                    <!-- Current Image -->
                                    @if($berita->gambar)
                                        <div class="mt-3 text-center">
                                            <p class="small text-muted mb-2">Gambar Saat Ini:</p>
                                            <!-- Mengasumsikan kolom di database bernama 'gambar' dan disimpan di 'storage' -->
                                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                                class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                                        </div>
                                    @endif

                                    <!-- Image Preview -->
                                    <div class="mt-3 text-center">
                                        <img id="imagePreview" src="#" alt="Preview Gambar"
                                            class="img-fluid rounded shadow-sm" style="max-height: 200px; display: none;">
                                    </div>
                                </div>

                                <!-- Tanggal Publikasi -->
                                <div class="form-group mb-4">
                                    <label for="tanggal_publikasi" class="font-weight-bold">Tanggal Publikasi *</label>
                                    <div class="input-group">
                                        <!-- Mengasumsikan kolom di model bernama 'tanggal_publikasi' dan sudah di-cast ke Carbon -->
                                        <input type="date"
                                            class="form-control @error('tanggal_publikasi') is-invalid @enderror"
                                            id="tanggal_publikasi" name="tanggal_publikasi"
                                            value="{{ old('tanggal_publikasi', $berita->tanggal_publikasi->format('Y-m-d')) }}"
                                            required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar text-success"></i>
                                            </span>
                                        </div>
                                        @error('tanggal_publikasi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit Buttons -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block py-2">
                                        <i class="fas fa-save mr-2"></i> Update Berita
                                    </button>
                                    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary btn-block py-2">
                                        <i class="fas fa-times mr-2"></i> Batal
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Menampilkan nama file yang dipilih
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            var fileName = document.getElementById("gambar").files[0]?.name || 'Pilih file gambar...';
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });

        // Image preview function
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const currentImage = input.closest('.form-group').querySelector('img:not(#imagePreview)');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    // Hide current image when a new one is selected
                    if (currentImage) {
                        currentImage.style.display = 'none';
                    }
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
                // Show current image again if file selection is cancelled
                if (currentImage) {
                    currentImage.style.display = 'block';
                }
            }
        }
    </script>
@endsection