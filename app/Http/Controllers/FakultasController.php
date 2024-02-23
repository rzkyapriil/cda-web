<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::select('*')->paginate(10);
        return view('admin.data_fakultas', compact('fakultas'));
    }

    public function create(Request $request)
    {
        $fakultas = new Fakultas();
        $fakultas->nama_fakultas = $request->nama_fakultas;
        $fakultas->save();

        return redirect()->back()->with('success', 'data berhasil ditambahkan');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $fakultas = Fakultas::where('id', $request->id)->first();

        return view('admin.edit_fakultas', compact('user', 'fakultas'));
    }

    public function update(Request $request)
    {
        $fakultas = Fakultas::where('id', $request->id);
        $fakultas->update([
            'nama_fakultas' => $request->nama_fakultas,
        ]);

        return redirect()->route('admin.fakultas')->with('success', 'data berhasil diperbaharui');
    }
    public function delete(Request $request)
    {
        try {
            $fakultas = Fakultas::where('id', $request->id);
            $fakultas->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        }
    }

    public function cari(Request $request)
    {
        $fakultas = Fakultas::select('*')->where('nama_fakultas', 'LIKE', "%$request->cari%")->paginate(10);

        return view('admin.data_fakultas', compact('fakultas'));
    }
}
