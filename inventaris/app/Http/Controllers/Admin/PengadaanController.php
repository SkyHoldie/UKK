<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'tanggal_pengadaan' => 'required',
        ]);

        Pengadaan::create($request->all());
        return redirect()->route('admin.pengadaan.index');
    }

    // Menampilkan pengadaan berdasarkan ID
    public function show($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        return view('admin.pengadaan.show', compact('pengadaan'));
    }

    // Menampilkan form untuk mengedit pengadaan
    public function edit($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        return view('admin.pengadaan.edit', compact('pengadaan'));
    }

    // Memperbarui pengadaan
    public function update(Request $request, $id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        $pengadaan->update($request->all());
        return redirect()->route('admin.pengadaan.index');
    }

    // Menghapus pengadaan
    public function destroy($id)
    {
        Pengadaan::findOrFail($id)->delete();
        return redirect()->route('admin.pengadaan.index');
    }
}
