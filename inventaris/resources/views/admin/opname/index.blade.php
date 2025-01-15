<!-- resources/views/admin/opname/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Opname</h1>
    <a href="{{ route('admin.opname.create') }}" class="btn btn-primary">Tambah Opname</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama Opname</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($opnames as $opname)
            <tr>
                <td>{{ $opname->nama_opname }}</td>
                <td>{{ $opname->deskripsi }}</td>
                <td>
                    <a href="{{ route('admin.opname.edit', $opname->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.opname.destroy', $opname->id) }}" method="POST" style="display:inline;">
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
