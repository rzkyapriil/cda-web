<?php

namespace App\Http\Controllers;

use App\Models\AreaKampus;
use App\Models\Binaan;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\JurusanBinaan;
use App\Models\Questionnaire;
use Carbon\Carbon;
use COM;
use DivisionByZeroError;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoriPenilaianController extends Controller
{
    public function index()
    {
        $area = AreaKampus::select('*')->get();
        $jurusan = JurusanBinaan::select('*')->get();
        $fakultas = Fakultas::select('*')->get();
        // $dosen = Dosen::select('*')->get();

        return view('admin.histori_penilaian', compact('area', 'jurusan', 'fakultas'));
    }

    public function cari(Request $request)
    {
        $startDate = $request->tgl_mulai == null ? Carbon::now()->startOfMonth()->format('Y-m-d H:i:s') : $request->tgl_mulai;
        $endDate = $request->tgl_selesai == null ? Carbon::now()->endOfMonth()->format('Y-m-d H:i:s') : $request->tgl_selesai;

        $area = AreaKampus::select('*')->get();
        $jurusan = JurusanBinaan::select('*')->get();
        $fakultas = Fakultas::select('*')->get();
        // $dosen = DB::table('dosen')->select('*')->get();

        $data_area = $request->area;
        $data_fakultas = $request->fakultas;
        $data_jurusan = $request->jurusan;
        $data_tgl_mulai = $startDate;
        $data_tgl_selesai = $endDate;

        $data_quiz = DB::table('questionnaire')->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('binaan.area_kampus_id', ($data_area == null ? '!=' : '='), $data_area)
            ->where('binaan.fakultas_id', ($data_fakultas == null ? '!=' : '='), $data_fakultas)
            ->where('binaan.jurusan_binaan_id', ($data_jurusan == null ? '!=' : '='), $data_jurusan)
            ->whereBetween('questionnaire.created_at', [$data_tgl_mulai, $data_tgl_selesai])
            ->select('questionnaire.skor')
            ->get();

        $data_komunitas = DB::table('questionnaire')
            ->join('komunitas', 'questionnaire.komunitas_id', 'komunitas.id')
            ->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('binaan.area_kampus_id', ($data_area == null ? '!=' : '='), $data_area)
            ->where('binaan.fakultas_id', ($data_fakultas == null ? '!=' : '='), $data_fakultas)
            ->where('binaan.jurusan_binaan_id', ($data_jurusan == null ? '!=' : '='), $data_jurusan)
            ->whereBetween('questionnaire.created_at', [$data_tgl_mulai, $data_tgl_selesai])
            ->select('questionnaire.komunitas_id', 'komunitas.mitra')
            ->distinct('questionnaire.komunitas_id')
            ->get();

        $data_dosen = DB::table('questionnaire')
            ->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('binaan.area_kampus_id', ($data_area == null ? '!=' : '='), $data_area)
            ->where('binaan.fakultas_id', ($data_fakultas == null ? '!=' : '='), $data_fakultas)
            ->where('binaan.jurusan_binaan_id', ($data_jurusan == null ? '!=' : '='), $data_jurusan)
            ->whereBetween('questionnaire.created_at', [$data_tgl_mulai, $data_tgl_selesai])
            ->select('questionnaire.dosen_id', 'dosen.nama_dosen')
            ->distinct('questionnaire.dosen_id')
            ->get();

        return view(
            'admin.histori_penilaian',
            compact(
                'area',
                'jurusan',
                'fakultas',
                'data_area',
                'data_fakultas',
                'data_jurusan',
                'data_tgl_mulai',
                'data_tgl_selesai',
                'data_quiz',
                'data_komunitas',
                'data_dosen'
            )
        );
    }

    public function getNilai($data_area, $data_fakultas, $data_jurusan, $data_tgl_mulai, $data_tgl_selesai, $nilai)
    {
        $jumlah_nilai = DB::table('questionnaire')->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('questionnaire.skor', $nilai)
            ->where('binaan.area_kampus_id', ($data_area == null ? '!=' : '='), $data_area)
            ->where('binaan.fakultas_id', ($data_fakultas == null ? '!=' : '='), $data_fakultas)
            ->where('binaan.jurusan_binaan_id', ($data_jurusan == null ? '!=' : '='), $data_jurusan)
            ->whereBetween('questionnaire.created_at', [$data_tgl_mulai, $data_tgl_selesai])
            ->select('questionnaire.skor')
            ->count();
        $jumlah_banyak_nilai = DB::table('questionnaire')->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('binaan.area_kampus_id', ($data_area == null ? '!=' : '='), $data_area)
            ->where('binaan.fakultas_id', ($data_fakultas == null ? '!=' : '='), $data_fakultas)
            ->where('binaan.jurusan_binaan_id', ($data_jurusan == null ? '!=' : '='), $data_jurusan)
            ->whereBetween('questionnaire.created_at', [$data_tgl_mulai, $data_tgl_selesai])
            ->select('questionnaire.skor')
            ->count();

        try {
            $hasil = round(($jumlah_nilai / $jumlah_banyak_nilai) * 100, 2);
        } catch (DivisionByZeroError $e) {
            $hasil = 0;
        }

        return $hasil;
    }

    public function getArea($idArea) {
        $area = AreaKampus::where('id', $idArea)->first();
        return $area;
    }

    public function getFakultas($idFakultas) {
        $fakultas = Fakultas::where('id', $idFakultas)->first();
        return $fakultas;
    }

    public function getJurusan($idJurusan) {
        $jurusan = JurusanBinaan::where('id', $idJurusan)->first();
        return $jurusan;
    }
}
