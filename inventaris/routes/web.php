<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriAssetController;
use App\Http\Controllers\SubKategoriAssetController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\DepresiasiController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MutasiLokasiController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\HitungDepresiasiController;
use App\Http\Controllers\Admin\MasterBarangController as AdminMasterBarangController;
use App\Http\Controllers\AssetController;

// Route untuk menampilkan form tambah sub kategori asset
Route::get('/sub-kategori-asset/create', [SubKategoriAssetController::class, 'create'])->name('sub_kategori_asset.create');

// Route untuk menyimpan sub kategori asset
Route::post('/sub-kategori-asset', [SubKategoriAssetController::class, 'store'])->name('sub_kategori_asset.store');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('hitung_depresiasi', HitungDepresiasiController::class);
    Route::resource('opname', OpnameController::class);
    Route::resource('mutasi_lokasi', MutasiLokasiController::class);
    Route::resource('lokasi', LokasiController::class);
    Route::resource('pengadaan', PengadaanController::class);
    Route::resource('distributor', DistributorController::class);
    Route::resource('merk', MerkController::class);
    Route::resource('satuan', SatuanController::class);
    Route::resource('depresiasi', DepresiasiController::class);
    Route::resource('master_barang', MasterBarangController::class);
    Route::resource('sub_kategori_asset', SubKategoriAssetController::class);
    Route::resource('kategori_asset', KategoriAssetController::class);
});

// Grup dengan middleware 'admin' hanya untuk rute yang memerlukan akses admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('satuan', SatuanController::class);
    Route::resource('merk', MerkController::class);
    Route::resource('distributor', DistributorController::class);
    Route::resource('sub_kategori_asset', SubKategoriAssetController::class);
    Route::resource('kategori_asset', KategoriAssetController::class);
});

// Rute untuk master barang dengan admin role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('master_barang', AdminMasterBarangController::class)->names([
        'index' => 'admin.master_barang.index',
        'show' => 'admin.master_barang.show',
    ]);
});

// Rute untuk login dan logout
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Rute untuk halaman dashboard
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
