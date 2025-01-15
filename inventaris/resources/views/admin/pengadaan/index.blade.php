@extends('layouts.app')

@section('content')
    <h1>Daftar Pengadaan</h1>
    <a href="{{ route('admin.pengadaan.create') }}" class="btn btn-primary mb-3">Buat Pengadaan Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pengadaan</th>
                <th>Tanggal Pengadaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengadaan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_pengadaan }}</td>
                    <td>{{ $item->tanggal_pengadaan }}</td>
                    <td>
                        <a href="{{ route('admin.pengadaan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.pengadaan.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
