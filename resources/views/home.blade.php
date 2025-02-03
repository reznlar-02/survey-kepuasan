<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        header nav ul {
            list-style-type: none;
            padding: 0;
        }
        header nav ul li {
            display: inline;
            margin-right: 15px;
        }
        header nav ul li a {
            text-decoration: none;
            color: #333;
        }
        section {
            padding: 20px;
            margin-top: 120px; /* Jarak antara navbar dan section */
        }
        h1 {
            color: #2c3e50;
        }
        .welcome-message {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 10px;
        }
        .links {
            margin-top: 20px;
        }
        .links a {
            display: inline-block;
            margin-right: 15px;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .links a:hover {
            background-color: #2980b9;
        }
        .navbar {
            background-color: #054b96; /* Warna background navbar */
        }
        
        .navbar-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }
        
        .navbar-brand img {
            margin-right: 10px;
        }
        
        .navbar-nav .nav-link {
            color: white !important; /* Warna teks navbar putih */
            font-weight: bold;
            padding: 10px 20px;
            text-transform: uppercase;
        }
        
        .navbar-nav .nav-link:hover {
            color: #d1e7ff !important; /* Warna teks saat hover */
        }
        
        .navbar-toggler {
            background-color: white;
            border-radius: 5px;
        }

        .navbar-toggler-icon {
            filter: invert(1);
        }
    </style>
    <!-- Menambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #054b96; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 0.5rem 1rem;">
            <div class="container-fluid d-flex justify-content-center">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/images/Group 1.png') }}" alt="" width="60" height="60">
                    E-LIBRARY DISDIKAL
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                    <div class="navbar-nav text-center">
                        <a class="nav-link fw-bold menu-item" href="{{ route('questioner.form') }}">Home</a>
                        <a class="nav-link fw-bold menu-item" href="{{ route('struktur_organisasi') }}">Struktur Organisasi</a>
                    </div>
                    <div style="position: absolute; top: 20px; right: 20px;">
                        <a href="/admin/login" class="btn btn-primary">Login Admin</a>
                    </div>                    
                </div>
            </div>
        </nav>
    </header>

    <section>
        <div class="welcome-message" class="text-center">
            <h1>Selamat Datang di website Dinas Pendidikan TNI AL</h1>
            <p>Ini adalah halaman utama. Dari sini, Anda dapat mengakses berbagai fitur situs kami seperti melihat struktur organisasi, mengisi survey kepuasan, mengunjungi perpustakaan elektronik, dan melihat pengumuman terbaru.</p>
        </div>

        <div class="links">
            <a href="{{ route('struktur_organisasi') }}">Struktur Organisasi</a>
            <a href="{{ route('questioner') }}">Isi Survey</a>
            <a href="{{ route('e_library') }}">Kunjungi E-Library</a>
            <a href="{{ route('pengumuman') }}">Lihat Pengumuman</a>
        </div>
    </section>
</body>
</html>