<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomunitasController extends Controller
{
    public function index()
    {
        $komunitas = Komunitas::select('*')
            ->paginate(10);
        return view('admin.data_komunitas', compact('komunitas'));
    }

    public function create(Request $request)
    {
        $komunitas = new Komunitas();
        $komunitas->komunitas_id = $request->komunitas_id;
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
        $user = Auth::user();
        $komunitas = Komunitas::where('id', $request->id)->first();

        return view('admin.edit_komunitas', compact('user', 'komunitas'));
    }

    public function update(Request $request)
    {
        $komunitas = Komunitas::where('id', $request->id);
        $komunitas->update([
            'komunitas_id' => $request->komunitas_id,
            'mitra' => $request->mitra,
            'nama_pic' => $request->nama_pic,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jenis_usaha' => $request->jenis_usaha,
            'jenis_komunitas' => $request->jenis_komunitas,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.komunitas')->with('success', 'data berhasil diperbaharui');
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

    public function cari(Request $request)
    {
        $komunitas = Komunitas::select('*')
            ->where('komunitas_id', 'LIKE', "%$request->cari%")
            ->orwhere('mitra', 'LIKE', "%$request->cari%")
            ->orwhere('nama_pic', 'LIKE', "%$request->cari%")
            ->orwhere('jenis_usaha', 'LIKE', "%$request->cari%")
            ->orwhere('jenis_komunitas', 'LIKE', "%$request->cari%")
            ->paginate(10);

        return view('admin.data_komunitas', compact('komunitas'));
    }
}
