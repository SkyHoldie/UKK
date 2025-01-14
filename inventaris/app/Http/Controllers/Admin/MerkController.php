<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    public function index()
    {
        $merks = Merk::all();
        return view('admin.merk.index', compact('merks'));
    }

    public function create()
    {
        return view('admin.merk.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        Merk::create($request->all());
        return redirect()->route('admin.merk.index')->with('success', 'Merk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $merk = Merk::findOrFail($id);
        return view('admin.merk.edit', compact('merk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        $merk = Merk::findOrFail($id);
        $merk->update($request->all());
        return redirect()->route('admin.merk.index')->with('success', 'Merk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $merk = Merk::findOrFail($id);
        $merk->delete();
        return redirect()->route('admin.merk.index')->with('success', 'Merk berhasil dihapus.');
    }
}
