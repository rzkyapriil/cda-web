<?php

namespace App\Http\Controllers;

use App\Http\Resources\DosenResource;
use App\Models\Binaan;
use App\Models\Dosen;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = DB::table('dosen')->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->join('fakultas', 'binaan.fakultas_id', 'fakultas.id')
            ->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')
            ->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')
            ->select('dosen.*', 'binaan.program_binaan', 'fakultas.nama_fakultas', 'jurusan_binaan.nama_jurusan_binaan', 'area_kampus.nama_area_kampus')
            ->orderBy('kode_dosen')->paginate(10);
        $binaan = DB::table('binaan')->join('fakultas', 'binaan.fakultas_id', 'fakultas.id')
            ->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')
            ->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')
            ->select('binaan.*', 'fakultas.nama_fakultas', 'jurusan_binaan.nama_jurusan_binaan', 'area_kampus.nama_area_kampus')
            ->get();
        return view('admin.data_dosen', compact('dosen', 'binaan'));
    }

    public function search(Request $request)
    {
        $dosen = Dosen::join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->join('fakultas', 'binaan.fakultas_id', 'fakultas.id')
            ->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')
            ->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')
            ->select('dosen.*', 'binaan.program_binaan', 'fakultas.nama_fakultas', 'jurusan_binaan.nama_jurusan_binaan', 'area_kampus.nama_area_kampus')
            ->where('nama_dosen', 'LIKE', "%$request->cari%")
            ->orWhere('kode_dosen', 'LIKE', "%$request->cari%")
            ->paginate(10);
        $binaan = Binaan::join('fakultas', 'binaan.fakultas_id', 'fakultas.id')
            ->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')
            ->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')
            ->select('binaan.*', 'fakultas.nama_fakultas', 'jurusan_binaan.nama_jurusan_binaan', 'area_kampus.nama_area_kampus')
            ->get();

        return view('admin.data_dosen', compact('dosen', 'binaan'));
    }

    public function store(Request $request)
    {
        $dosen = new Dosen();
        $dosen->binaan_id = $request->binaan_id;
        $dosen->kode_dosen = $request->kode_dosen;
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->save();

        return redirect()->back()->with('success', 'data berhasil ditambahkan');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $dosen = Dosen::where('id', $request->id)->first();
        $binaan = Binaan::join('fakultas', 'binaan.fakultas_id', 'fakultas.id')->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')->select('binaan.*', 'fakultas.nama_fakultas', 'jurusan_binaan.nama_jurusan_binaan', 'area_kampus.nama_area_kampus')->get();

        return view('admin.edit_dosen', compact('user', 'dosen', 'binaan'));
    }

    public function update(Request $request)
    {
        $dosen = Dosen::where('id', $request->id);
        $dosen->update([
            'binaan_id' => $request->binaan_id,
            'kode_dosen' => $request->kode_dosen,
            'nama_dosen' => $request->nama_dosen,
        ]);

        return redirect()->route('dosen.index')->with('success', 'data berhasil diperbaharui');
    }
    public function destroy(Request $request)
    {
        try {
            $dosen = Dosen::where('id', $request->id);
            $dosen->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        }
    }
}
