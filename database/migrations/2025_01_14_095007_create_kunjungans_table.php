<?php

// Contoh migrasi untuk tabel kunjungans
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjungansTable extends Migration
{
    public function up()
    {
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id(); // Kolom id otomatis
            $table->string('nama');
            $table->string('nrp');
            $table->string('email');
            $table->string('strata_id');
            $table->string('pendidikan_id');
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('kunjungans');
    }
}