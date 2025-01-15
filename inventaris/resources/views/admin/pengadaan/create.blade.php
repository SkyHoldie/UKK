@extends('layouts.app')

@section('content')
    <h1>Tambah Pengadaan Baru</h1>

    <form action="{{ route('admin.pengadaan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_pengadaan">Nama Pengadaan</label>
            <input type="text" class="form-control" id="nama_pengadaan" name="nama_pengadaan" required>
        </div>

        <div class="form-group">
            <label for="tanggal_pengadaan">Tanggal Pengadaan</label>
            <input type="date" class="form-control" id="tanggal_pengadaan" name="tanggal_pengadaan" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('admin.pengadaan.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
@endsection
