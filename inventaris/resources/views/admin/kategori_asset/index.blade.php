@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kategori Asset</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoriAssets as $kategoriAsset)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kategoriAsset->nama }}</td>
                    <td>
                        <a href="{{ route('admin.kategori_asset.edit', $kategoriAsset->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.kategori_asset.destroy', $kategoriAsset->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
