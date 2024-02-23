<?php

namespace App\Http\Controllers;

use App\Models\AreaKampus;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\JurusanBinaan;
use App\Models\Komunitas;
use App\Models\Pelatihan;
use App\Models\Questionnaire;
use Carbon\Carbon;
use DivisionByZeroError;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class AdminController extends Controller
{
    public function index()
    {
        $start = microtime(true);

        // Lakukan sesuatu di sini (misalnya, jalankan query, proses data, dll.)


        $komunitas = Komunitas::select('*')->count();
        $pelatihan = Pelatihan::select('*')->count();
        $dosen = Questionnaire::distinct('dosen_id')->count('dosen_id');
        $fakultas = Fakultas::select('*')->get();
        $jurusan = JurusanBinaan::select('*')->get();
        $area = AreaKampus::select('*')->get();

        $quiz = Questionnaire::whereDate('created_at', Carbon::today())->get();
        $jumlah_submit_quiz = count($quiz->unique('anon_user'));
        $jumlah_nilai = Questionnaire::max('jawaban');

        // dd($quiz->unique('anon_user'));
        $end = microtime(true);
        $executionTime = ($end - $start) * 1000; // Waktu eksekusi dalam milidetik

        // echo "Waktu eksekusi: " . $executionTime . " ms";

        return view('admin.dashboard', compact('komunitas', 'pelatihan', 'dosen', 'area', 'jumlah_submit_quiz', 'jumlah_nilai', 'fakultas', 'jurusan', 'executionTime'));
    }

    public function getNilaiPerArea($idArea, $nilai)
    {
        $jumlah_nilai = Questionnaire::join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('questionnaire.jawaban', $nilai)
            ->where('binaan.area_kampus_id', $idArea)
            ->count();

        $jumlah_banyak_nilai = Questionnaire::join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('binaan.area_kampus_id', $idArea)
            ->count();

        try {
            $persentase = round(($jumlah_nilai / $jumlah_banyak_nilai) * 100, 2);
        } catch (DivisionByZeroError $e) {
            $persentase = 0;
        }

        return $persentase;
    }

    public function getTotalNilaiPerArea($idArea)
    {
        $average = Questionnaire::join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('binaan.area_kampus_id', $idArea)
            ->avg('jawaban');


        return $average == null ? 0 : $average;
    }

    public function getNilaiPerFakultas($idFakultas, $nilai)
    {
        $jumlah_nilai = Questionnaire::join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('questionnaire.jawaban', $nilai)
            ->where('binaan.fakultas_id', $idFakultas)
            ->count();

        $jumlah_banyak_nilai = Questionnaire::join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('binaan.fakultas_id', $idFakultas)
            ->count();

        try {
            $persentase = round(($jumlah_nilai / $jumlah_banyak_nilai) * 100, 2);
        } catch (DivisionByZeroError $e) {
            $persentase = 0;
        }

        return $persentase;
    }

    public function getTotalNilaiPerFakultas($idFakultas)
    {
        $average = Questionnaire::join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('binaan.fakultas_id', $idFakultas)
            ->avg('jawaban');


        return $average == null ? 0 : $average;
    }

    public function getNilaiPerJurusan($idJurusan, $nilai)
    {
        $jumlah_nilai = Questionnaire::join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('questionnaire.jawaban', $nilai)
            ->where('binaan.jurusan_binaan_id', $idJurusan)
            ->count();

        $jumlah_banyak_nilai = Questionnaire::join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('binaan.jurusan_binaan_id', $idJurusan)
            ->count();

        try {
            $persentase = round(($jumlah_nilai / $jumlah_banyak_nilai) * 100, 2);
        } catch (DivisionByZeroError $e) {
            $persentase = 0;
        }

        return $persentase;
    }

    public function getTotalNilaiPerJurusan($idJurusan)
    {
        $average = Questionnaire::join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('binaan.jurusan_binaan_id', $idJurusan)
            ->avg('jawaban');


        return $average == null ? 0 : $average;
    }
}
