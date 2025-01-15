<!-- resources/views/admin/lokasi/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Lokasi</h1>
    <a href="{{ route('admin.lokasi.create') }}" class="btn btn-primary">Tambah Lokasi</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama Lokasi</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lokasis as $lokasi)
            <tr>
                <td>{{ $lokasi->nama_lokasi }}</td>
                <td>{{ $lokasi->deskripsi }}</td>
                <td>
                    <a href="{{ route('admin.lokasi.edit', $lokasi->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.lokasi.destroy', $lokasi->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
