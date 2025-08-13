<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questioner</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Pastikan ada file CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #054b96; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 0.5rem 1rem;">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand text-center fw-bold" href="#">
                <img src="assets/images/Group 1.png" alt="" width="40" height="40" class="d-inline-block align-text-center"> <!-- Reduced image size -->
                DISDIKAL
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav text-center">
                    <a class="nav-link fw-bold menu-item" aria-current="page" href="{{ route('landing') }}">Home</a>
                    <a class="nav-link fw-bold active menu-item" href="{{ route('struktur_organisasi') }}">Struktur Organisasi</a>
                    <a class="nav-link fw-bold menu-item" href="/questioner">Questioner</a>
                    <a class="nav-link fw-bold menu-item" href="{{ route('elibrary.index') }}">E-Library</a>
                    <a class="nav-link fw-bold menu-item" href="{{ route('pengumuman.index') }}">Pengumuman</a>
                    <div> 
                        <a class="nav-link menu-item" href="/admin/login">Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</head>
<body>
   <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Title with Blue Background -->
            <h2 class="text-center mb-4 p-3 bg-primary text-white rounded">Survey Form</h2>
            
            <!-- Form with Outline -->
            <form action="{{ route('datadiri.store') }}" method="POST" class="border p-4 rounded shadow-sm">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="form-group mb-3">
                    <label for="nrp" class="form-label">NRP</label>
                    <input type="text" class="form-control" id="nrp" name="nrp" placeholder="Masukkan NRP Anda" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>
                <div class="form-group mb-3">
                    <label for="strata" class="form-label">Strata</label>
                    <select class="form-control" id="strata" name="strata" required>
                        <option value="Perwira">Perwira</option>
                        <option value="Bintara">Bintara</option>
                        <option value="Tamtama">Tamtama</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="pendidikan" class="form-label">Pendidikan</label>
                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Masukkan pendidikan terakhir Anda" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script src="{{ asset('js/app.js') }}"></script> <!-- Pastikan ada file JS -->
</body>
</html>