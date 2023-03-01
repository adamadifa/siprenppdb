<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasController extends Controller
{
    public function index(Request $request)
    {
        if (!empty($request->nama_peserta)) {
            $peserta = DB::table('sertifikat')->where('nama_peserta', 'like', '%' . $request->nama_peserta . '%')->orderBy('nama_peserta')->get();
        } else {
            $peserta = DB::table('sertifikat')->orderBy('nama_peserta')->get();
        }

        return view('pas.index', compact('peserta'));
    }
}
