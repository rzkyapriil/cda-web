<?php

namespace App\Http\Controllers;

use App\Models\AreaKampus;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaKampusController extends Controller
{
    public function index()
    {
        $area_kampus = AreaKampus::select('*')
            ->paginate(10);
        return view('admin.data_area_kampus', compact('area_kampus'));
    }

    public function store(Request $request)
    {
        $area_kampus = new AreaKampus();
        $area_kampus->nama_area_kampus = $request->nama_area_kampus;
        $area_kampus->save();

        return redirect()->back()->with('success', 'data berhasil ditambahkan');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $area_kampus = AreaKampus::where('id', $request->id)->first();

        return view('admin.edit_area_kampus', compact('user', 'area_kampus'));
    }

    public function update(Request $request)
    {
        $area_kampus = AreaKampus::where('id', $request->id);
        $area_kampus->update([
            'nama_area_kampus' => $request->nama_area_kampus,
        ]);

        return redirect()->route('area-kampus.index')->with('success', 'data berhasil diperbaharui');
    }

    public function destroy(Request $request)
    {
        try {
            $area_kampus = AreaKampus::where('id', $request->id);
            $area_kampus->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        }
    }

    public function search(Request $request)
    {
        $area_kampus = AreaKampus::select('*')
            ->where('nama_area_kampus', 'LIKE', "%$request->cari%")
            ->paginate(10);

        return view('admin.data_area_kampus', compact('area_kampus'));
    }
}
