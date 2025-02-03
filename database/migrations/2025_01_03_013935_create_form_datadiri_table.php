<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDatadiriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('form_datadiri', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nrp')->unique();
        $table->string('email')->unique();
        $table->foreignId('strata_id')->constrained('strata');
        $table->foreignId('pendidikan_id')->constrained('pendidikan');
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
        Schema::dropIfExists('form_datadiri');
    }
}