@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Merk</h1>
    <a href="{{ route('admin.merk.create') }}" class="btn btn-primary mb-3">Tambah Merk</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($merks as $merk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $merk->nama }}</td>
                    <td>
                        <a href="{{ route('admin.merk.edit', $merk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.merk.destroy', $merk->id) }}" method="POST" style="display:inline;">
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
