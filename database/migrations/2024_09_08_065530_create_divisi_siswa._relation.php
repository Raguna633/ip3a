<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisiSiswaRelationTable extends Migration
{
    public function up()
    {
        Schema::create('divisi_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('divisi_id')->constrained()->onDelete('cascade');
            $table->text('alasan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('divisi_siswa');
    }
}
