<?php

namespace App\Http\Controllers;

use App\Models\AreaKampus;
use App\Models\Binaan;
use App\Models\Fakultas;
use App\Models\JurusanBinaan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BinaanController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::select('*')->get();
        $jurusan_binaan = JurusanBinaan::select('*')->get();
        $area_kampus = AreaKampus::select('*')->get();
        $binaan = Binaan::join('fakultas', 'binaan.fakultas_id', 'fakultas.id')->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')->select('binaan.*', 'fakultas.nama_fakultas', 'jurusan_binaan.nama_jurusan_binaan', 'area_kampus.nama_area_kampus')->get();
        return view('admin.data_binaan', compact('binaan', 'fakultas', 'jurusan_binaan', 'area_kampus'));
    }

    public function create(Request $request)
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
        // $user = Auth::user();
        // $daerah = Daerah::where('id', $request->id)->first();

        // return view('admin.edit_daerah', compact('user', 'daerah'));
    }

    public function update(Request $request)
    {
        // $daerah = Daerah::where('id', $request->id);
        // $daerah->update([
        //     'nama_daerah' => $request->nama_daerah,
        // ]);

        // return redirect()->route('admin.daerah')->with('success', 'data berhasil diperbaharui');
    }
    public function delete(Request $request)
    {
        try {
            $binaan = Binaan::where('id', $request->id);
            $binaan->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        }
    }
}
