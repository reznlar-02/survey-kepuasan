<!-- resources/views/admin/create_pendidikan.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pendidikan untuk Strata: {{ $strata->nama_strata }}</h2>

    <form action="{{ route('pendidikan.store', $strata->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_pendidikan" class="form-label">Nama Pendidikan</label>
            <input type="text" class="form-control" id="nama_pendidikan" name="nama_pendidikan" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('strata.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection