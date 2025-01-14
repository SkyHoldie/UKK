<?php

namespace App\Http\Controllers;

use App\Models\SubKategoriAsset;
use App\Models\KategoriAsset;
use Illuminate\Http\Request;

class SubKategoriAssetController extends Controller
{
    /**
     * Menampilkan daftar sub-kategori asset.
     */
    public function index()
    {
        $subKategoriAssets = SubKategoriAsset::with('kategori')->get();
        return view('sub_kategori_asset.index', compact('subKategoriAssets'));
    }

    /**
     * Menampilkan form untuk menambah sub-kategori asset baru.
     */
    public function create()
    {
        $kategoriAssets = KategoriAsset::all();
        return view('sub_kategori_asset.create', compact('kategoriAssets'));
    }

    /**
     * Menyimpan sub-kategori asset baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sub_kategori' => 'required|string|max:255',
            'kategori_id' => 'required|exists:tbl_kategori_asset,id_kategori',
        ]);

        SubKategoriAsset::create($request->all());

        return redirect()->route('sub_kategori_asset.index')->with('success', 'Sub-kategori asset berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit sub-kategori asset.
     */
    public function edit($id)
    {
        $subKategoriAsset = SubKategoriAsset::findOrFail($id);
        $kategoriAssets = KategoriAsset::all();
        return view('sub_kategori_asset.edit', compact('subKategoriAsset', 'kategoriAssets'));
    }

    /**
     * Memperbarui data sub-kategori asset di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sub_kategori' => 'required|string|max:255',
            'kategori_id' => 'required|exists:tbl_kategori_asset,id_kategori',
        ]);

        $subKategoriAsset = SubKategoriAsset::findOrFail($id);
        $subKategoriAsset->update($request->all());

        return redirect()->route('sub_kategori_asset.index')->with('success', 'Sub-kategori asset berhasil diperbarui.');
    }

    /**
     * Menghapus sub-kategori asset dari database.
     */
    public function destroy($id)
    {
        $subKategoriAsset = SubKategoriAsset::findOrFail($id);
        $subKategoriAsset->delete();

        return redirect()->route('sub_kategori_asset.index')->with('success', 'Sub-kategori asset berhasil dihapus.');
    }
}
