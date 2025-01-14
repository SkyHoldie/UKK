<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMutasiLokasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mutasi_lokasi', function (Blueprint $table) {
            $table->increments('id_mutasi_lokasi'); // Primary Key
            $table->unsignedInteger('id_lokasi'); // Foreign Key ke tbl_lokasi
            $table->unsignedInteger('id_pengadaan'); // Foreign Key ke tbl_pengadaan
            $table->string('flag_lokasi', 45); // Kolom flag lokasi
            $table->string('flag_pindah', 45); // Kolom flag pindah
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        // Tambahkan indeks
        Schema::table('tbl_mutasi_lokasi', function (Blueprint $table) {
            $table->index(['id_lokasi', 'id_pengadaan'], 'mutasi_lokasi_index');
        });

        // Menambahkan relasi dengan tabel lainnya
        Schema::table('tbl_mutasi_lokasi', function (Blueprint $table) {
            $table->foreign('id_lokasi')
                  ->references('id_lokasi')
                  ->on('tbl_lokasi')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('id_pengadaan')
                  ->references('id_pengadaan')
                  ->on('tbl_pengadaan')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_mutasi_lokasi');
    }
}
