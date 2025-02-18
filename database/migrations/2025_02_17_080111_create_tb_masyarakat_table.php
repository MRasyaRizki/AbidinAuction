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
        Schema::create('tb_masyarakat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 25);
            $table->string('username', 25)->unique();
            $table->string('password');
            $table->string('telp', 25);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tb_masyarakat');
    }

};
