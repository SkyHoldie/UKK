<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKategoriAsset;
use App\Models\KategoriAsset;

class SubKategoriAssetController extends Controller
{
    public function index()
    {
        // Ambil semua data sub kategori asset
        $subKategoriAssets = SubKategoriAsset::all();

        // Tampilkan ke view
        return view('sub_kategori_asset.index', compact('subKategoriAssets'));
    }
    
    public function create()
    {
        $kategoriAssets = KategoriAsset::all(); // Mengambil semua kategori
        return view('admin.sub_kategori_asset.create', compact('kategoriAssets')); // Mengirimkan data kategori ke view
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            // Validasi lain sesuai kebutuhan
        ]);

        // Simpan data ke database
        $subKategoriAsset = new SubKategoriAsset();
        $subKategoriAsset->nama = $validated['nama'];
        // Simpan atribut lainnya jika perlu
        $subKategoriAsset->save();

        // Redirect atau memberikan response
        return redirect()->route('sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil disimpan!');
    }
}
