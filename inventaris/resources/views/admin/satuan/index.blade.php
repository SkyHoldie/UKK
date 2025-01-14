@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Satuan</h1>
    <a href="{{ route('admin.satuan.create') }}" class="btn btn-primary mb-3">Tambah Satuan</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($satuans as $satuan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $satuan->nama }}</td>
                    <td>
                        <a href="{{ route('admin.satuan.edit', $satuan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.satuan.destroy', $satuan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
