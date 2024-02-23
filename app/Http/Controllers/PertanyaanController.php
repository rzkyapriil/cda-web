<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertanyaanController extends Controller
{
    public function index()
    {
        $pertanyaan = Pertanyaan::select('*')
            ->paginate(10);

        return view('admin.data_pertanyaan', compact('pertanyaan'));
    }

    public function create(Request $request)
    {
        $pertanyaan = new Pertanyaan();
        $pertanyaan->pertanyaan = $request->pertanyaan;
        $pertanyaan->save();

        return redirect()->back()->with('success', 'data berhasil ditambahkan');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $pertanyaan = Pertanyaan::where('id', $request->id)->first();

        return view('admin.edit_pertanyaan', compact('user', 'pertanyaan'));
    }

    public function update(Request $request)
    {
        $pertanyaan = Pertanyaan::where('id', $request->id);
        $pertanyaan->update([
            'pertanyaan' => $request->pertanyaan,
        ]);

        return redirect()->route('admin.pertanyaan')->with('success', 'data berhasil diperbaharui');
    }

    public function delete(Request $request)
    {
        try {
            $pertanyaan = Pertanyaan::where('id', $request->id);
            $pertanyaan->delete();

            return redirect()->back()->with('success', 'data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Data sudah berelasi dengan data lain!');
        }
    }

    public function cari(Request $request)
    {
        $pertanyaan = Pertanyaan::select('*')
            ->where('pertanyaan', 'LIKE', "%$request->cari%")
            ->paginate(10);

        return view('admin.data_pertanyaan', compact('pertanyaan'));
    }
}
