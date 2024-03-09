<?php

namespace App\Http\Controllers;

use App\Models\AreaKampus;
use App\Models\Binaan;
use App\Models\Fakultas;
use App\Models\JurusanBinaan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BinaanController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::select('*')->get();
        $jurusan_binaan = JurusanBinaan::select('*')->get();
        $area_kampus = AreaKampus::select('*')->get();
        $binaan = Binaan::join('fakultas', 'binaan.fakultas_id', 'fakultas.id')
            ->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')
            ->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')
            ->select('binaan.*', 'fakultas.nama_fakultas', 'jurusan_binaan.nama_jurusan_binaan', 'area_kampus.nama_area_kampus')
            ->orderBy('fakultas.nama_fakultas')
            ->orderBy('jurusan_binaan.nama_jurusan_binaan')
            ->paginate(10);
        return view('admin.data_binaan', compact('binaan', 'fakultas', 'jurusan_binaan', 'area_kampus'));
    }

    public function store(Request $request)
    {
        $binaan = new Binaan();
        $binaan->fakultas_id = $request->fakultas_id;
        $binaan->jurusan_binaan_id = $request->jurusan_binaan_id;
        $binaan->program_binaan = $request->program_binaan;
        $binaan->area_kampus_id = $request->area_kampus_id;
        $binaan->save();

        return redirect()->back()->with('success', 'data berhasil ditambahkan');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $binaan = Binaan::where('id', $request->id)->first();
        $fakultas = Fakultas::select('*')->get();
        $jurusan_binaan = JurusanBinaan::select('*')->get();
        $area_kampus = AreaKampus::select('*')->get();

        return view('admin.edit_binaan', compact('user', 'binaan', 'fakultas', 'jurusan_binaan', 'area_kampus'));
    }

    public function update(Request $request)
    {
        $binaan = Binaan::where('id', $request->id);
        $binaan->update([
            'fakultas_id' => $request->fakultas_id,
            'jurusan_binaan_id' => $request->jurusan_binaan_id,
            'program_binaan' => $request->program_binaan,
            'area_kampus_id' => $request->area_kampus_id,
        ]);

        return redirect()->route('binaan.index')->with('success', 'data berhasil diperbaharui');
    }

    public function destroy(Request $request)
    {
        try {
            $binaan = Binaan::where('id', $request->id);
            $binaan->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        }
    }

    public function search(Request $request)
    {
        $fakultas = Fakultas::select('*')->get();
        $jurusan_binaan = JurusanBinaan::select('*')->get();
        $area_kampus = AreaKampus::select('*')->get();
        $binaan = Binaan::join('fakultas', 'binaan.fakultas_id', 'fakultas.id')
            ->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')
            ->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')
            ->select('binaan.*', 'fakultas.nama_fakultas', 'jurusan_binaan.nama_jurusan_binaan', 'area_kampus.nama_area_kampus')
            ->orderBy('fakultas.nama_fakultas')
            ->orderBy('jurusan_binaan.nama_jurusan_binaan')
            ->where('fakultas.nama_fakultas', 'LIKE', "%$request->cari%")
            ->orWhere('jurusan_binaan.nama_jurusan_binaan', 'LIKE', "%$request->cari%")
            ->orWhere('area_kampus.nama_area_kampus', 'LIKE', "%$request->cari%")
            ->orWhere('binaan.program_binaan', 'LIKE', "%$request->cari%")
            ->paginate(10);

        return view('admin.data_binaan', compact('binaan', 'fakultas', 'jurusan_binaan', 'area_kampus'));
    }
}
