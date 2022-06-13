@extends('layouts.midone')
@section('titlepage', 'Data Pembiayaan')
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- Dashboard Analytics Start -->
        <section id="dashboard-analytics">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card bg-analytics text-white">
                        <div class="card-content">
                            <div class="card-body text-center">
                                <img src="{{asset('app-assets/images/elements/decore-left.png')}}" class="img-left" alt="card-img-left">
                                <img src="{{asset('app-assets/images/elements/decore-right.png')}}" class="img-right" alt="card-img-right">
                                <div class="avatar avatar-xl bg-primary shadow mt-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-award white font-large-1"></i>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="mb-2 text-white">Assalamu'alaikum, {{ Auth::guard('pendaftaronline')->user()->nama_lengkap }}</h1>
                                    <h3 class="mb-2 text-white">No. Pendaftaran : {{ Auth::guard('pendaftaronline')->user()->no_pendaftaran }}</h3>
                                    <p class="m-auto w-75">Silahkan Lengkapi Data diri, Untuk melanjutkan proses pendaftaran</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Status Pendaftaran</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="activity-timeline timeline-left list-unstyled">
                                    <li>
                                        <div class="timeline-icon bg-primary">
                                            <i class="feather icon-user-plus font-medium-2 align-middle"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold mb-0">Registrasi</p>
                                            <span class="font-small-3">Status : </span><span class="font-small-3 success">Completed <i class="fa fa-check"></i></span>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-warning">
                                            <i class="feather icon-user-check font-medium-2 align-middle"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold mb-0">Melengkapi Data Diri</p>
                                            <span class="font-small-3">Status :</span>
                                            @if ($pendaftar->status=="1")
                                            <span class="font-small-3 success">Completed <i class="fa fa-check"></i></span>
                                            @else
                                            <span class="font-small-3 danger">Not Completed <i class="fa fa-close"></i></span>
                                            @endif
                                        </div>

                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-danger">
                                            <i class="fa fa-money font-medium-2 align-middle"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold mb-0">Pembayaran Pendaftaran</p>
                                            <span class="font-small-3">Status :</span>

                                            @if ($pembayaran==null)
                                            <span class="font-small-3 danger">Belum Melakukan Pembayaran <i class="fa fa-close"></i></span>
                                            @else
                                            @if ($pembayaran->status==="0")
                                            <span class="font-small-3 warning">Menunggu Konfirmasi <i class="fa fa-history"></i></span>
                                            @else
                                            <span class="font-small-3 success">Sudah Verifikasi <i class="fa fa-check"></i></span>
                                            @endif
                                            @endif

                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-success">
                                            <i class="feather icon-printer font-medium-2 align-middle"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold mb-0">Cetak Formulir</p>
                                            @if ($pembayaran==null)
                                            <span class="font-small-3 danger">Belum Melakukan Pembayaran <i class="fa fa-close"></i></span>
                                            @else
                                            @if ($pembayaran->status==="0")
                                            <span class="font-small-3 warning">Menunggu Konfirmasi <i class="fa fa-history"></i></span>
                                            @else
                                            <a href="/pendaftar/{{ \Crypt::encrypt($pendaftar->no_pendaftaran) }}/cetak" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-file-text mr-1"></i> Cetak Formulir </a>
                                            @endif
                                            @endif

                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Status Pembayaran</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <b>Biaya Pendaftaran :</b>
                                <br>
                                <h2>Rp. {{ number_format($pendaftar->biaya_pendaftaran,'0','','.') }}</h2>
                                @if ($pembayaran==null)
                                <span class="font-small-3 danger">Belum Melakukan Pembayaran <i class="fa fa-close"></i></span>
                                @else
                                @if ($pembayaran->status==="0")
                                <span class="font-small-3 warning">Menunggu Konfirmasi <i class="fa fa-history"></i></span>
                                @else
                                <a href="/pendaftar/{{ \Crypt::encrypt($pendaftar->no_pendaftaran) }}/cetak" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-file-text mr-1"></i> Cetak Formulir </a>
                                @endif
                                @endif
                                <br>
                                <img src="{{ asset('app-assets/images/norek.png') }}" width="300px" height="100px" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
