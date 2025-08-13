<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISDIKAL</title>
    <!-- Include your CSS or Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar goes here -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #054b96; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 0.5rem 1rem;">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand text-center fw-bold" href="#">
                <img src="{{ asset('assets/images/Group 1.png') }}" alt="" width="40" height="40" class="d-inline-block align-text-center">
                DISDIKAL
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav text-center">
                    <a class="nav-link fw-bold menu-item" aria-current="page" href="{{ route('landing') }}">Home</a>
                    <a class="nav-link fw-bold menu-item" href="{{ route('struktur_organisasi') }}">Struktur Organisasi</a>
                    <a class="nav-link fw-bold menu-item" href="{{ route('questioner.form') }}">Questioner</a>
                    <a class="nav-link fw-bold menu-item" href="{{ route('elibrary.index') }}">E-Library</a>
                    <a class="nav-link fw-bold active menu-item" href="{{ route('pengumuman.index') }}">Pengumuman</a>
                    <div>
                        <a class="nav-link menu-item" href="/admin/login">Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content section -->
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Bootstrap JS or custom scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>