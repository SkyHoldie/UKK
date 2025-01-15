<!-- resources/views/admin/opname/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Opname Baru</h1>

    <form action="{{ route('admin.opname.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_opname" class="form-label">Nama Opname</label>
            <input type="text" class="form-control" id="nama_opname" name="nama_opname" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
