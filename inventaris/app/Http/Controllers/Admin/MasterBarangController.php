<?php

namespace App\Http\Controllers\Admin;

use App\Models\MasterBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterBarangController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterBarang::query();

        if ($request->has('search')) {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        $masterBarangs = MasterBarang::with('kategori')->get();
        return view('admin.master_barang.index', compact('masterBarangs'));
    }

    public function show($id)
    {
        $masterBarang = MasterBarang::where('id_barang', $id)->firstOrFail();
        return view('admin.master_barang.show', compact('masterBarang'));
    }

    public function create()
    {
        $categories = KategoriAsset::all(); // Mengambil data kategori untuk dropdown
        return view('admin.master_barang.create', compact('categories'));
    }
}
