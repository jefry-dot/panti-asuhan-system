<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Admin Panti Asuhan</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .sidebar {
            min-height: 100vh;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .sidebar .nav-link {
            color: #333;
            padding: 10px 15px;
            margin: 5px 0;
            border-radius: 5px;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 sidebar bg-light">
                <div class="sidebar-sticky pt-3">
                    <div class="text-center mb-4">
                        <h5 class="text-primary">
                            <i class="fas fa-hands-helping"></i>
                            Panti Asuhan Admin
                        </h5>
                    </div>
                    
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            {{-- <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" 
                               href="{{ route('admin.dashboard') }}"> --}}
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            {{-- </a> --}}
                        </li>
                        <li class="nav-item">
                            {{-- <a class="nav-link {{ Request::is('admin/berita*') ? 'active' : '' }}" 
                               href="{{ route('admin.berita.index') }}"> --}}
                                <i class="fas fa-newspaper me-2"></i> Berita
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a class="nav-link {{ Request::is('admin/acara*') ? 'active' : '' }}" 
                               href="{{ route('admin.acara.index') }}"> --}}
                                <i class="fas fa-calendar-alt me-2"></i> Acara
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a class="nav-link {{ Request::is('admin/donasi*') ? 'active' : '' }}" 
                               href="{{ route('admin.donasi.index') }}"> --}}
                                <i class="fas fa-donate me-2"></i> Donasi
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Top navbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#navbarSupportedContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                                       role="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-user-circle me-1"></i> 
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Page content -->
                <div class="container-fluid py-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Scripts -->
    @stack('scripts')
</body>
</html>