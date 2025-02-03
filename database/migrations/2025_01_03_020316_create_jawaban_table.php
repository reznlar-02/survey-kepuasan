<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanTable extends Migration
{
    public function up()
{
    Schema::create('jawaban', function (Blueprint $table) {
        $table->id();
        $table->foreignId('form_datadiri_id')->constrained('form_datadiri');
        $table->foreignId('survey_kepuasan_id')->constrained('survey_kepuasan');
        $table->integer('nilai');
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('jawaban');
    }
}