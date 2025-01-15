<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    // Menampilkan daftar distributor
    public function index()
    {
        $distributors = Distributor::all();
        return view('admin.distributor.index', compact('distributors'));
    }

    // Menampilkan form untuk membuat distributor baru
    public function create()
    {
        return view('admin.distributor.create');
    }

    // Menyimpan distributor baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required|string|max:255',
            'alamat' => 'nullable|string',
        ]);

        Distributor::create($request->all());

        return redirect()->route('admin.distributor.index')->with('success', 'Distributor berhasil ditambahkan.');
    }

    // Menampilkan form edit distributor
    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('admin.distributor.edit', compact('distributor'));
    }

    // Memperbarui distributor di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_distributor' => 'required|string|max:255',
            'alamat' => 'nullable|string',
        ]);

        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());

        return redirect()->route('admin.distributor.index')->with('success', 'Distributor berhasil diperbarui.');
    }

    // Menghapus distributor
    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();

        return redirect()->route('admin.distributor.index')->with('success', 'Distributor berhasil dihapus.');
    }
}
