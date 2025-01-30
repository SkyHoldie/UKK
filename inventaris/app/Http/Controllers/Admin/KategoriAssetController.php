<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriAsset;
use Illuminate\Http\Request;

class KategoriAssetController extends Controller
{
    // Menampilkan semua kategori asset
    public function index()
    {
        $kategori_assets = KategoriAsset::all();
        return view('admin.kategori_asset.index', compact('kategoriAsssets'));
    }

    // Menampilkan formulir untuk membuat kategori asset baru
    public function create()
    {
        return view('admin.kategori_asset.create');
    }

    // Menyimpan kategori asset baru ke database
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'kode_kategori_asset' => 'required|string|max:255|unique:tbl_kategori_asset,kode_kategori_asset',
            'kategori_asset' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        try {
            KategoriAsset::create($validated);
            return redirect()->route('admin.kategori_asset.index')->with('success', 'Kategori Asset berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // Menampilkan formulir untuk mengedit kategori asset
    public function edit($id)
    {
        $kategori_asset = KategoriAsset::findOrFail($id);
        return view('admin.kategori_asset.edit', compact('kategori_asset'));
    }

    // Memperbarui kategori asset di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_asset' => 'required|string|max:255',  // Validasi nama kategori asset
        ]);

        $kategori_asset = KategoriAsset::findOrFail($id);
        $kategori_asset->update([
            'kategori_asset' => $request->kategori_asset,
        ]);

        return redirect()->route('admin.kategori_asset.index')->with('success', 'Kategori Asset berhasil diperbarui!');
    }

    // Menghapus kategori asset dari database
    public function destroy($id)
    {
        $kategori_asset = KategoriAsset::findOrFail($id);
        $kategori_asset->delete();

        return redirect()->route('admin.kategori_asset.index')->with('success', 'Kategori Asset berhasil dihapus!');
    }
}
