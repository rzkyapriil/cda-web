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
        $pelatihan = Pelatihan::select('*')
            ->paginate(10);
        return view('admin.data_pelatihan', compact('pelatihan'));
    }

    public function store(Request $request)
    {
        $pelatihan = new Pelatihan();
        $pelatihan->judul_pelatihan = $request->judul_pelatihan;
        $pelatihan->save();

        return redirect()->back()->with('success', 'data berhasil ditambahkan');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $pelatihan = Pelatihan::where('id', $request->id)->first();

        return view('admin.edit_pelatihan', compact('user', 'pelatihan'));
    }

    public function update(Request $request)
    {
        $pelatihan = Pelatihan::where('id', $request->id);
        $pelatihan->update([
            'judul_pelatihan' => $request->judul_pelatihan,
        ]);

        return redirect()->route('pelatihan.index')->with('success', 'data berhasil diperbaharui');
    }

    public function destroy(Request $request)
    {
        try {
            $pelatihan = Pelatihan::where('id', $request->id);
            $pelatihan->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        }
    }

    public function search(Request $request)
    {
        $pelatihan = Pelatihan::select('*')
            ->where('pelatihan.judul_pelatihan', 'LIKE', "%$request->cari%")
            ->paginate(10);

        return view('admin.data_pelatihan', compact('pelatihan'));
    }
}
