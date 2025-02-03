<!-- resources/views/admin/create_strata.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Strata Baru</h2>

    <form action="{{ route('strata.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_strata" class="form-label">Nama Strata</label>
            <input type="text" class="form-control" id="nama_strata" name="nama_strata" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('strata.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection