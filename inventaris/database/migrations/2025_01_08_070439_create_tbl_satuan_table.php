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
            $table->increments('id_satuan'); // Primary Key
            $table->string('satuan', 25)->unique(); // Kolom satuan dengan panjang maksimum 25 karakter
            $table->timestamps(); // Kolom created_at dan updated_at
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
