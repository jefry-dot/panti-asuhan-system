<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Yayasan Alza el Rahmah</title>

    {{-- CDN Bootstrap & FontAwesome --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    {{-- Import Font dan Style yang sama dengan Admin --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 25%, #fef7ed 50%, #ecfccb 75%, #d9f99d 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .navbar {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.15);
        }

        .navbar-brand {
            font-weight: 600;
            color: #16a34a !important;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #333 !important;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #16a34a !important;
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(34, 197, 94, 0.3);
        }

        footer {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 -4px 15px rgba(34, 197, 94, 0.1);
            padding: 1.5rem 0;
            margin-top: 3rem;
            text-align: center;
            font-size: 0.9rem;
        }

        .floating-shapes {
            position: fixed;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(187, 247, 208, 0.05));
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .card-glass {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(187, 247, 208, 0.4);
            box-shadow: 0 15px 35px rgba(34, 197, 94, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            transition: all 0.3s ease;
        }

        .card-glass:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(34, 197, 94, 0.15);
        }
    </style>

    @yield('styles')
</head>

<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    {{-- 🌿 Navbar Publik --}}
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('public.home') }}">
                <i class="fas fa-hands-helping me-2"></i>Yayasan Alza el Rohmah
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('public.home') ? 'text-success' : '' }}"
                            href="{{ route('public.home') }}">Beranda</a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('public.profil') ? 'text-success' : '' }}"
                            href="{{ route('public.profil') }}">Profil</a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('public.berita*') ? 'text-success' : '' }}"
                            href="{{ route('public.berita') }}">Berita</a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('public.acara*') ? 'text-success' : '' }}"
                            href="{{ route('public.acara') }}">Acara</a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('donation.form') ? 'text-success' : '' }}"
                            href="{{ route('donation.form') }}">Donasi</a></li>
                    @auth
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary ms-2">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="btn btn-sm btn-primary ms-2" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- 🌸 Konten Halaman --}}
    <main class="container py-5">
        @yield('content')
    </main>

    {{-- 🌿 Footer --}}
    <footer>
        <div class="container">
            <p class="mb-0 text-muted">&copy; {{ date('Y') }} Yayasan Alza el Rohmah. Semua hak dilindungi.</p>
        </div>
    </footer>

    {{-- Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>