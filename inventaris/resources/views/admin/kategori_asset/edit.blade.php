@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Kategori Asset</h1>
    <form action="{{ route('admin.kategori_asset.update', $kategori_asset->id_kategori_asset) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode_kategori_asset" class="form-label">Kode Kategori Asset</label>
            <input type="text" name="kode_kategori_asset" id="kode_kategori_asset" class="form-control" value="{{ $kategori_asset->kode_kategori_asset }}" required>
        </div>
        <div class="mb-3">
            <label for="kategori_asset" class="form-label">Nama Kategori Asset</label>
            <input type="text" name="kategori_asset" id="kategori_asset" class="form-control" value="{{ $kategori_asset->kategori_asset }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.kategori_asset.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
