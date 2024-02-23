<?php

namespace App\Http\Controllers;

use App\Http\Resources\PelatihanResource;
use App\Models\Komunitas;
use App\Models\Pelatihan;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelatihanController extends Controller
{
    public function index()
    {
        $pelatihan = Pelatihan::join('komunitas', 'pelatihan.komunitas_id', 'komunitas.id')
            ->select('pelatihan.*', 'komunitas.mitra')
            ->paginate(10);
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
        $user = Auth::user();
        $pelatihan = Pelatihan::where('id', $request->id)->first();
        $komunitas = Komunitas::select('*')->get();

        return view('admin.edit_pelatihan', compact('user', 'pelatihan', 'komunitas'));
    }

    public function update(Request $request)
    {
        $pelatihan = Pelatihan::where('id', $request->id);
        $pelatihan->update([
            'komunitas_id' => $request->komunitas_id,
            'nama_pelatihan' => $request->nama_pelatihan,
        ]);

        return redirect()->route('admin.pelatihan')->with('success', 'data berhasil diperbaharui');
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

    public function cari(Request $request)
    {
        $komunitas = Komunitas::select('*')->get();
        $pelatihan = Pelatihan::join('komunitas', 'pelatihan.komunitas_id', 'komunitas.id')
            ->select('pelatihan.*', 'komunitas.mitra')
            ->where('komunitas.mitra', 'LIKE', "%$request->cari%")
            ->orwhere('nama_pelatihan', 'LIKE', "%$request->cari%")
            ->paginate(10);

        return view('admin.data_pelatihan', compact('pelatihan', 'komunitas'));
    }

    public function list(): JsonResponse
    {
        $pelatihan = Pelatihan::select('*')->get();

        return (PelatihanResource::collection($pelatihan))->response()->setStatusCode(200);
    }
}
