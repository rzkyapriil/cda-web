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

class HistoriPenilaianController extends Controller
{
    public function index()
    {
        $area = AreaKampus::select('*')->get();
        $jurusan = JurusanBinaan::select('*')->get();
        $fakultas = Fakultas::select('*')->get();
        $dosen = Dosen::select('*')->get();

        return view('admin.historypenilaian', compact('area', 'jurusan', 'fakultas', 'dosen'));
    }

    public function cari(Request $request)
    {
        // dd($request);

        $startDate = $request->tgl_mulai == null ? Carbon::now()->format('Y-m-d') : $request->tgl_mulai;
        $endDate = $request->tgl_selesai == null ? Carbon::now()->format('Y-m-d') : $request->tgl_selesai;

        $area = AreaKampus::select('*')->get();
        $jurusan = JurusanBinaan::select('*')->get();
        $fakultas = Fakultas::select('*')->get();
        $dosen = Dosen::select('*')->get();

        $data_quiz = Questionnaire::join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('binaan.area_kampus_id', ($request->area == null ? '!=' : '='), $request->area)
            ->where('binaan.fakultas_id', ($request->fakultas == null ? '!=' : '='), $request->fakultas)
            ->where('binaan.jurusan_binaan_id', ($request->jurusan == null ? '!=' : '='), $request->jurusan)
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->get();

        $data_area = $request->area;
        $data_fakultas = $request->fakultas;
        $data_jurusan = $request->jurusan;
        $data_tgl_mulai = $startDate;
        $data_tgl_selesai = $endDate;

        return view(
            'admin.historypenilaian',
            compact(
                'area',
                'jurusan',
                'fakultas',
                'dosen',
                'data_area',
                'data_fakultas',
                'data_jurusan',
                'data_tgl_mulai',
                'data_tgl_selesai',
                'data_quiz'
            )
        );
    }

    public function getNilai($data_area, $data_fakultas, $data_jurusan, $data_tgl_mulai, $data_tgl_selesai, $nilai)
    {
        $jumlah_nilai = Questionnaire::join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('questionnaire.jawaban', $nilai)
            ->where('binaan.area_kampus_id', ($data_area == null ? '!=' : '='), $data_area)
            ->where('binaan.fakultas_id', ($data_fakultas == null ? '!=' : '='), $data_fakultas)
            ->where('binaan.jurusan_binaan_id', ($data_jurusan == null ? '!=' : '='), $data_jurusan)
            ->whereBetween('questionnaire.created_at', [$data_tgl_mulai, $data_tgl_selesai])
            ->count();

        $jumlah_banyak_nilai = Questionnaire::join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->where('binaan.area_kampus_id', ($data_area == null ? '!=' : '='), $data_area)
            ->where('binaan.fakultas_id', ($data_fakultas == null ? '!=' : '='), $data_fakultas)
            ->where('binaan.jurusan_binaan_id', ($data_jurusan == null ? '!=' : '='), $data_jurusan)
            ->whereBetween('questionnaire.created_at', [$data_tgl_mulai, $data_tgl_selesai])
            ->count();

        try {
            $hasil = round(($jumlah_nilai / $jumlah_banyak_nilai) * 100, 2);
        } catch (DivisionByZeroError $e) {
            $hasil = 0;
        }

        return $hasil;
    }
}
