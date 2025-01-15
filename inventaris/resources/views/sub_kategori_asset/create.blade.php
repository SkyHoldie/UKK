@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Sub Kategori Asset</h1>
        
        <!-- Formulir Tambah Sub Kategori Asset -->
        <form action="{{ route('sub_kategori_asset.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_sub_kategori_asset">Kode Sub Kategori Asset</label>
                <input type="text" name="kode_sub_kategori_asset" id="kode_sub_kategori_asset" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sub_kategori_asset">Nama Sub Kategori Asset</label>
                <input type="text" name="sub_kategori_asset" id="sub_kategori_asset" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_kategori_asset">Pilih Kategori Asset</label>
                <select name="id_kategori_asset" id="id_kategori_asset" class="form-control" required>
                    @foreach($kategori_assets as $kategori)
                        <option value="{{ $kategori->id_kategori_asset }}">{{ $kategori->kategori_asset }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection
