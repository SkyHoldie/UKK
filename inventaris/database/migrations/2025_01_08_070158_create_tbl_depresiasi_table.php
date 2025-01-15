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
        Schema::create('depresiasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('nilai', 10, 2);
            $table->timestamps();
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
