<?php

namespace App\Http\Controllers;

use App\Models\KategoriAsset;
use App\Models\SubKategoriAsset;
use Illuminate\Http\Request;

class SubKategoriAssetController extends Controller
{
    public function index()
    {
        // Menampilkan form tambah sub kategori asset
        $subKategoriAssets = SubKategoriAsset::all();
        return view('sub_kategori_asset.index', compact('subKategoriAssets'));
    }
    
    public function create()
    {
        // Ambil semua kategori asset dari database
        $kategori_assets = KategoriAsset::all();
        
        // Kirim data kategori_assets ke view
        return view('sub_kategori_asset.create', compact('kategori_assets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_sub_kategori_asset' => 'required|string|max:255',
            'nama_sub_kategori' => 'required|string|max:255',
            'kategori_id' => 'required|exists:tbl_kategori_asset,id_kategori_asset',
        ]);

        $subKategoriAsset = new SubKategoriAsset();
        $subKategoriAsset->kode_sub_kategori_asset = $request->kode_sub_kategori_asset;
        $subKategoriAsset->nama_sub_kategori = $request->nama_sub_kategori; // Sesuaikan dengan nama kolom di database
        $subKategoriAsset->kategori_id = $request->kategori_id;
        $subKategoriAsset->save();

        return redirect()->route('sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil ditambahkan.');
    }
}
