<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pertanyaan::create([
            'pertanyaan' => 'Manajemen kegiatan Pengabdian yang efektif bagi masyarakat luas'
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Memfasilitasi kegiatan yang sesuai dengan kebutuhan masyarakat terkini'
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Narasumber yang berkualitas'
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Materi yang berbobot/layak'
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Gaya komunikasi yang interaktif'
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Saya merasa puas terhadap proses pelaksanaan kegiatan ini'
        ]);
    }
}
