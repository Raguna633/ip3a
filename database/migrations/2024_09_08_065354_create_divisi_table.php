<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisiTable extends Migration
{
    public function up()
    {
        Schema::create('divisis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_divisi');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('divisis');
    }
}

