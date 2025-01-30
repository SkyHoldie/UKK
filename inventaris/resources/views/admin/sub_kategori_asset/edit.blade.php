@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Sub Kategori Asset</h1>
    <form action="{{ route('admin.sub_kategori_asset.update', $subKategoriAsset->id_sub_kategori) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_sub_kategori" class="form-label">Nama Sub Kategori</label>
            <input type="text" class="form-control" id="kategori_id" name="nama_sub_kategori" 
                value="{{ $subKategoriAsset->nama_sub_kategori }}" required>
        </div>
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select class="form-control" id="kategori_id" name="kategori_id" required>
                @foreach($kategoriAssets as $kategori)
                    <option value="{{ $kategori->kategori_id }}" 
                        {{ $kategori->id_sub_kategori_asset == $sub_kategori_asset->kategori_id ? 'selected' : '' }}>
                        {{ $kategori->nama_sub_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('sub_kategori_asset.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
