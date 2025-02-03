<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyKepuasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('survey_kepuasan', function (Blueprint $table) {
        $table->id();
        $table->string('pertanyaan');
        $table->foreignId('strata_id')->nullable()->constrained('strata');
        $table->foreignId('pendidikan_id')->nullable()->constrained('pendidikan');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_kepuasan');
    }
}