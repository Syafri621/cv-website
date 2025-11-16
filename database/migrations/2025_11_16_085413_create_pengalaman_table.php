<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengalaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_id')->constrained('biodata')->onDelete('cascade');
            $table->enum('jenis', ['organisasi', 'magang', 'pekerjaan', 'proyek']);
            $table->string('posisi');
            $table->string('perusahaan_organisasi');
            $table->year('tahun_mulai');
            $table->year('tahun_selesai');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengalaman');
    }
};