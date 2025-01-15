<!-- resources/views/admin/mutasi_lokasi/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Mutasi Lokasi</h1>
    <a href="{{ route('admin.mutasi_lokasi.create') }}" class="btn btn-primary">Tambah Mutasi Lokasi</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama Mutasi</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mutasiLokasis as $mutasi)
            <tr>
                <td>{{ $mutasi->nama_mutasi }}</td>
                <td>{{ $mutasi->deskripsi }}</td>
                <td>
                    <a href="{{ route('admin.mutasi_lokasi.edit', $mutasi->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.mutasi_lokasi.destroy', $mutasi->id) }}" method="POST" style="display:inline;">
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
