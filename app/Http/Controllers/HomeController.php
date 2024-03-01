<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Komunitas;
use App\Models\Pelatihan;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function terima()
    {
        return view('terima_kasih');
    }

    public function questionnaire()
    {
        $pertanyaan = DB::table('pertanyaan')->select('*')->get();
        $pelatihan = DB::table('pelatihan')->get();
        $komunitas = DB::table('komunitas')->get();
        $dosen = DB::table('dosen')->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->join('fakultas', 'binaan.fakultas_id', 'fakultas.id')
            ->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')
            ->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')
            ->select('dosen.*', 'binaan.program_binaan', 'fakultas.nama_fakultas', 'jurusan_binaan.nama_jurusan_binaan', 'area_kampus.nama_area_kampus')
            ->get();

        return view('questionnaire',
            compact(
                'pertanyaan',
                'pelatihan',
                'dosen',
                'komunitas'
            ));
    }
}
