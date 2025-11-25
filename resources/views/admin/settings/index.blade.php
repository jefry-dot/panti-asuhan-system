@extends('layouts.admin')

@section('title', 'Pengaturan Logo & Favicon')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-cog me-2"></i>Pengaturan Logo & Favicon
        </h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Upload Logo Panti Asuhan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.settings.logo') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-bold">Logo Saat Ini:</label>
                            <div class="text-center p-4 bg-light rounded">
                                @if ($logo)
                                    <img src="{{ asset('storage/' . $logo) }}"
                                         alt="Current Logo"
                                         class="img-fluid rounded shadow"
                                         style="max-height: 200px;">
                                @else
                                    <div class="text-muted">
                                        <i class="fas fa-image fa-3x mb-2"></i>
                                        <p>Belum ada logo yang diupload</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label fw-bold">Upload Logo Baru:</label>
                            <input type="file"
                                   class="form-control @error('logo') is-invalid @enderror"
                                   id="logo"
                                   name="logo"
                                   accept="image/*"
                                   required>
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle"></i> Format yang didukung: JPG, JPEG, PNG, GIF, SVG (Max: 2MB)
                            </small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Preview:</label>
                            <div class="text-center p-4 bg-light rounded">
                                <img id="preview"
                                     src=""
                                     alt="Preview"
                                     class="img-fluid rounded shadow d-none"
                                     style="max-height: 200px;">
                                <div id="preview-placeholder" class="text-muted">
                                    <i class="fas fa-eye-slash fa-2x mb-2"></i>
                                    <p>Preview akan muncul setelah Anda memilih gambar</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan Logo
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Card Favicon -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Upload Favicon</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.settings.favicon') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-bold">Favicon Saat Ini:</label>
                            <div class="text-center p-4 bg-light rounded">
                                @if ($favicon)
                                    <img src="{{ asset('storage/' . $favicon) }}"
                                         alt="Current Favicon"
                                         class="img-fluid rounded shadow"
                                         style="max-height: 100px;">
                                @else
                                    <div class="text-muted">
                                        <i class="fas fa-browser fa-3x mb-2"></i>
                                        <p>Belum ada favicon yang diupload</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="favicon" class="form-label fw-bold">Upload Favicon Baru:</label>
                            <input type="file"
                                   class="form-control @error('favicon') is-invalid @enderror"
                                   id="favicon"
                                   name="favicon"
                                   accept="image/*,.ico"
                                   required>
                            @error('favicon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle"></i> Format: ICO, PNG, JPG, GIF, SVG (Max: 512KB)
                            </small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Preview:</label>
                            <div class="text-center p-4 bg-light rounded">
                                <img id="favicon-preview"
                                     src=""
                                     alt="Preview"
                                     class="img-fluid rounded shadow d-none"
                                     style="max-height: 100px;">
                                <div id="favicon-preview-placeholder" class="text-muted">
                                    <i class="fas fa-eye-slash fa-2x mb-2"></i>
                                    <p>Preview akan muncul setelah Anda memilih gambar</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan Favicon
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Panduan</h6>
                </div>
                <div class="card-body">
                    <h6 class="font-weight-bold mb-3">Tips Upload Logo:</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Gunakan gambar dengan resolusi tinggi
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Ukuran maksimal file 2MB
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Format yang disarankan: PNG dengan background transparan
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Logo akan tampil di halaman publik dan admin
                        </li>
                    </ul>

                    <hr class="my-4">

                    <h6 class="font-weight-bold mb-3">Tips Upload Favicon:</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Ukuran ideal: 16x16 atau 32x32 pixels
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Ukuran maksimal file 512KB
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Format terbaik: ICO atau PNG
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Favicon akan tampil di tab browser
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Preview logo before upload
        document.getElementById('logo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview');
                    const placeholder = document.getElementById('preview-placeholder');

                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                    placeholder.classList.add('d-none');
                }
                reader.readAsDataURL(file);
            }
        });

        // Preview favicon before upload
        document.getElementById('favicon').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('favicon-preview');
                    const placeholder = document.getElementById('favicon-preview-placeholder');

                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                    placeholder.classList.add('d-none');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
