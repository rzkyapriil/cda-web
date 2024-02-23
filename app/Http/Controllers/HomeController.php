<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Pelatihan;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

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
        $pertanyaan = Pertanyaan::select('*')->get();
        $pelatihan = Pelatihan::join('komunitas', 'pelatihan.komunitas_id', 'komunitas.id')->select('pelatihan.*', 'komunitas.mitra', 'komunitas.jenis_komunitas')->get();
        $dosen = Dosen::join('binaan', 'dosen.binaan_id', 'binaan.id')->join('fakultas', 'binaan.fakultas_id', 'fakultas.id')->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')->select('dosen.*', 'binaan.program_binaan', 'fakultas.nama_fakultas', 'jurusan_binaan.nama_jurusan_binaan', 'area_kampus.nama_area_kampus')->get();

        return view('questionnaire', compact('pertanyaan', 'pelatihan', 'dosen'));
    }
}
