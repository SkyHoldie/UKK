<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKategoriAssetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kategori_asset', function (Blueprint $table) {
            $table->increments('id_kategori_asset'); // Primary Key
            $table->string('kode_kategori_asset', 25)->unique(); // Kode unik
            $table->string('kategori_asset', 25); // Nama kategori
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        // Tambahkan index
        Schema::table('tbl_kategori_asset', function (Blueprint $table) {
            $table->index(['kode_kategori_asset', 'kategori_asset'], 'kategori_asset_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kategori_asset');
    }
}
