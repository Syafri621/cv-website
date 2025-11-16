<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('biodata', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->string('alamat')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('github')->nullable();
        });
    }

    public function down()
    {
        Schema::table('biodata', function (Blueprint $table) {
            $table->dropColumn(['email', 'telepon', 'alamat', 'whatsapp', 'linkedin', 'instagram', 'github']);
        });
    }
};