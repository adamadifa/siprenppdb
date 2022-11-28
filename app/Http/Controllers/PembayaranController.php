<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index()
    {
        $no_pendaftaran = Auth::guard('pendaftaronline')->user()->no_pendaftaran;
        $pendaftar = DB::table('pendaftaran_online')->where('no_pendaftaran', $no_pendaftaran)->first();
        $pembayaran = DB::table('konfirmasi_pembayaran')->where('no_pendaftaran', $no_pendaftaran)->get();
        return view('pembayaran.index', compact('pendaftar', 'pembayaran'));
    }

    public function store(Request $request, $no_pendaftaran)
    {
        $no_pendaftaran = Crypt::decrypt($no_pendaftaran);
        $tahunakademik = "2023/2024";
        $ta = "2324";
        $cekpembayaran = DB::table('konfirmasi_pembayaran')
            ->select('no_transaksi')
            ->join('pendaftaran_online', 'konfirmasi_pembayaran.no_pendaftaran', '=', 'pendaftaran_online.no_pendaftaran')
            ->where('tahunakademik', $tahunakademik)
            ->orderBy('no_transaksi', 'desc')
            ->first();
        if (empty($cekpembayaran->no_transaksi)) {
            $no_transaksi_terakhir = "KP" . $ta . "000";
        } else {
            $no_transaksi_terakhir = $cekpembayaran->no_transaksi;
        }

        $no_transaksi = buatkode($no_transaksi_terakhir, "KP" . $ta, 3);
        $request->validate([
            'tgl_bayar' => 'required',
            'bank' => 'required',
            'pemilik_rekening' => 'required'
        ]);
        $cek = DB::table('konfirmasi_pembayaran')->where('no_pendaftaran', $no_pendaftaran)->count();

        if (empty($cek)) {
            $simpan = DB::table('konfirmasi_pembayaran')->insert([
                'no_transaksi' => $no_transaksi,
                'no_pendaftaran' => $no_pendaftaran,
                'tgl_bayar' => $request->tgl_bayar,
                'bank' => $request->bank,
                'pemilik_rekening' => $request->pemilik_rekening,
                'biaya_pendaftaran' => str_replace(".", "", $request->biaya_pendaftaran),
                'status' => '0'
            ]);

            if ($simpan) {
                return redirect('/pembayaran')->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return redirect('/pembayaran')->with(['warning' => 'Data Gagal Disimpan']);
            }
        } else {
            return redirect('/pembayaran')->with(['warning' => 'Anda Sudah Melakukan Konfirmasi Pembayaran']);
        }
    }

    public function delete($no_transaksi)
    {
        $no_transaksi = Crypt::decrypt($no_transaksi);
        $hapus = DB::table('konfirmasi_pembayaran')
            ->where('no_transaksi', $no_transaksi)
            ->delete();
        if ($hapus) {
            return redirect('/pembayaran')->with(['success' => 'Pembayaran Berhasil Dibatalkan']);
        } else {
            return redirect('/pembayaran')->with(['warning' => 'Pembayaran Gagal Dibatalkan']);
        }
    }
}
