<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Komandan User
        $komandan = [
            'name' => 'Komandan',
            'email' => 'komandan@gmail.com',  // You can adjust this as needed
            'password' => Hash::make('password'),  // Use Hash::make for encryption
            'role' => 'komandan',  // Assuming there's a 'role' field to identify the user's role
        ];

        // Create the user
        User::create($komandan);
    }
}