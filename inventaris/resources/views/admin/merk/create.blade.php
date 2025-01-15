@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Merk</h1>

    <form action="{{ route('admin.merk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_merk" class="form-label">Nama Merk</label>
            <input type="text" name="nama_merk" id="nama_merk" class="form-control @error('nama_merk') is-invalid @enderror" value="{{ old('nama_merk') }}">
            @error('nama_merk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.merk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
