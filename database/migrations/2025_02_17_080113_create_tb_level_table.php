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
        Schema::create('tb_level', function (Blueprint $table) {
            $table->id();
            $table->enum('level', ['administrator', 'petugas']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tb_level');
    }

};
