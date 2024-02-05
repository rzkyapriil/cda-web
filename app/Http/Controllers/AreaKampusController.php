<?php

namespace App\Http\Controllers;

use App\Models\AreaKampus;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AreaKampusController extends Controller
{
    public function index()
    {
        $area_kampus = AreaKampus::select('*')->get();
        return view('admin.data_area_kampus', compact('area_kampus'));
    }

    public function create(Request $request)
    {
        $area_kampus = new AreaKampus();
        $area_kampus->nama_area_kampus = $request->nama_area_kampus;
        $area_kampus->save();

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
            $area_kampus = AreaKampus::where('id', $request->id);
            $area_kampus->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        }
    }
}
