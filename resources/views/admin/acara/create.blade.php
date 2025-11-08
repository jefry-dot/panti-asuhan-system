@extends('layouts.admin')

@section('title', 'Tambah Acara')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="color: #16a34a !important;">Tambah Acara Baru</h1>
        <a href="{{ route('admin.acara.index') }}" class="d-none d-sm-inline-block btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="card shadow mb-4 form-card">
        <div class="card-header py-3" style="border-bottom: 2px solid #22c55e;">
            <h6 class="m-0 font-weight-bold" style="color: #16a34a;">
                <i class="fas fa-plus-circle"></i> Form Tambah Acara
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.acara.store') }}" method="POST" enctype="multipart/form-data" id="acaraForm">
                @csrf
                
                <div class="row">
                    <div class="col-md-8">
                        <!-- Nama Acara -->
                        <div class="form-group mb-4">
                            <label for="nama_acara" class="font-weight-bold">Nama Acara *</label>
                            <div class="input-group">
                                <input type="text" 
                                       class="form-control @error('nama_acara') is-invalid @enderror" 
                                       id="nama_acara" 
                                       name="nama_acara" 
                                       value="{{ old('nama_acara') }}" 
                                       placeholder="Masukkan nama acara..."
                                       required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar-alt text-success"></i>
                                    </span>
                                </div>
                                @error('nama_acara')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group mb-4">
                            <label for="deskripsi" class="font-weight-bold">Deskripsi Acara *</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" 
                                      name="deskripsi" 
                                      rows="8" 
                                      placeholder="Tulis deskripsi lengkap acara di sini..."
                                      required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Jelaskan detail acara, tujuan, dan manfaat untuk calon peserta.
                            </small>
                        </div>

                        <!-- Lokasi -->
                        <div class="form-group mb-4">
                            <label for="lokasi" class="font-weight-bold">Lokasi Acara *</label>
                            <div class="input-group">
                                <input type="text" 
                                       class="form-control @error('lokasi') is-invalid @enderror" 
                                       id="lokasi" 
                                       name="lokasi" 
                                       value="{{ old('lokasi') }}" 
                                       placeholder="Masukkan lokasi acara..."
                                       required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-map-marker-alt text-success"></i>
                                    </span>
                                </div>
                                @error('lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Sidebar Form -->
                        <div class="sticky-top" style="top: 20px;">
                            <!-- Poster -->
                            <div class="form-group mb-4">
                                <label for="poster" class="font-weight-bold">Poster Acara *</label>
                                <div class="custom-file">
                                    <input type="file" 
                                           class="custom-file-input @error('poster') is-invalid @enderror" 
                                           id="poster" 
                                           name="poster" 
                                           accept="image/*" 
                                           required
                                           onchange="previewImage(this)">
                                    <label class="custom-file-label" for="poster">Pilih file poster...</label>
                                    @error('poster')
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
                                         alt="Preview Poster" 
                                         class="img-fluid rounded shadow-sm"
                                         style="max-height: 200px; display: none;">
                                    <div id="noImagePreview" class="text-muted py-4 border rounded">
                                        <i class="fas fa-image fa-2x mb-2"></i>
                                        <br>
                                        Preview poster akan muncul di sini
                                    </div>
                                </div>
                            </div>

                            <!-- Tanggal & Waktu -->
                            <div class="form-group mb-4">
                                <label for="tanggal_mulai" class="font-weight-bold">Tanggal Mulai *</label>
                                <div class="input-group">
                                    <input type="date" 
                                           class="form-control @error('tanggal_mulai') is-invalid @enderror" 
                                           id="tanggal_mulai" 
                                           name="tanggal_mulai" 
                                           value="{{ old('tanggal_mulai') }}" 
                                           required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar text-success"></i>
                                        </span>
                                    </div>
                                    @error('tanggal_mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="tanggal_selesai" class="font-weight-bold">Tanggal Selesai *</label>
                                <div class="input-group">
                                    <input type="date" 
                                           class="form-control @error('tanggal_selesai') is-invalid @enderror" 
                                           id="tanggal_selesai" 
                                           name="tanggal_selesai" 
                                           value="{{ old('tanggal_selesai') }}" 
                                           required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar text-success"></i>
                                        </span>
                                    </div>
                                    @error('tanggal_selesai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="waktu_mulai" class="font-weight-bold">Waktu Mulai *</label>
                                        <div class="input-group">
                                            <input type="time" 
                                                   class="form-control @error('waktu_mulai') is-invalid @enderror" 
                                                   id="waktu_mulai" 
                                                   name="waktu_mulai" 
                                                   value="{{ old('waktu_mulai') }}" 
                                                   required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-clock text-success"></i>
                                                </span>
                                            </div>
                                            @error('waktu_mulai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="waktu_selesai" class="font-weight-bold">Waktu Selesai *</label>
                                        <div class="input-group">
                                            <input type="time" 
                                                   class="form-control @error('waktu_selesai') is-invalid @enderror" 
                                                   id="waktu_selesai" 
                                                   name="waktu_selesai" 
                                                   value="{{ old('waktu_selesai') }}" 
                                                   required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-clock text-success"></i>
                                                </span>
                                            </div>
                                            @error('waktu_selesai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kuota Peserta -->
                            <div class="form-group mb-4">
                                <label for="kuota_peserta" class="font-weight-bold">Kuota Peserta</label>
                                <div class="input-group">
                                    <input type="number" 
                                           class="form-control @error('kuota_peserta') is-invalid @enderror" 
                                           id="kuota_peserta" 
                                           name="kuota_peserta" 
                                           value="{{ old('kuota_peserta') }}" 
                                           placeholder="Opsional"
                                           min="1">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-users text-success"></i>
                                        </span>
                                    </div>
                                    @error('kuota_peserta')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">
                                    Kosongkan jika tidak ada batasan kuota.
                                </small>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block py-2">
                                    <i class="fas fa-save mr-2"></i> Simpan Acara
                                </button>
                                <a href="{{ route('admin.acara.index') }}" class="btn btn-secondary btn-block py-2">
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
        var fileName = document.getElementById("poster").files[0].name;
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

    // Date validation
    document.getElementById('tanggal_selesai').addEventListener('change', function() {
        const mulai = document.getElementById('tanggal_mulai').value;
        const selesai = this.value;
        
        if (selesai < mulai) {
            alert('Tanggal selesai tidak boleh sebelum tanggal mulai!');
            this.value = mulai;
        }
    });

    // Time validation
    document.getElementById('waktu_selesai').addEventListener('change', function() {
        const mulai = document.getElementById('waktu_mulai').value;
        const selesai = this.value;
        const tanggalMulai = document.getElementById('tanggal_mulai').value;
        const tanggalSelesai = document.getElementById('tanggal_selesai').value;
        
        if (tanggalMulai === tanggalSelesai && selesai <= mulai) {
            alert('Waktu selesai harus setelah waktu mulai!');
            this.value = '';
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