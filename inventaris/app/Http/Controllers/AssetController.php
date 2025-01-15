<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriAsset;

class AssetController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel `tbl_kategori_asset`
        $kategoriAssets = KategoriAsset::all();

        return view('admin.kategori_asset.index', compact('kategoriAssets'));
    }
}
