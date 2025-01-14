<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriAsset;

class KategoriAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data kategori asset dari database
        $kategori_assets = KategoriAsset::all();

        // Tampilkan halaman index dengan data kategori asset
        return view('admin.kategori_asset.index', compact('kategori_assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan halaman form untuk menambahkan kategori asset
        return view('admin.kategori_asset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_kategori_asset' => 'required|string|max:25',
            'kategori_asset' => 'required|string|max:25',
        ]);

        // Simpan data ke database
        KategoriAsset::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.kategori_asset.index')->with('success', 'Kategori asset berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data kategori asset berdasarkan id
        $kategori_asset = KategoriAsset::findOrFail($id);

        // Tampilkan halaman edit
        return view('admin.kategori_asset.edit', compact('kategori_asset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kode_kategori_asset' => 'required|string|max:25',
            'kategori_asset' => 'required|string|max:25',
        ]);

        // Update data di database
        $kategori_asset = KategoriAsset::findOrFail($id);
        $kategori_asset->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.kategori_asset.index')->with('success', 'Kategori asset berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus data dari database
        $kategori_asset = KategoriAsset::findOrFail($id);
        $kategori_asset->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.kategori_asset.index')->with('success', 'Kategori asset berhasil dihapus.');
    }
}
