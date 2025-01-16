<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriAsset extends Model
{

    protected $table = 'tbl_sub_kategori_asset';
    use HasFactory;

    // Tentukan kolom yang boleh diisi secara mass-assignment
    protected $fillable = [
        'kode_sub_kategori_asset',
        'sub_kategori_asset',
        'id_kategori_asset',
    ];

    // Method untuk menyimpan data
    public static function storeData($validatedData)
    {
        return self::create([
            'kode_sub_kategori_asset' => $validatedData['kode_sub_kategori_asset'],
            'sub_kategori_asset' => $validatedData['sub_kategori_asset'],
            'id_kategori_asset' => $validatedData['id_kategori_asset'],
        ]);
    }
}
