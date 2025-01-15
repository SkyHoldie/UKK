<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Depresiasi;
use Illuminate\Http\Request;

class DepresiasiController extends Controller
{
    public function index()
    {
        $depresiasiItems = Depresiasi::all(); // Ambil semua data depresiasi
        return view('admin.depresiasi.index', compact('depresiasiItems'));
    }

    public function create()
    {
        return view('admin.depresiasi.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nilai' => 'required|numeric',
        ]);

        Depresiasi::create($validatedData);
        return redirect()->route('admin.depresiasi.index')->with('success', 'Data depresiasi berhasil ditambahkan.');
    }
}
