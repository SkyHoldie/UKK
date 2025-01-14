@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Distributor</h1>
    <a href="{{ route('admin.distributor.create') }}" class="btn btn-primary mb-3">Tambah Distributor</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($distributors as $distributor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $distributor->nama }}</td>
                    <td>
                        <a href="{{ route('admin.distributor.edit', $distributor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.distributor.destroy', $distributor->id) }}" method="POST" style="display:inline;">
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
