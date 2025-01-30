<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubKategoriAsset;
use Illuminate\Http\Request;
use App\Models\KategoriAsset;

class SubKategoriAssetController extends Controller
{
    public function index()
    {
        $subKategoriAssets = SubKategoriAsset::all();
        return view('admin.sub_kategori_asset.index', compact('subKategoriAssets'));
    }

    public function create()
    {
        $kategoriAssets = KategoriAsset::all();
        return view('admin.sub_kategori_asset.create',compact('kategoriAssets'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'nama_sub_kategori' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_assets,id_kategori_asset', // Validasi kategori
        ]);

        // Menyimpan data SubKategoriAsset
        $subKategoriAsset = new SubKategoriAsset();
        $subKategoriAsset->nama_sub_kategori = $validated['nama_sub_kategori'];
        $subKategoriAsset->kategori_id = $validated['kategori_id'];
        $subKategoriAsset->kode_sub_kategori_asset = 'KA' . str_pad($subKategoriAsset->id_sub_kategori_asset, 1, '1', STR_PAD_LEFT); // Contoh kode otomatis
        $subKategoriAsset->save();

        // Redirect atau memberikan response
        return redirect()->route('admin.sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil disimpan!');
    }

    public function edit($id)
    {
        $subKategoriAsset = SubKategoriAsset::findOrFail($id);
        return view('admin.sub_kategori_asset.edit', compact('subKategoriAsset'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        $subKategoriAsset = SubKategoriAsset::findOrFail($id);
        $subKategoriAsset->update($request->all());
        return redirect()->route('admin.sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $subKategoriAsset = SubKategoriAsset::findOrFail($id);
        $subKategoriAsset->delete();
        return redirect()->route('admin.sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil dihapus.');
    }
}
