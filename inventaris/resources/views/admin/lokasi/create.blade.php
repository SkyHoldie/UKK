<!-- resources/views/admin/lokasi/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Lokasi Baru</h1>

    <form action="{{ route('admin.lokasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
            <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
