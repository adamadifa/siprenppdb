@extends('layouts.midone')
@section('titlepage', 'Data Pembiayaan')
@section('content')

<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Konfirmasi Pembayaran</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/pendaftar">Konfirmasi Pembayaran</a></li>
                            <li class="breadcrumb-item"><a href="#">Konfirmasi Pembayaran</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">

    <div class="col-md-12">
        <form class="form" action="/pembayaran/{{\Crypt::encrypt(Auth::guard('pendaftaronline')->user()->no_pendaftaran)}}/store" method="POST">
            @include('layouts.notification')
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Konfirmasi Pembayaran</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @csrf
                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-12">
                                                    <x-inputtext label="No. KK" value="{{$pendaftar->no_pendaftaran}}" field="no_kk" icon="feather icon-credit-card" readonly="true" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <x-inputtext label="Nama Lengkap" value="{{$pendaftar->nama_lengkap}}" field="nama_lengkap" icon="feather icon-user" readonly="true" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <x-inputtext label="Tanggal Bayar" field="tgl_bayar" icon="feather icon-calendar" datepicker="true" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <x-inputtext label="Dari Bank" field="bank" icon="fa fa-building-o" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <x-inputtext label="Pemilik Rekening" field="pemilik_rekening" icon="feather icon-user" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <x-inputtext label="Biaya Pendaftaran" value="{{ number_format($pendaftar->biaya_pendaftaran,'0','','.') }}" field="biaya_pendaftaran" icon="fa fa-money" readonly="true" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary btn-block mr-1 mb-1 btn-block">Konfirmasi Pembayaran</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        Silahkan Melakukan Pembayaran Sejumlah <b>Rp. {{ number_format($pendaftar->biaya_pendaftaran,'0','','.') }}</b>
                                        No. Rek <b> BSI : 7085588887</b> an. <b>Pesantren Persis 80 Ciamis</b> <br>
                                        <img src="{{ asset('app-assets/images/infopembayaran.jpg') }}" width="400x" height="400px" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-10 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No. Transaksi</th>
                                                <th>Tanggal</th>
                                                <th>Bank</th>
                                                <th>Pemilik Rekening</th>
                                                <th>Jumlah Bayar</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pembayaran as $d)
                                            <tr>
                                                <td>{{ $d->no_transaksi }}</td>
                                                <td>{{ $d->tgl_bayar }}</td>
                                                <td>{{ $d->bank }}</td>
                                                <td>{{ $d->pemilik_rekening }}</td>
                                                <td style="text-align: right">{{ number_format($d->biaya_pendaftaran,'0','','.') }}</td>
                                                <td>
                                                    @if ($d->status=="0")
                                                    <span class="badge badge-danger">Menunggu Konfirmasi</span>
                                                    @else
                                                    <span class="badge badge-success">Sudah Diverivikasi</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($d->status=="0")
                                                    <form method="POST" class="deleteform" action="/pembayaran/{{Crypt::encrypt($d->no_transaksi)}}/delete">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a class="delete-confirm ml-1">
                                                            <i class="feather icon-trash danger"></i>
                                                        </a>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('myscript')
<script>
    $(function() {
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Anda Yakin?'
                , text: 'Data ini akan didelete secara permanen!'
                , icon: 'warning'
                , buttons: ["Cancel", "Yes!"]
            , }).then(function(value) {
                if (value) {
                    $(".deleteform").submit();
                }
            });
        });
    });

</script>
@endpush
