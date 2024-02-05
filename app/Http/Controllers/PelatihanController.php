<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use App\Models\Pelatihan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function index()
    {
        $pelatihan = Pelatihan::join('komunitas', 'pelatihan.komunitas_id', 'komunitas.id')->select('pelatihan.*', 'komunitas.mitra')->get();
        $komunitas = Komunitas::select('*')->get();
        return view('admin.data_pelatihan', compact('pelatihan', 'komunitas'));
    }

    public function create(Request $request)
    {
        $pelatihan = new Pelatihan();
        $pelatihan->komunitas_id = $request->komunitas_id;
        $pelatihan->nama_pelatihan = $request->nama_pelatihan;
        $pelatihan->save();

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
            $pelatihan = Pelatihan::where('id', $request->id);
            $pelatihan->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        }
    }
}
