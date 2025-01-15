<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Depresiasi;
use Illuminate\Http\Request;

class DepresiasiController extends Controller
{
    public function index()
    {
        $depresiasiItems = Depresiasi::all();
        return view('admin.depresiasi.index', compact('depresiasiItems'));
    }

    public function create()
    {
        return view('admin.depresiasi.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data
    }

    public function show($id)
    {
        $depresiasi = Depresiasi::findOrFail($id);
        return view('admin.depresiasi.show', compact('depresiasi'));
    }

    public function edit($id)
    {
        $depresiasi = Depresiasi::findOrFail($id);
        return view('admin.depresiasi.edit', compact('depresiasi'));
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data
    }

    public function destroy($id)
    {
        // Hapus data
    }
}
