<?php

namespace App\Http\Controllers;

use App\Models\JurusanBinaan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class JurusanBinaanController extends Controller
{
    public function index()
    {
        $jurusan_binaan = JurusanBinaan::select('*')->get();
        return view('admin.data_jurusan_binaan', compact('jurusan_binaan'));
    }

    public function create(Request $request)
    {
        $jurusan_binaan = new JurusanBinaan();
        $jurusan_binaan->nama_jurusan_binaan = $request->nama_jurusan_binaan;
        $jurusan_binaan->save();

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
            $jurusan_binaan = JurusanBinaan::where('id', $request->id);
            $jurusan_binaan->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        }
    }
}
