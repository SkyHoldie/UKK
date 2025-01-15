<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    // Menampilkan daftar pengadaan
    public function index()
    {
        $pengadaan = Pengadaan::all();
        return view('admin.pengadaan.index', compact('pengadaan'));
    }

    // Menampilkan form untuk membuat pengadaan baru
    public function create()
    {
        return view('admin.pengadaan.create');
    }

    // Menyimpan pengadaan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengadaan' => 'required',
            'tanggal_pengadaan' => 'required|date',
        ]);

        Pengadaan::create([
            'nama_pengadaan' => $request->nama_pengadaan,
            'tanggal_pengadaan' => $request->tanggal_pengadaan,
        ]);

        return redirect()->route('admin.pengadaan.index');
    }

    // Menampilkan form untuk mengedit pengadaan
    public function edit($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        return view('admin.pengadaan.edit', compact('pengadaan'));
    }

    // Memperbarui data pengadaan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pengadaan' => 'required',
            'tanggal_pengadaan' => 'required|date',
        ]);

        $pengadaan = Pengadaan::findOrFail($id);
        $pengadaan->update([
            'nama_pengadaan' => $request->nama_pengadaan,
            'tanggal_pengadaan' => $request->tanggal_pengadaan,
        ]);

        return redirect()->route('admin.pengadaan.index');
    }

    // Menghapus pengadaan
    public function destroy($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        $pengadaan->delete();

        return redirect()->route('admin.pengadaan.index');
    }
}
