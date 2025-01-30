@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sub Kategori Asset</h1>
    <a href="{{ route('admin.sub_kategori_asset.create') }}" class="btn btn-primary mb-3">Tambah Sub Kategori Asset</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subKategoriAssets as $subKategoriAsset)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subKategoriAsset->nama_sub_kategori }}</td>
                    <td class="d-flex">
                    <a href="{{ route('admin.sub_kategori_asset.edit', $subKategoriAsset->id_sub_kategori_asset) }}" class="btn btn-warning me-2">Edit</a>
                    <form action="{{ route('admin.sub_kategori_asset.destroy',$subKategoriAsset->id_sub_kategori_asset) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
