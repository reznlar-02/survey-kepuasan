@extends('layout.elearning')

@section('title', 'Beranda')

@section('content')
    <section class="hero mb-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-6 mb-3">Selamat Datang di Platform E-Learning DISDIKAL</h1>
                    <p class="lead mb-4">Akses materi, perpustakaan digital, dan survey kepuasan dalam satu tempat.</p>
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('questioner.form') }}" class="btn btn-light text-primary fw-semibold">Mulai Survey</a>
                        <a href="{{ route('elibrary.index') }}" class="btn btn-outline-light">Jelajahi E-Library</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-3">
        <h2 class="h4 mb-3">Modul Pembelajaran</h2>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card card-e h-100">
                    <div class="card-body">
                        <h5 class="card-title">Survey Kepuasan</h5>
                        <p class="card-text">Ikuti survey untuk meningkatkan kualitas pelayanan pendidikan.</p>
                        <a href="{{ route('questioner.form') }}" class="btn btn-primary">Isi Survey</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-e h-100">
                    <div class="card-body">
                        <h5 class="card-title">E-Library</h5>
                        <p class="card-text">Koleksi buku dan referensi digital untuk mendukung proses belajar.</p>
                        <a href="{{ route('elibrary.index') }}" class="btn btn-primary">Buka E-Library</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-e h-100">
                    <div class="card-body">
                        <h5 class="card-title">Struktur Organisasi</h5>
                        <p class="card-text">Kenali struktur organisasi DISDIKAL sebagai acuan layanan.</p>
                        <a href="{{ route('struktur_organisasi') }}" class="btn btn-primary">Lihat Struktur</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection