<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubKategoriAsset;
use Illuminate\Http\Request;

class SubKategoriAssetController extends Controller
{
    public function index()
    {
        $subKategoriAssets = SubKategoriAsset::all();
        return view('admin.sub_kategori_asset.index', compact('subKategoriAssets'));
    }

    public function create()
    {
        return view('admin.sub_kategori_asset.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        SubKategoriAsset::create($request->all());
        return redirect()->route('admin.sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil ditambahkan.');
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
