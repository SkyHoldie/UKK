<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDepresiasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_depresiasi', function (Blueprint $table) {
            $table->increments('id_depresiasi'); // Primary Key
            $table->integer('lama_depresiasi'); // Kolom lama depresiasi
            $table->string('keterangan', 500)->nullable(); // Kolom keterangan
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        // Tambahkan indeks
        Schema::table('tbl_depresiasi', function (Blueprint $table) {
            $table->index(['lama_depresiasi'], 'lama_depresiasi_index'); // Index pada kolom 'lama_depresiasi'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_depresiasi');
    }
}
