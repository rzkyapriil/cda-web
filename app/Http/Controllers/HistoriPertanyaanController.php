<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoriPertanyaanController extends Controller
{
    public function index()
    {
        return view('admin.historypenilaian');
    }
}
