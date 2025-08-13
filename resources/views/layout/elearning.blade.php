<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Learning DISDIKAL')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fb;
        }
        .navbar {
            background-color: #054b96;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 600;
        }
        .navbar-nav .nav-link.active, .navbar-nav .nav-link:hover {
            color: #d1e7ff !important;
        }
        .hero {
            margin-top: 96px;
            padding: 48px 24px;
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(5,75,150,0.90), rgba(5,75,150,0.75)), url('{{ asset('assets/images/kapal.jpg') }}') center/cover no-repeat;
            color: #fff;
        }
        .hero h1 {
            font-weight: 800;
        }
        .card-e {
            border: none;
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .card-e:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(0,0,0,0.12);
        }
        footer {
            margin-top: 48px;
            padding: 24px 0;
            color: #6c757d;
        }
    </style>
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid px-3">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('landing') }}">
            <img src="{{ asset('assets/images/Group 1.png') }}" alt="Logo" width="36" height="36" class="d-inline-block">
            <span>E-Learning DISDIKAL</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }}" href="{{ route('landing') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('struktur_organisasi') ? 'active' : '' }}" href="{{ route('struktur_organisasi') }}">Struktur Organisasi</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('questioner.*') ? 'active' : '' }}" href="{{ route('questioner.form') }}">Survey</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('elibrary.*') ? 'active' : '' }}" href="{{ route('elibrary.index') }}">E-Library</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('pengumuman.*') ? 'active' : '' }}" href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
            </ul>
            <div class="d-flex">
                <a href="/admin/login" class="btn btn-light text-primary fw-semibold">Login Admin</a>
            </div>
        </div>
    </div>
</nav>

<main class="container">
    @yield('content')
</main>

<footer class="text-center">
    <div class="container small">
        © {{ date('Y') }} DISDIKAL - E-Learning Platform
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>