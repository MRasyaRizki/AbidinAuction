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
        Schema::create('tb_lelang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->constrained('tb_barang');
            $table->date('tgl_lelang');
            $table->integer('harga_akhir')->nullable();
            $table->foreignId('id_user')->nullable()->constrained('tb_masyarakat');
            $table->foreignId('id_petugas')->constrained('tb_petugas');
            $table->enum('status', ['dibuka', 'ditutup']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tb_lelang');
    }

};
