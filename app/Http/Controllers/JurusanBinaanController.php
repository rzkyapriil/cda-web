<?php

namespace App\Http\Controllers;

use App\Models\JurusanBinaan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurusanBinaanController extends Controller
{
    public function index()
    {
        $jurusan_binaan = JurusanBinaan::select('*')->paginate(10);
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
        $user = Auth::user();
        $jurusan_binaan = JurusanBinaan::where('id', $request->id)->first();

        return view('admin.edit_jurusan_binaan', compact('user', 'jurusan_binaan'));
    }

    public function update(Request $request)
    {
        $jurusan_binaan = JurusanBinaan::where('id', $request->id);
        $jurusan_binaan->update([
            'nama_jurusan_binaan' => $request->nama_jurusan_binaan,
        ]);

        return redirect()->route('admin.jurusan-binaan')->with('success', 'data berhasil diperbaharui');
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

    public function cari(Request $request)
    {
        $jurusan_binaan = JurusanBinaan::select('*')->where('nama_fakultas', 'LIKE', "%$request->cari%")->paginate(10);

        return view('admin.data_fakultas', compact('jurusan_binaan'));
    }
}
