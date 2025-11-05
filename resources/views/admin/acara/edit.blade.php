@extends('admin.layout')

@section('title', 'Edit Acara')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="color: #16a34a !important;">Edit Acara</h1>
        <a href="{{ route('admin.acara.index') }}" class="d-none d-sm-inline-block btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="card shadow mb-4 form-card">
        <div class="card-header py-3" style="border-bottom: 2px solid #22c55e;">
            <h6 class="m-0 font-weight-bold" style="color: #16a34a;">
                <i class="fas fa-edit"></i> Form Edit Acara
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.acara.update', $acara->id) }}" method="POST" enctype="multipart/form-data" id="acaraForm">
                @csrf
                @method('PUT')
                
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
                                       value="{{ old('nama_acara', $acara->nama_acara) }}" 
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
                                      required>{{ old('deskripsi', $acara->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Lokasi -->
                        <div class="form-group mb-4">
                            <label for="lokasi" class="font-weight-bold">Lokasi Acara *</label>
                            <div class="input-group">
                                <input type="text" 
                                       class="form-control @error('lokasi') is-invalid @enderror" 
                                       id="lokasi" 
                                       name="lokasi" 
                                       value="{{ old('lokasi', $acara->lokasi) }}" 
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
                                <label for="poster" class="font-weight-bold">Poster Acara</label>
                                <div class="custom-file">
                                    <input type="file" 
                                           class="custom-file-input @error('poster') is-invalid @enderror" 
                                           id="poster" 
                                           name="poster" 
                                           accept="image/*"
                                           onchange="previewImage(this)">
                                    <label class="custom-file-label" for="poster">
                                        {{ $acara->poster ? 'Ganti poster...' : 'Pilih file poster...' }}
                                    </label>
                                    @error('poster')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">
                                    Kosongkan jika tidak ingin mengganti poster.
                                </small>
                                
                                <!-- Current Image -->
                                @if($acara->poster)
                                <div class="mt-3 text-center">
                                    <p class="small text-muted mb-2">Poster Saat Ini:</p>
                                    <img src="{{ asset('storage/' . $acara->poster) }}" 
                                         alt="{{ $acara->nama_acara }}" 
                                         class="img-fluid rounded shadow-sm"
                                         style="max-height: 200px;">
                                </div>
                                @endif
                                
                                <!-- Image Preview -->
                                <div class="mt-3 text-center">
                                    <img id="imagePreview" 
                                         src="#" 
                                         alt="Preview Poster" 
                                         class="img-fluid rounded shadow-sm"
                                         style="max-height: 200px; display: none;">
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
                                           value="{{ old('tanggal_mulai', $acara->tanggal_mulai->format('Y-m-d')) }}" 
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
                                           value="{{ old('tanggal_selesai', $acara->tanggal_selesai->format('Y-m-d')) }}" 
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
                                                   value="{{ old('waktu_mulai', $acara->waktu_mulai) }}" 
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
                                                   value="{{ old('waktu_selesai', $acara->waktu_selesai) }}" 
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
                                           value="{{ old('kuota_peserta', $acara->kuota_peserta) }}" 
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
                            </div>

                            <!-- Submit Buttons -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block py-2">
                                    <i class="fas fa-save mr-2"></i> Update Acara
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
        var fileName = document.getElementById("poster").files[0]?.name || 'Pilih file poster...';
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });

    // Image preview function
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
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
</script>
@endsection