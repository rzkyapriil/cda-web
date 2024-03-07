<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Komentar;
use App\Models\Pertanyaan;
use App\Models\Questionnaire;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $pertanyaan = DB::table('pertanyaan')->get();
        $pelatihan = DB::table('pelatihan')->get();
        $komunitas = DB::table('komunitas')->get();
        $dosen = DB::table('dosen')->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->join('fakultas', 'binaan.fakultas_id', 'fakultas.id')
            ->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')
            ->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')
            ->select('dosen.*', 'binaan.program_binaan', 'fakultas.nama_fakultas', 'jurusan_binaan.nama_jurusan_binaan', 'area_kampus.nama_area_kampus')
            ->get();

        return view(
            'questionnaire',
            compact(
                'pertanyaan',
                'pelatihan',
                'dosen',
                'komunitas'
            )
        );
    }

    public function store(Request $request)
    {
        $pertanyaan = Pertanyaan::select('*')->get();
        $user_unique = QuestionnaireController::randomString(16);
        $check_user = Questionnaire::where('anon_user', $user_unique)->first();

        while (isset($check_user)) {
            $user_unique = QuestionnaireController::randomString(16);
        }

        foreach ($pertanyaan as $data) {
            $quiz = new Questionnaire();
            $quiz->tanggal_pelaksanaan = $request->tanggal_pelaksanaan;
            $quiz->pelatihan_id = $request->pelatihan;
            $quiz->komunitas_id = $request->komunitas;
            $quiz->dosen_id = $request->dosen;
            $quiz->anon_user = $user_unique;
            $quiz->pertanyaan_id = $data->id;
            $quiz->skor = $request->{'p' . ($data->id + 12)};
            $quiz->save();
        }

        $komentar = new Komentar();
        $komentar->anon_user = $user_unique;
        $komentar->komentar = $request->komentar;
        $komentar->save();

        return view('terima_kasih');
    }

    public function edit(Request $request)
    {
        // $user = Auth::user();
        // $dosen = Dosen::where('id', $request->id)->first();
        // $binaan = Binaan::join('fakultas', 'binaan.fakultas_id', 'fakultas.id')->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')->select('binaan.*', 'fakultas.nama_fakultas', 'jurusan_binaan.nama_jurusan_binaan', 'area_kampus.nama_area_kampus')->get();

        // return view('admin.edit_dosen', compact('user', 'dosen', 'binaan'));
    }

    public function update(Request $request)
    {
        // $dosen = Dosen::where('id', $request->id);
        // $dosen->update([
        //     'binaan_id' => $request->binaan_id,
        //     'kode_dosen' => $request->kode_dosen,
        //     'nama_dosen' => $request->nama_dosen,
        // ]);

        // return redirect()->route('admin.dosen')->with('success', 'data berhasil diperbaharui');
    }
    public function delete(Request $request)
    {
        // try {
        //     $dosen = Dosen::where('id', $request->id);
        //     $dosen->delete();
        //     return redirect()->back()->with('success', 'data berhasil dihapus');
        // } catch (QueryException $e) {
        //     return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        // }
    }

    public function randomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $max)];
        }
        return $randomString;
    }
}
