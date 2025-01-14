<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAsset extends Model
{
    use HasFactory;

    protected $table = 'tbl_kategori_asset'; // Nama tabel di database

    protected $primaryKey = 'id_kategori_asset'; // Primary key tabel

    public $timestamps = false; // Jika tabel tidak menggunakan kolom created_at dan updated_at

    protected $fillable = [
        'kode_kategori_asset',
        'kategori_asset',
    ];
}
