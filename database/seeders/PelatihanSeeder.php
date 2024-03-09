<?php

namespace Database\Seeders;

use App\Models\Pelatihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelatihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelatihan::create([
            'judul_pelatihan' => 'Belajar Memasak',
        ]);
        Pelatihan::create([
            'judul_pelatihan' => 'Belajar Leadership',
        ]);
        Pelatihan::create([
            'judul_pelatihan' => 'Belajar Coding',
        ]);
        Pelatihan::create([
            'judul_pelatihan' => 'Belajar Membaca',
        ]);
        Pelatihan::create([
            'judul_pelatihan' => 'Belajar Database',
        ]);
    }
}
