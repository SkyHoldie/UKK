@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Halaman User - Master Barang</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('user.master_barang.search') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="query" class="form-control" placeholder="Cari barang..." value="{{ $query ?? '' }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    <!-- Tabel Data Barang -->
    <table class="table">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Spesifikasi Teknis</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($masterBarang as $barang)
                <tr>
                    <td>{{ $barang->kode_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->spesifikasi_teknis }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
