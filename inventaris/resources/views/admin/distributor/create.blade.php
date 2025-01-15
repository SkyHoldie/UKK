@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Distributor</h1>

        <form action="{{ route('admin.distributor.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_distributor" class="form-label">Nama Distributor</label>
                <input type="text" class="form-control @error('nama_distributor') is-invalid @enderror" id="nama_distributor" name="nama_distributor" value="{{ old('nama_distributor') }}">
                @error('nama_distributor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.distributor.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
