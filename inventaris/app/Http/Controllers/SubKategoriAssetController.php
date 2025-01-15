<?php

namespace App\Http\Controllers;

use App\Models\SubKategoriAsset;
use Illuminate\Http\Request;

class SubKategoriAssetController extends Controller
{
    public function create()
    {
        // Menampilkan form tambah sub kategori asset
        return view('sub_kategori_asset.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data
        $validated = $request->validate([
            'kode_sub_kategori_asset' => 'required|string|max:255',
            'sub_kategori_asset' => 'required|string|max:255',
        ]);

        SubKategoriAsset::create($validated);

        return redirect()->route('sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil ditambahkan!');
    }
}
