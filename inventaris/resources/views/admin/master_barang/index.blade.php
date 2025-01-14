<!-- resources/views/master_barang/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Master Barang</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach($masterBarangs as $barang)
                <tr>
                    <td>{{ $barang->id_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->kategori }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
