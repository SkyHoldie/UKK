<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHitungDepresiasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hitung_depresiasi', function (Blueprint $table) {
            $table->increments('id_hitung_depresiasi'); // Primary Key
            $table->unsignedInteger('id_pengadaan'); // Foreign Key ke tbl_pengadaan
            $table->date('tgl_hitung_depresiasi'); // Kolom tanggal hitung depresiasi
            $table->string('bulan', 10); // Kolom bulan
            $table->integer('durasi'); // Kolom durasi
            $table->integer('nilai_barang'); // Kolom nilai barang
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        // Tambahkan indeks
        Schema::table('tbl_hitung_depresiasi', function (Blueprint $table) {
            $table->index(['id_pengadaan', 'bulan'], 'hitung_depresiasi_index');
        });

        // Menambahkan relasi dengan tabel lainnya
        Schema::table('tbl_hitung_depresiasi', function (Blueprint $table) {
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
        Schema::dropIfExists('tbl_hitung_depresiasi');
    }
}
