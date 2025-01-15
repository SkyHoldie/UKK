<!-- resources/views/admin/mutasi_lokasi/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Mutasi Lokasi Baru</h1>

    <form action="{{ route('admin.mutasi_lokasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_mutasi" class="form-label">Nama Mutasi</label>
            <input type="text" class="form-control" id="nama_mutasi" name="nama_mutasi" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
