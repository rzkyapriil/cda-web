<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KomunitasController extends Controller
{
    public function index()
    {
        $areas = DB::table('area_kampus')->select('area_kampus.nama_area_kampus')->get();
        $komunitas = DB::table('komunitas')->select('*')
            ->paginate(10);
        return view('admin.data_komunitas', compact('komunitas', 'areas'));
    }

    public function store(Request $request)
    {
        $komunitas = new Komunitas();
        $komunitas->komunitas_id = $request->komunitas_id;
        $komunitas->jenis_umkm = $request->jenis_umkm;
        $komunitas->mitra = $request->mitra;
        $komunitas->nama_pic = $request->nama_pic;
        $komunitas->no_tlp = $request->no_tlp;
        $komunitas->email = $request->email;
        $komunitas->alamat = $request->alamat;
        $komunitas->jenis_usaha = $request->jenis_usaha;
        $komunitas->keterangan = $request->keterangan;
        $komunitas->jenis_komunitas = $request->jenis_komunitas;
        $komunitas->alokasi_site = $request->alokasi_site;
        $komunitas->save();

        return redirect()->back()->with('success', 'data berhasil ditambahkan');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $areas = DB::table('area_kampus')->select('area_kampus.nama_area_kampus')->get();
        $komunitas = Komunitas::where('id', $request->id)->first();

        return view('admin.edit_komunitas', compact('user', 'komunitas', 'areas'));
    }

    public function update(Request $request)
    {
        $komunitas = Komunitas::where('id', $request->id);
        $komunitas->update([
            'komunitas_id' => $request->komunitas_id,
            'jenis_umkm' => $request->jenis_umkm,
            'mitra' => $request->mitra,
            'nama_pic' => $request->nama_pic,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jenis_usaha' => $request->jenis_usaha,
            'jenis_komunitas' => $request->jenis_komunitas,
            'keterangan' => $request->keterangan,
            'alokasi_site' => $request->alokasi_site
        ]);

        return redirect()->route('komunitas.index')->with('success', 'data berhasil diperbaharui');
    }
    public function destroy(Request $request)
    {
        try {
            $komunitas = Komunitas::where('id', $request->id);
            $komunitas->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        }
    }

    public function search(Request $request)
    {
        $areas = DB::table('area_kampus')->select('area_kampus.nama_area_kampus')->get();
        $komunitas = Komunitas::select('*')
            ->where('komunitas_id', 'LIKE', "%$request->cari%")
            ->orwhere('mitra', 'LIKE', "%$request->cari%")
            ->orwhere('nama_pic', 'LIKE', "%$request->cari%")
            ->orwhere('jenis_usaha', 'LIKE', "%$request->cari%")
            ->orwhere('jenis_komunitas', 'LIKE', "%$request->cari%")
            ->orwhere('email', 'LIKE', "%$request->cari%")
            ->orwhere('alokasi_site', 'LIKE', "%$request->cari%")
            ->paginate(10);

        return view('admin.data_komunitas', compact('komunitas', 'areas'));
    }
}
