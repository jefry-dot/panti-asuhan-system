<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panti Asuhan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        /* CSS yang Anda berikan */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,
                    #fffbeb 0%,
                    #fef3c7 25%,
                    #fef7ed 50%,
                    #ecfccb 75%,
                    #d9f99d 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
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

        .dashboard-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(187, 247, 208, 0.4);
            box-shadow: 0 10px 30px rgba(34, 197, 94, 0.1), 0 0 0 1px rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(34, 197, 94, 0.15), 0 0 0 1px rgba(255, 255, 255, 0.8);
        }

        .btn-primary {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(34, 197, 94, 0.4);
        }

        .sidebar {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.05);
            width: 14rem !important;
            transition: all 0.3s ease;
        }

        .sidebar.toggled {
            width: 0 !important;
            overflow: hidden;
        }

        .sidebar .sidebar-brand-text {
            display: inline;
        }

        .sidebar.toggled .sidebar-brand-text {
            display: none;
        }

        .sidebar .nav-item .nav-link span {
            display: inline;
        }

        .sidebar.toggled .nav-item .nav-link span {
            display: none;
        }

        #content-wrapper {
            transition: all 0.3s ease;
        }


        .nav-item {
            transition: all 0.3s ease;
            border-radius: 0.75rem;
            margin: 0 0.5rem;
        }

        .nav-item:hover {
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            transform: translateX(5px);
        }

        .nav-item.active {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
        }

        .nav-item.active .nav-link,
        .nav-item.active .nav-link i {
            color: white !important;
        }

        .logo-circle {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.3);
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
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1) 0%, rgba(187, 247, 208, 0.05) 100%);
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

        .stat-card {
            border-left: 4px solid #22c55e;
        }

        .progress-bar {
            background: linear-gradient(90deg, #22c55e 0%, #16a34a 100%);
            height: 8px;
            border-radius: 4px;
        }

        .donation-item {
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .donation-item:hover {
            border-left-color: #22c55e;
            transform: translateX(5px);
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #22c55e;
            transition: all 0.3s ease;
        }

        .input-group input {
            padding-left: 45px;
            transition: all 0.3s ease;
        }

        .input-group input:focus+i {
            color: #16a34a;
            transform: translateY(-50%) scale(1.1);
        }

        .login-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(187, 247, 208, 0.4);
            box-shadow: 0 20px 40px rgba(34, 197, 94, 0.15), 0 0 0 1px rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .social-login {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        }

        .social-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.2);
            border-color: #22c55e;
        }

        .divider {
            background: linear-gradient(90deg, transparent, #22c55e, transparent);
            height: 1px;
        }

        .hidden {
            display: none;
        }

        .table-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(187, 247, 208, 0.4);
            box-shadow: 0 10px 30px rgba(34, 197, 94, 0.1);
            backdrop-filter: blur(10px);
        }

        .form-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(187, 247, 208, 0.4);
            box-shadow: 0 15px 35px rgba(34, 197, 94, 0.1);
            backdrop-filter: blur(10px);
        }

        .action-btn {
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }
    </style>

    {{-- YIELD scripts di HEAD jika ada CSS/JS yang perlu dimuat di awal --}}
    @yield('styles')
</head>

<body id="page-top">
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div id="wrapper" class="d-flex">
        <ul class="navbar-nav bg-white sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ route('admin.dashboard') }}">
                <div class="sidebar-brand-icon">
                    <div class="logo-circle rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 40px; height: 40px;">
                        <i class="fas fa-hands-helping text-white"></i>
                    </div>
                </div>
                <div class="sidebar-brand-text mx-3 text-dark">Admin Panti</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link text-dark" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                <a class="nav-link text-dark" href="{{ route('admin.berita.index') }}">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Manajemen Berita</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.acara.*') ? 'active' : '' }}">
                <a class="nav-link text-dark" href="{{ route('admin.acara.index') }}">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Manajemen Acara</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.donasi.*') ? 'active' : '' }}">
                <a class="nav-link text-dark" href="{{ route('admin.donasi.index') }}">
                    <i class="fas fa-fw fa-donate"></i>
                    <span>Riwayat Donasi</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle" style="background-color: #22c55e;"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{-- SAFE AUTH CHECK: Menampilkan nama user atau "Admin" jika belum login --}}
                                    @auth
                                        {{ Auth::user()->name }}
                                    @else
                                        Admin
                                    @endauth
                                </span>
                                @auth
                                    <img class="img-profile rounded-circle"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=22c55e&color=ffffff">
                                @else
                                    <img class="img-profile rounded-circle"
                                        src="https://ui-avatars.com/api/?name=Admin&background=22c55e&color=ffffff">
                                @endauth
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    {{-- CONTENT UTAMA AKAN DIMUAT DI SINI --}}
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    {{-- PASTIKAN ROUTE LOGOUT SUDAH TERSEDIA DI web.php --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            // Toggle the side navigation
            $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
                $("ul.sidebar").toggleClass("toggled");

                // Menyembunyikan dan menampilkan kembali brand dan span
                if ($("ul.sidebar").hasClass("toggled")) {
                    $('.sidebar .sidebar-brand-text, .sidebar .nav-item .nav-link span').fadeOut(0); // Gunakan 0 untuk transisi cepat
                } else {
                    // Gunakan delay agar tampil setelah sidebar melebar
                    setTimeout(function () {
                        $('.sidebar .sidebar-brand-text, .sidebar .nav-item .nav-link span').fadeIn(100);
                    }, 200);
                }
            });

            // Close sidebar automatically on small screens
            $(window).resize(function () {
                if ($(window).width() < 768) {
                    $("ul.sidebar").addClass("toggled");
                    $('.sidebar .sidebar-brand-text, .sidebar .nav-item .nav-link span').fadeOut(0);
                } else {
                    $("ul.sidebar").removeClass("toggled");
                    $('.sidebar .sidebar-brand-text, .sidebar .nav-item .nav-link span').fadeIn(0);
                }
            });
        });
    </script>

    @yield('scripts')
</body>

</html>