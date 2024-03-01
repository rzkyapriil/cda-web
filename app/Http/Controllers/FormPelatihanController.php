<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;

class FormPelatihanController extends Controller
{
    public function index()
    {
        return view('form_pelatihan');
    }

    public function store(Request $request)
    {
        $pelatihan = new Pelatihan();
        $pelatihan->judul_pelatihan = $request->judul;
        $pelatihan->save();

        return redirect()->route('questionnaire')->with('success', 'data berhasil ditambahkan');
    }
}
