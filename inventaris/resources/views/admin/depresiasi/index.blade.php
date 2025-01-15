@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Halaman Depresiasi</h1>
    <a href="{{ route('admin.depresiasi.create') }}" class="btn btn-primary mb-3">Tambah Depresiasi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Looping data depresiasi --}}
        </tbody>
    </table>
</div>
@endsection
