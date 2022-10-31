<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function postlogin(Request $request)
    {
        //dd($request->all());
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        //dd(Auth::attempt($credentials));
        //dd(Auth::attempt(['username' => $request->username, 'password' => $request->password]));
        if (Auth::guard('pendaftaronline')->attempt($credentials)) {
            $request->session()->regenerate();

            //dd(Auth::guard('pendaftaronline')->user());
            //dd(Auth::check());
            return redirect()->intended('/dashboardadmin');
        }
    }

    public function postlogout(Request $request)
    {
        Auth::guard('pendaftaronline')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        $unit = DB::table('unit')
            ->where('nama_unit', '!=', 'PESANTREN')
            ->where('nama_unit', '!=', 'ASRAMA')
            ->get();
        return view('Auth.register', compact('unit'));
    }

    public function storeregister(Request $request)
    {
        $tahunakademik = "2023/2024";
        $ta = "2324";
        $cekpendaftaran = DB::table('pendaftaran_online')
            ->select('no_pendaftaran')
            ->where('tahunakademik', $tahunakademik)
            ->orderBy('no_pendaftaran', 'desc')
            ->first();
        if (empty($cekpendaftaran->no_pendaftaran)) {
            $no_pendaftaran_terakhir = "OL" . $ta . "000";
        } else {
            $no_pendaftaran_terakhir = $cekpendaftaran->no_pendaftaran;
        }

        $no_pendaftaran = buatkode($no_pendaftaran_terakhir, "OL" . $ta, 3);

        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:pendaftaran_online,email',
            'password' => 'required|min:6',
            'unit' => 'required'
        ]);
        if ($request->unit == "TK" || $request->unit == "SDIT") {
            $biaya = 250;
        } else if ($request->unit == "MTS" || $request->unit == "MA") {
            $biaya = 300;
        } else if ($request->unit == "MDU") {
            $biaya = 150;
        }
        $simpan = DB::table('pendaftaran_online')->insert([
            'no_pendaftaran' => $no_pendaftaran,
            'tgl_daftar' => date('Y-m-d'),
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tahunakademik' => $tahunakademik,
            'jenjang' => $request->unit,
            'biaya_pendaftaran' => $biaya . rand(100, 999)
        ]);

        if ($simpan) {
            return redirect('/')->with(['success' => 'Akun Berhasil Dibuat, Silahkan Login']);
        } else {
            return redirect('/')->with(['success' => 'Akun Gagal Dibuat,Coba Lagi']);
        }
    }
}
