<?php

// app/Http/Controllers/BarangController.php
namespace App\Http\Controllers;

use App\Models\MasterBarang;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    public function show($id)
    {
        $masterBarang = MasterBarang::where('id_barang', $id)->firstOrFail(); // Menggunakan id_barang
        return view('admin.master_barang.show', compact('masterBarang'));
    }
}
