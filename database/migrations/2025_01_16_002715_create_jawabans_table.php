<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabans', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('survey_kepuasan_id'); // ID dari pertanyaan survei
            $table->text('jawaban'); // ID kunjungan dari user
            $table->integer('total'); // Jawaban (nilai)
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key constraints (optional)
            $table->foreign('survey_kepuasan_id')->references('id')->on('survey_kepuasan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawabans');
    }
}