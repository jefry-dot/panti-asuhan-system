<!-- resources/views/public/layout.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Yayasan Alza el Rahmah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('public.home') }}">Yayasan Alza el Rahmah</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('public.home') }}" class="nav-link">Beranda</a></li>
                    <li class="nav-item"><a href="{{ route('public.berita') }}" class="nav-link">Berita</a></li>
                    <li class="nav-item"><a href="{{ route('public.acara') }}" class="nav-link">Acara</a></li>
                    <li class="nav-item"><a href="{{ route('donation.form') }}" class="nav-link">Donasi</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4 mb-5">
        @yield('content')
    </main>

    <footer class="bg-primary text-white text-center py-3">
        <small>&copy; {{ date('Y') }} Yayasan Alza el Rahmah. All rights reserved.</small>
    </footer>
</body>

</html>