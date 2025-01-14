<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriAsset;
use Illuminate\Http\Request;

class KategoriAssetController extends Controller
{
    public function index()
    {
        $kategoriAssets = KategoriAsset::all();
        return view('admin.kategori_asset.index', compact('kategoriAssets'));
    }

    // Tambahkan metode lain jika diperlukan (create, store, edit, update, destroy)
}
