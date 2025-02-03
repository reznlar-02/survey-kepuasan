<!-- resources/views/admin/edit_pendidikan.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pendidikan</h2>

    <form action="{{ route('pendidikan.update', $pendidikan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_pendidikan" class="form-label">Nama Pendidikan</label>
            <input type="text" class="form-control" id="nama_pendidikan" name="nama_pendidikan" value="{{ $pendidikan->nama_pendidikan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('strata.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection