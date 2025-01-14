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

        $masterBarangs = $query->get();
        return view('master_barang.index', compact('masterBarangs'));
    }

    public function show($id)
    {
        $masterBarang = MasterBarang::where('id_barang', $id)->firstOrFail();
        return view('admin.master_barang.show', compact('masterBarang'));
    }
}
