<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class KomunitasController extends Controller
{
    public function index()
    {
        $komunitas = Komunitas::select('*')->get();
        return view('admin.data_komunitas', compact('komunitas'));
    }

    public function create(Request $request)
    {
        $komunitas = new Komunitas();
        $komunitas->id = $request->komunitas_id;
        $komunitas->mitra = $request->mitra;
        $komunitas->nama_pic = $request->nama_pic;
        $komunitas->no_tlp = $request->no_tlp;
        $komunitas->email = $request->email;
        $komunitas->alamat = $request->alamat;
        $komunitas->jenis_usaha = $request->jenis_usaha;
        $komunitas->keterangan = $request->keterangan;
        $komunitas->jenis_komunitas = $request->jenis_komunitas;
        $komunitas->save();

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
            $komunitas = Komunitas::where('id', $request->id);
            $komunitas->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        }
    }
}
