{{-- resources/views/admin/manage_users.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Manage Users and Commanders</h2>

    {{-- Tabel user biasa --}}
    <h3>Users</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('admin.delete', $user->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Tabel user komandan --}}
    <h3>Commanders</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commanders as $index => $commander)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $commander->name }}</td>
                    <td>{{ $commander->email }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $commander->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('admin.delete', $commander->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection