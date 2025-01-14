<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    // Tentukan tabel jika nama tabel berbeda dengan nama model
    protected $table = 'tbl_merk';

    // Tentukan kolom yang dapat diisi (optional)
    protected $fillable = [
        'merk',
        'keterangan',
    ];
}
