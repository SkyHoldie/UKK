<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriAsset;
use App\Models\Merk;
use App\Models\Depresiasi;
use App\Models\SubKategoriAsset;
use App\Models\Satuan;
use App\Models\Distributor;
use App\Models\MasterBarang;
use App\Models\Lokasi;
use App\Models\MutasiLokasi;
use App\Models\Pengadaan;
use App\Models\Opname;
use App\Models\HitungDepresiasi;

class AssetController extends Controller
{
    public function index()
    {
        // Mengambil data dari semua tabel
        $kategoriAssets = KategoriAsset::all();
        $merks = Merk::all();
        $depresiasis = Depresiasi::all();
        $subKategoriAssets = SubKategoriAsset::all();
        $satuans = Satuan::all();
        $distributors = Distributor::all();
        $masterBarangs = MasterBarang::all();
        $lokasis = Lokasi::all();
        $mutasiLokasis = MutasiLokasi::all();
        $pengadaans = Pengadaan::all();
        $opnames = Opname::all();
        $hitungDepresiasis = HitungDepresiasi::all();

        return view('assets.index', compact(
            'kategoriAssets', 'merks', 'depresiasis', 'subKategoriAssets', 'satuans', 'distributors', 
            'masterBarangs', 'lokasis', 'mutasiLokasis', 'pengadaans', 'opnames', 'hitungDepresiasis'
        ));
    }
}
