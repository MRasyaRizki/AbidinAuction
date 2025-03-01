<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 25);
            $table->date('tgl');
            $table->integer('harga_awal');
            $table->string('deskripsi_barang', 100);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tb_barang');
    }

};
