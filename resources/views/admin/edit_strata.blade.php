<!-- resources/views/admin/edit_strata.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Strata</h2>

    <form action="{{ route('strata.update', $strata->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_strata" class="form-label">Nama Strata</label>
            <input type="text" class="form-control" id="nama_strata" name="nama_strata" value="{{ $strata->nama_strata }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('strata.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection