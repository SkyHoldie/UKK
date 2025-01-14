<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOpnameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_opname', function (Blueprint $table) {
            $table->increments('id_opname'); // Primary Key
            $table->unsignedInteger('id_pengadaan'); // Foreign Key ke tbl_pengadaan
            $table->date('tgl_opname'); // Kolom tanggal opname
            $table->string('kondisi', 25); // Kolom kondisi
            $table->string('keterangan', 1000)->nullable(); // Kolom keterangan
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        // Tambahkan indeks
        Schema::table('tbl_opname', function (Blueprint $table) {
            $table->index(['id_pengadaan', 'tgl_opname'], 'opname_index');
        });

        // Menambahkan relasi dengan tabel lain
        Schema::table('tbl_opname', function (Blueprint $table) {
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
        Schema::dropIfExists('tbl_opname');
    }
}
