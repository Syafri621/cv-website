<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('posisi');
            $table->string('email');
            $table->string('telepon');
            $table->text('alamat');
            $table->text('tentang_saya');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('biodata');
    }
};