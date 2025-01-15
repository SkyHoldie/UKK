<?php

namespace App\Http\Controllers;

use App\Models\MutasiLokasi;
use Illuminate\Http\Request;

class MutasiLokasiController extends Controller
{
    // Menampilkan daftar mutasi lokasi
    public function index()
    {
        $mutasiLokasis = MutasiLokasi::all();
        return view('admin.mutasi_lokasi.index', compact('mutasiLokasis'));
    }

    // Menampilkan form untuk membuat mutasi lokasi baru
    public function create()
    {
        return view('admin.mutasi_lokasi.create');
    }

    // Menyimpan mutasi lokasi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_mutasi' => 'required',
            'deskripsi' => 'nullable',
        ]);

        MutasiLokasi::create([
            'nama_mutasi' => $request->nama_mutasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.mutasi_lokasi.index');
    }

    // Menampilkan form untuk mengedit mutasi lokasi
    public function edit($id)
    {
        $mutasiLokasi = MutasiLokasi::findOrFail($id);
        return view('admin.mutasi_lokasi.edit', compact('mutasiLokasi'));
    }

    // Memperbarui data mutasi lokasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mutasi' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $mutasiLokasi = MutasiLokasi::findOrFail($id);
        $mutasiLokasi->update([
            'nama_mutasi' => $request->nama_mutasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.mutasi_lokasi.index');
    }

    // Menghapus mutasi lokasi
    public function destroy($id)
    {
        $mutasiLokasi = MutasiLokasi::findOrFail($id);
        $mutasiLokasi->delete();

        return redirect()->route('admin.mutasi_lokasi.index');
    }
}
