<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElibrarySeeder extends Seeder
{
    public function run()
    {
        DB::table('elibrary')->insert([
            [
                'title' => 'Book 1',
                'author' => 'Author 1',
                'category' => 'Fiction',
                'synopsis' => 'Synopsis of Book 1',
                'cover_image' => 'storage/covers/cover1.jpg',
            ],
            [
                'title' => 'Book 2',
                'author' => 'Author 2',
                'category' => 'Science',
                'synopsis' => 'Synopsis of Book 2',
                'cover_image' => 'storage/covers/cover2.jpg',
            ],
        ]);
    }
}