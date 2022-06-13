<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class PendaftarController extends Controller
{
    public function index()
    {
        $no_pendaftar = Auth::guard('pendaftaronline')->user()->no_pendaftaran;
        $pekerjaan = DB::table('pekerjaan')->get();
        $pendaftar = DB::table('pendaftaran_online')->where('no_pendaftaran', $no_pendaftar)->first();
        $propinsi = DB::table('provinces')->orderBy('prov_name', 'asc')->get();
        return view('pendaftar.index', compact('propinsi', 'pendaftar', 'pekerjaan'));
    }

    public function update(Request $request, $no_pendaftaran)
    {
        $request->validate([
            'no_kk' => 'required|max:16',
            'nama_lengkap' => 'required|max:50',
            'tempat_lahir' => 'required|max:50',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'anak_ke' => 'required|numeric|max:10',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'id_propinsi' => 'required',
            'id_kota' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required',
            'kode_pos' => 'required|max:6',
            'nik_ayah' => 'required|max:16',
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'nik_ibu' => 'required|max:16',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'pendidikan_ibu' => 'required'
        ]);
        $no_pendaftaran = Crypt::decrypt($no_pendaftaran);
        $update = DB::table('pendaftaran_online')->where('no_pendaftaran', $no_pendaftaran)
            ->update([
                'nisn' => $request->nisn,
                'no_kk' => $request->no_kk,
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'anak_ke' => $request->anak_ke,
                'jml_saudara' => $request->jml_saudara,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'id_propinsi' => $request->id_propinsi,
                'id_kota' => $request->id_kota,
                'id_kecamatan' => $request->id_kecamatan,
                'id_kelurahan' => $request->id_kelurahan,
                'kode_pos' => $request->kode_pos,
                'nik_ayah' => $request->nik_ayah,
                'nama_ayah' => $request->nama_ayah,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'pendidikan_ayah' => $request->pendidikan_ayah,
                'nik_ibu' => $request->nik_ibu,
                'nama_ibu' => $request->nama_ibu,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'pendidikan_ibu' => $request->pendidikan_ibu,
                'status' => '1',
                'log' => rand(10, 100)
            ]);
        if ($update) {
            return redirect('/pendaftar')->with(['success' => 'Data Berhasil Di Update']);
        } else {
            return redirect('/pendaftar')->with(['warning' => 'Data Gagal Di Update']);
        }
    }

    function cetak($no_pendaftaran)
    {
        $no_pendaftaran = Crypt::decrypt($no_pendaftaran);
        //$qrcode = Qrcode::size(400)->generate($no_pendaftaran);
        $qrcode = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate($no_pendaftaran));
        $pendaftar = DB::table('pendaftaran_online')->where('no_pendaftaran', $no_pendaftaran)
            ->select('pendaftaran_online.*', 'prov_name', 'regc_name', 'dist_name', 'vill_name', 'p1.nama_pekerjaan as pekerjaan_ayah', 'p2.nama_pekerjaan as pekerjaan_ibu')
            ->leftjoin('villages', 'pendaftaran_online.id_kelurahan', '=', 'villages.id')
            ->leftjoin('districts', 'pendaftaran_online.id_kecamatan', '=', 'districts.id')
            ->leftjoin('regencies', 'pendaftaran_online.id_kota', '=', 'regencies.id')
            ->leftjoin('provinces', 'pendaftaran_online.id_propinsi', '=', 'provinces.id')
            ->leftjoin('pekerjaan as p1', DB::raw('pendaftaran_online.pekerjaan_ayah'), '=', DB::raw('p1.id'))
            ->leftjoin('pekerjaan as p2', DB::raw('pendaftaran_online.pekerjaan_ibu'), '=', DB::raw('p2.id'))
            ->first();
        $pdf = PDF::loadview('pendaftar.cetak', compact('pendaftar', 'qrcode'));
        return $pdf->stream();

        //return view('pendaftar.cetak', compact('pendaftar', 'qrcode'));
    }
}
