<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSatuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_satuan', function (Blueprint $table) {
            $table->id('id_satuan');
            $table->string('nama_satuan');
            $table->timestamps();
        });

        // Tambahkan indeks
        Schema::table('tbl_satuan', function (Blueprint $table) {
            $table->index(['satuan'], 'satuan_index'); // Indeks pada kolom 'satuan'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_satuan');
    }
}
