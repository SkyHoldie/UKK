<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriAsset extends Model
{
    use HasFactory;

    protected $table = 'tbl_sub_kategori_asset';
    protected $primaryKey = 'id_sub_kategori';
    protected $fillable = ['nama_sub_kategori', 'kategori_id'];

    // Relasi dengan tabel KategoriAsset
    public function kategori()
    {
        return $this->belongsTo(KategoriAsset::class, 'kategori_id', 'id_kategori');
    }
}
