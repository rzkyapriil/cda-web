<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormPelatihanController extends Controller
{
    public function index()
    {
        return view('form_pelatihan');
    }

    public function store(Request $request)
    {
        $pelatihan = DB::table('pelatihan')->where('judul_pelatihan', $request->judul_pelatihan)->first();

        if (!isset($pelatihan)) {
            $pelatihan = new Pelatihan();
            $pelatihan->judul_pelatihan = $request->judul_pelatihan;
            $pelatihan->save();

            return redirect()->route('questionnaire')->with('success', 'Pelatihan berhasil ditambahkan');
        }
        return redirect()->route('questionnaire')->with('errors', 'Pelatihan sudah ada!');
    }
}
