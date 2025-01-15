<?php

namespace App\Http\Controllers;

use App\Models\SubKategoriAsset;
use App\Models\KategoriAsset;
use Illuminate\Http\Request;

class SubKategoriAssetController extends Controller
{
    public function create()
    {
        // Mengambil semua kategori asset untuk dropdown
        $kategori_assets = KategoriAsset::all();
        return view('sub_kategori_asset.create', compact('kategori_assets'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'kode_sub_kategori_asset' => 'required|string|max:255',
            'sub_kategori_asset' => 'required|string|max:255',
            'id_kategori_asset' => 'required|exists:tbl_kategori_asset,id_kategori_asset',  // Validasi kategori asset
        ]);

        // Menyimpan data ke dalam tabel Sub Kategori Asset
        SubKategoriAsset::create([
            'kode_sub_kategori_asset' => $validated['kode_sub_kategori_asset'],
            'sub_kategori_asset' => $validated['sub_kategori_asset'],
            'id_kategori_asset' => $validated['id_kategori_asset'],
        ]);

        return redirect()->route('sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil ditambahkan!');
    }
}
