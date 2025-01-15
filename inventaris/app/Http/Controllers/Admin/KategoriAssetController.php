<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriAsset;
use Illuminate\Http\Request;

class KategoriAssetController extends Controller
{
    public function index()
    {
        $kategori_assets = KategoriAsset::all();
        return view('admin.kategori_asset.index', compact('kategori_assets'));
    }

    // Tambahkan metode lain jika diperlukan (create, store, edit, update, destroy)
}
