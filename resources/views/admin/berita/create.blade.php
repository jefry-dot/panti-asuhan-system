@extends('admin.layout')

@section('title', 'Tambah Berita')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="color: #16a34a !important;">Tambah Berita Baru</h1>
        <a href="{{ route('admin.berita.index') }}" class="d-none d-sm-inline-block btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="card shadow mb-4 form-card">
        <div class="card-header py-3" style="border-bottom: 2px solid #22c55e;">
            <h6 class="m-0 font-weight-bold" style="color: #16a34a;">
                <i class="fas fa-plus-circle"></i> Form Tambah Berita
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" id="beritaForm">
                @csrf
                
                <div class="row">
                    <div class="col-md-8">
                        <!-- Judul -->
                        <div class="form-group mb-4">
                            <label for="judul" class="font-weight-bold">Judul Berita *</label>
                            <div class="input-group">
                                <input type="text" 
                                       class="form-control @error('judul') is-invalid @enderror" 
                                       id="judul" 
                                       name="judul" 
                                       value="{{ old('judul') }}" 
                                       placeholder="Masukkan judul berita..."
                                       required>
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

                        <!-- Konten -->
                        <div class="form-group mb-4">
                            <label for="konten" class="font-weight-bold">Konten Berita *</label>
                            <textarea class="form-control @error('konten') is-invalid @enderror" 
                                      id="konten" 
                                      name="konten" 
                                      rows="12" 
                                      placeholder="Tulis konten berita di sini..."
                                      required>{{ old('konten') }}</textarea>
                            @error('konten')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Minimal 100 karakter. Gunakan format yang jelas dan mudah dibaca.
                            </small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Sidebar Form -->
                        <div class="sticky-top" style="top: 20px;">
                            <!-- Gambar -->
                            <div class="form-group mb-4">
                                <label for="gambar" class="font-weight-bold">Gambar Berita *</label>
                                <div class="custom-file">
                                    <input type="file" 
                                           class="custom-file-input @error('gambar') is-invalid @enderror" 
                                           id="gambar" 
                                           name="gambar" 
                                           accept="image/*" 
                                           required
                                           onchange="previewImage(this)">
                                    <label class="custom-file-label" for="gambar">Pilih file...</label>
                                    @error('gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">
                                    Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.
                                </small>
                                
                                <!-- Image Preview -->
                                <div class="mt-3 text-center">
                                    <img id="imagePreview" 
                                         src="#" 
                                         alt="Preview Gambar" 
                                         class="img-fluid rounded shadow-sm"
                                         style="max-height: 200px; display: none;">
                                    <div id="noImagePreview" class="text-muted py-4 border rounded">
                                        <i class="fas fa-image fa-2x mb-2"></i>
                                        <br>
                                        Preview gambar akan muncul di sini
                                    </div>
                                </div>
                            </div>

                            <!-- Penulis & Tanggal -->
                            <div class="form-group mb-4">
                                <label for="penulis" class="font-weight-bold">Penulis *</label>
                                <div class="input-group">
                                    <input type="text" 
                                           class="form-control @error('penulis') is-invalid @enderror" 
                                           id="penulis" 
                                           name="penulis" 
                                           value="{{ old('penulis', Auth::user()->name) }}" 
                                           required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-user text-success"></i>
                                        </span>
                                    </div>
                                    @error('penulis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="tanggal_publikasi" class="font-weight-bold">Tanggal Publikasi *</label>
                                <div class="input-group">
                                    <input type="date" 
                                           class="form-control @error('tanggal_publikasi') is-invalid @enderror" 
                                           id="tanggal_publikasi" 
                                           name="tanggal_publikasi" 
                                           value="{{ old('tanggal_publikasi', date('Y-m-d')) }}" 
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
                                    <i class="fas fa-save mr-2"></i> Simpan Berita
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
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("gambar").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });

    // Image preview function
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const noPreview = document.getElementById('noImagePreview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                noPreview.style.display = 'none';
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
            noPreview.style.display = 'block';
        }
    }

    // Form validation
    document.getElementById('beritaForm').addEventListener('submit', function(e) {
        const judul = document.getElementById('judul').value;
        const konten = document.getElementById('konten').value;
        
        if (konten.length < 100) {
            e.preventDefault();
            alert('Konten berita harus minimal 100 karakter.');
            return false;
        }
    });
</script>

<style>
    .sticky-top {
        position: -webkit-sticky;
        position: sticky;
        z-index: 100;
    }
    
    .custom-file-label::after {
        content: "Browse";
        background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
        color: white;
        border: none;
    }
</style>
@endsection