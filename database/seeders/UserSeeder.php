<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'name' => 'admin',
        ]);

        User::create([
            'username' => 'ayu',
            'password' => Hash::make('ayu1234'),
            'name' => 'ayu',
        ]);

        User::create([
            'username' => 'yanie',
            'password' => Hash::make('yanie1234'),
            'name' => 'yanie',
        ]);

        User::create([
            'username' => 'herlina',
            'password' => Hash::make('herlina1234'),
            'name' => 'herlina',
        ]);
    }
}
