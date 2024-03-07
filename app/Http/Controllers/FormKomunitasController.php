<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormKomunitasController extends Controller
{
    public function index()
    {
        $area_kampus = DB::table('area_kampus')->get();

        return view('form_komunitas', compact('area_kampus'));
    }

    public function store(Request $request)
    {
        $komunitas = DB::table('komunitas')->where('mitra', $request->mitra)->first();

        if (!isset($komunitas)) {
            $komunitas = new Komunitas();
            $komunitas->mitra = $request->mitra;
            $komunitas->nama_pic = $request->nama_pic;
            $komunitas->jenis_komunitas = $request->jenis_komunitas;
            $komunitas->no_tlp = $request->no_tlp;
            $komunitas->email = $request->email;
            $komunitas->save();

            return redirect()->route('questionnaire')->with('success', 'Komunitas berhasil ditambahkan');
        }
        return redirect()->route('questionnaire')->with('errors', 'Komunitas sudah ada!');
    }
}
