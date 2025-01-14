@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Barang</h1>
    <form action="{{ route('master_barang.update', $masterBarang->id_barang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="{{ $masterBarang->kode_barang }}" required>
        </div>
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ $masterBarang->nama_barang }}" required>
        </div>
        <div class="form-group">
            <label for="spesifikasi_teknis">Spesifikasi Teknis</label>
            <input type="text" name="spesifikasi_teknis" id="spesifikasi_teknis" class="form-control" value="{{ $masterBarang->spesifikasi_teknis }}">
        </div>
        <button type="submit" class="btn btn-warning mt-3">Update</button>
    </form>
</div>
@endsection
