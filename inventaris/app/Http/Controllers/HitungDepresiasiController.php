<?php

namespace App\Http\Controllers;

use App\Models\HitungDepresiasi;
use Illuminate\Http\Request;

class HitungDepresiasiController extends Controller
{
    // Menampilkan daftar hitung depresiasi
    public function index()
    {
        $depresiasiItems = HitungDepresiasi::all(); // Mengambil semua data hitung depresiasi
        return view('admin.hitung_depresiasi.index', compact('depresiasiItems'));
    }

    // Menampilkan form untuk membuat hitung depresiasi baru
    public function create()
    {
        return view('admin.hitung_depresiasi.create');
    }

    // Menyimpan hitung depresiasi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nilai' => 'required|numeric',
            'tahun' => 'required|numeric',
        ]);

        HitungDepresiasi::create([
            'nama' => $request->nama,
            'nilai' => $request->nilai,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('admin.hitung_depresiasi.index');
    }

    // Menampilkan form untuk mengedit hitung depresiasi
    public function edit($id)
    {
        $depresiasiItem = HitungDepresiasi::findOrFail($id);
        return view('admin.hitung_depresiasi.edit', compact('depresiasiItem'));
    }

    // Memperbarui data hitung depresiasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nilai' => 'required|numeric',
            'tahun' => 'required|numeric',
        ]);

        $depresiasiItem = HitungDepresiasi::findOrFail($id);
        $depresiasiItem->update([
            'nama' => $request->nama,
            'nilai' => $request->nilai,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('admin.hitung_depresiasi.index');
    }

    // Menghapus data hitung depresiasi
    public function destroy($id)
    {
        $depresiasiItem = HitungDepresiasi::findOrFail($id);
        $depresiasiItem->delete();

        return redirect()->route('admin.hitung_depresiasi.index');
    }
}
