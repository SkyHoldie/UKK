<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    // Menampilkan daftar lokasi
    public function index()
    {
        $lokasis = Lokasi::all();
        return view('admin.lokasi.index', compact('lokasis'));
    }

    // Menampilkan form untuk membuat lokasi baru
    public function create()
    {
        return view('admin.lokasi.create');
    }

    // Menyimpan lokasi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'deskripsi' => 'nullable',
        ]);

        Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.lokasi.index');
    }

    // Menampilkan form untuk mengedit lokasi
    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    // Memperbarui data lokasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update([
            'nama_lokasi' => $request->nama_lokasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.lokasi.index');
    }

    // Menghapus lokasi
    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        return redirect()->route('admin.lokasi.index');
    }
}
