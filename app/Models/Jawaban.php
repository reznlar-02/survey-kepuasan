<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawabans'; // Nama tabel di database

    protected $fillable = [
        'survey_kepuasan_id', // ID Survey
        'jawaban',            // Jawaban
        'total',
    ];
}

