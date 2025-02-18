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
        Schema::create('history_lelang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lelang')->constrained('tb_lelang');
            $table->foreignId('id_barang')->constrained('tb_barang');
            $table->foreignId('id_user')->constrained('tb_masyarakat');
            $table->integer('penawaran_harga');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('history_lelang');
    }

};
