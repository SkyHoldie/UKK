<?php

namespace App\Http\Controllers;

use App\Models\Opname;
use Illuminate\Http\Request;

class OpnameController extends Controller
{
    // Menampilkan daftar opname
    public function index()
    {
        $opnames = Opname::all();
        return view('admin.opname.index', compact('opnames'));
    }

    // Menampilkan form untuk membuat opname baru
    public function create()
    {
        return view('admin.opname.create');
    }

    // Menyimpan opname baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_opname' => 'required',
            'deskripsi' => 'nullable',
        ]);

        Opname::create([
            'nama_opname' => $request->nama_opname,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.opname.index');
    }

    // Menampilkan form untuk mengedit opname
    public function edit($id)
    {
        $opname = Opname::findOrFail($id);
        return view('admin.opname.edit', compact('opname'));
    }

    // Memperbarui data opname
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_opname' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $opname = Opname::findOrFail($id);
        $opname->update([
            'nama_opname' => $request->nama_opname,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.opname.index');
    }

    // Menghapus opname
    public function destroy($id)
    {
        $opname = Opname::findOrFail($id);
        $opname->delete();

        return redirect()->route('admin.opname.index');
    }
}
