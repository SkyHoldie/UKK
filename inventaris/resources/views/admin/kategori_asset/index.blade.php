@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Daftar Kategori Asset</h1>
        <a href="{{ route('admin.kategori_asset.create') }}" class="btn btn-primary mb-3">Tambah Kategori Asset</a>
        
        <!-- Tabel Kategori Asset -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori_assets as $kategori)
                    <tr>
                        <td>{{ $kategori->kode_kategori_asset }}</td>
                        <td>{{ $kategori->kategori_asset }}</td>
                        <td>
                            <a href="{{ route('admin.kategori_asset.edit', $kategori->id_kategori_asset) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <!-- Form Hapus -->
                            <form action="{{ route('admin.kategori_asset.destroy', $kategori->id_kategori_asset) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
