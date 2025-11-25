<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Donatur - Panti Asuhan')</title>

    @if(getFavicon())
        <link rel="icon" type="image/x-icon" href="{{ getFavicon() }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ getFavicon() }}">
    @endif

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="min-h-screen flex bg-gradient-to-br from-green-50 via-emerald-100 to-teal-50">

    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar w-64 min-h-screen p-6 flex flex-col bg-white/80 backdrop-blur-lg shadow-md">
        <!-- Logo -->
        <div class="flex items-center mb-10">
            @if(getLogo())
                <img src="{{ getLogo() }}" alt="Logo" class="w-12 h-12 object-contain mr-3">
            @else
                <div class="w-12 h-12 logo-circle rounded-full flex items-center justify-center shadow-lg mr-3 bg-emerald-500">
                    <i class="fas fa-leaf text-white text-xl"></i>
                </div>
            @endif
            <h1 class="text-xl font-bold text-emerald-800">Panti Asuhan</h1>
        </div>

        <!-- User Info -->
        <div class="flex items-center mb-8 p-4 rounded-xl bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200">
            <div class="w-12 h-12 rounded-full bg-emerald-500 flex items-center justify-center text-white font-bold text-lg mr-3">
                {{ strtoupper(substr(Auth::user()->name ?? 'D', 0, 1)) }}
            </div>
            <div>
                <h2 class="font-semibold text-emerald-800">{{ Auth::user()->name ?? 'Donatur' }}</h2>
                <p class="text-sm text-emerald-600">User</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('user.dashboard') }}"
                       class="nav-item flex items-center p-3 rounded-lg font-medium transition 
                              {{ request()->routeIs('user.dashboard') ? 'bg-emerald-100 text-emerald-800' : 'text-emerald-700 hover:bg-emerald-50' }}">
                        <i class="fas fa-home mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.donations') }}"
                       class="nav-item flex items-center p-3 rounded-lg font-medium transition 
                              {{ request()->routeIs('user.donations') ? 'bg-emerald-100 text-emerald-800' : 'text-emerald-700 hover:bg-emerald-50' }}">
                        <i class="fas fa-donate mr-3"></i>
                        <span>Donasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.children') }}"
                       class="nav-item flex items-center p-3 rounded-lg font-medium transition 
                              {{ request()->routeIs('user.children') ? 'bg-emerald-100 text-emerald-800' : 'text-emerald-700 hover:bg-emerald-50' }}">
                        <i class="fas fa-users mr-3"></i>
                        <span>Anak Asuh</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.history') }}"
                       class="nav-item flex items-center p-3 rounded-lg font-medium transition 
                              {{ request()->routeIs('user.history') ? 'bg-emerald-100 text-emerald-800' : 'text-emerald-700 hover:bg-emerald-50' }}">
                        <i class="fas fa-history mr-3"></i>
                        <span>Riwayat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.profile') }}"
                       class="nav-item flex items-center p-3 rounded-lg font-medium transition 
                              {{ request()->routeIs('user.profile') ? 'bg-emerald-100 text-emerald-800' : 'text-emerald-700 hover:bg-emerald-50' }}">
                        <i class="fas fa-user mr-3"></i>
                        <span>Profil</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Logout -->
        <div class="mt-auto">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="flex items-center w-full p-3 text-emerald-700 font-medium rounded-xl 
                               hover:bg-red-50 hover:text-red-600 transition duration-300">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8 overflow-y-auto">
        <header class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-emerald-800">@yield('page-title')</h1>
                <p class="text-emerald-600">@yield('page-subtitle')</p>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-emerald-700 shadow-sm hover:shadow-md transition duration-300">
                        <i class="fas fa-bell"></i>
                    </button>
                    <span class="absolute top-0 right-0 w-3 h-3 bg-red-500 rounded-full"></span>
                </div>
                <div class="relative">
                    <button class="flex items-center space-x-2 bg-white rounded-xl p-2 shadow-sm hover:shadow-md transition duration-300">
                        <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white font-bold">
                            {{ strtoupper(substr(Auth::user()->name ?? 'D', 0, 1)) }}
                        </div>
                        <i class="fas fa-chevron-down text-emerald-700"></i>
                    </button>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
