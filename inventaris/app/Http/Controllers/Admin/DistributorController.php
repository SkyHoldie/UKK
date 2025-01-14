<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all();
        return view('admin.distributor.index', compact('distributors'));
    }

    public function create()
    {
        return view('admin.distributor.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        Distributor::create($request->all());
        return redirect()->route('admin.distributor.index')->with('success', 'Distributor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('admin.distributor.edit', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());
        return redirect()->route('admin.distributor.index')->with('success', 'Distributor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();
        return redirect()->route('admin.distributor.index')->with('success', 'Distributor berhasil dihapus.');
    }
}
