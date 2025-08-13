<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">TIAR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('siswa*') ? 'active' : '' }}" href="{{ route('siswa.index') }}">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('kas*') ? 'active' : '' }}" href="{{ route('kas.index') }}">Kas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('bulan_kas*') ? 'active' : '' }}" href="{{ route('bulan_kas.index') }}">Bulan Kas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Konten Halaman --}}
    <div class="container">
        {{-- Alert jika ada pesan sukses --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tempat konten halaman --}}
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
