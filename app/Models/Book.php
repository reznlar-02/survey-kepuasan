<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'elibrary'; // Menghubungkan model Book ke tabel elibraries

    protected $fillable = [
        'title',
        'author',
        'category',
        'synopsis',
        'cover_image', // Pastikan kolom ini ada di tabel `elibraries`
    ];
}