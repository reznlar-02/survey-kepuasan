<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Buku Pertama',
            'author' => 'Penulis Pertama',
            'category' => 'Fiksi',
            'cover_image' => null,
        ]);

        Book::create([
            'title' => 'Buku Kedua',
            'author' => 'Penulis Kedua',
            'category' => 'Non-Fiksi',
            'cover_image' => null,
        ]);
    }
}