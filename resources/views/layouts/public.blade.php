<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Panti Asuhan Bahagia</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
        }
        .navbar-brand {
            font-weight: bold;
            color: #667eea !important;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-hands-helping me-2"></i>
                Panti Asuhan Bahagia
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" 
                           href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" 
                           href="{{ route('profil') }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('berita') ? 'active' : '' }}" 
                           href="{{ route('berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('acara') ? 'active' : '' }}" 
                           href="{{ route('acara') }}">Acara</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('donasi') ? 'active' : '' }}" 
                           href="{{ route('donasi') }}">Donasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" 
                           href="{{ route('login') }}">Login Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Panti Asuhan Bahagia</h5>
                    <p>Membantu anak-anak yatim piatu meraih masa depan yang lebih baik</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>Email: info@panti-bahagia.org<br>
                       Telp: (021) 123-4567</p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; 2024 Panti Asuhan Bahagia. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Scripts -->
    @stack('scripts')
</body>
</html>