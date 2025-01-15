<!-- resources/views/admin/hitung_depresiasi/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Hitung Depresiasi</h1>
    <a href="{{ route('admin.hitung_depresiasi.create') }}" class="btn btn-primary">Tambah Hitung Depresiasi</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nilai</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($depresiasiItems as $depresiasi)
            <tr>
                <td>{{ $depresiasi->nama }}</td>
                <td>{{ $depresiasi->nilai }}</td>
                <td>{{ $depresiasi->tahun }}</td>
                <td>
                    <a href="{{ route('admin.hitung_depresiasi.edit', $depresiasi->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.hitung_depresiasi.destroy', $depresiasi->id) }}" method="POST" style="display:inline;">
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
