@extends('layouts.midone')
@section('titlepage', 'Data Pembiayaan')
@section('content')

<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Data Diri</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/pendaftar">Data Diri</a></li>
                            <li class="breadcrumb-item"><a href="#">Update Data Diri</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">

    <form class="form" action="/pendaftar/{{\Crypt::encrypt(Auth::guard('pendaftaronline')->user()->no_pendaftaran)}}/update" method="POST">
        <div class="col-md-12">
            @include('layouts.notification')
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Diri</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @csrf
                                        <div class="form-body">
                                            @if (Auth::guard('pendaftaronline')->user()->jenjang != "SDIT")

                                            <div class="row">
                                                <div class="col-12">
                                                    <x-inputtext label="NISN" value="{{$pendaftar->nisn}}" field="nisn" icon="feather icon-credit-card" />
                                                </div>
                                            </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <x-inputtext label="No. KK" value="{{$pendaftar->no_kk}}" field="no_kk" icon="feather icon-credit-card" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <x-inputtext label="Nama Lengkap" value="{{$pendaftar->nama_lengkap}}" field="nama_lengkap" icon="feather icon-user" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <x-inputtext label="Tempat Lahir" field="tempat_lahir" value="{{$pendaftar->tempat_lahir}}" icon="feather icon-map" />
                                                </div>
                                                <div class="col-6">
                                                    <x-inputtext label="Tanggal Lahir" field="tanggal_lahir" value="{{$pendaftar->tanggal_lahir}}" icon="feather icon-calendar" datepicker="true" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group jenis_kelamin @error('jenis_kelamin') error @enderror">
                                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                            <option value="">Jenis Kelamin</option>
                                                            <option @isset($pendaftar->jenis_kelamin) @if(old("jenis_kelamin"))
                                                                {{old("jenis_kelamin")=="L" ? "selected":""}} @else
                                                                {{$pendaftar->jenis_kelamin=="L" ? "selected":""}} @endif @else
                                                                {{old("jenis_kelamin")=="L" ? "selected":""}}
                                                                @endisset value="L">
                                                                Laki - Laki</option>
                                                            <option @isset($pendaftar->jenis_kelamin) @if(old("jenis_kelamin"))
                                                                {{old("jenis_kelamin")=="P" ? "selected":""}} @else
                                                                {{$pendaftar->jenis_kelamin=="P" ? "selected":""}} @endif @else
                                                                {{old("jenis_kelamin")=="P" ? "selected":""}}
                                                                @endisset value="P">
                                                                Perempuan</option>
                                                        </select>
                                                        @error('jenis_kelamin')
                                                        <div class="help-block">
                                                            <ul role="alert">
                                                                <li>{{ $message }}</li>
                                                            </ul>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <x-inputtext label="Anak Ke." value="{{$pendaftar->anak_ke}}" field="anak_ke" icon="feather icon-users" />
                                                </div>
                                                <div class="col-6">
                                                    <x-inputtext label="Jumlah Saudara" value="{{$pendaftar->jml_saudara}}" field="jml_saudara" icon="feather icon-users" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <x-inputtext label="No. HP" field="no_hp" value="{{$pendaftar->no_hp}}" icon="feather icon-phone" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Alamat</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group  @error('alamat') error @enderror">
                                                    <fieldset class="form-label-group mb-0">
                                                        <textarea autocomplete="off" data-length=100 class="form-control char-textarea" name="alamat" id="alamat" rows="3" placeholder="Alamat Sesuai KTP"> @isset($pendaftar->alamat) {{old('alamat') ? old('alamat') : $pendaftar->alamat}} @else
                              {{old('alamat')}} @endisset</textarea>
                                                    </fieldset>
                                                    <small class="counter-value float-right"><span class="char-count">0</span> /
                                                        100
                                                    </small>
                                                    @error('alamat')
                                                    <div class="help-block">
                                                        <ul role="alert">
                                                            <li>{{ $message }}</li>
                                                        </ul>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group  @error('id_propinsi') error @enderror">
                                                    <select name="id_propinsi" id="id_propinsi" class="form-control">
                                                        <option value="">Propinsi</option>
                                                        @foreach ($propinsi as $p)
                                                        <option @isset($pendaftar->id_propinsi) @if(old("id_propinsi"))
                                                            {{old("id_propinsi")==$p->id ? "selected":""}} @else
                                                            {{$pendaftar->id_propinsi==$p->id ? "selected":""}} @endif @else
                                                            {{old("id_propinsi")==$p->id ? "selected":""}}
                                                            @endisset value="{{ $p->id }}">
                                                            {{ $p->prov_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_propinsi')
                                                    <div class="help-block">
                                                        <ul role="alert">
                                                            <li>{{ $message }}</li>
                                                        </ul>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group  @error('id_kota') error @enderror">
                                                    <select name="id_kota" id="id_kota" class="form-control">
                                                        <option value="">Kabupaten/Kota</option>
                                                    </select>
                                                    @error('id_kota')
                                                    <div class="help-block">
                                                        <ul role="alert">
                                                            <li>{{ $message }}</li>
                                                        </ul>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group @error('id_kecamatan') error @enderror"">
                                                                                <select name=" id_kecamatan" id="id_kecamatan" class="form-control">
                                                    <option value="">Kecamatan</option>
                                                    </select>
                                                    @error('id_kecamatan')
                                                    <div class="help-block">
                                                        <ul role="alert">
                                                            <li>{{ $message }}</li>
                                                        </ul>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group @error('id_kelurahan') error @enderror">
                                                    <select name="id_kelurahan" id="id_kelurahan" class="form-control">
                                                        <option value="">Kelurahan</option>
                                                    </select>
                                                    @error('id_kelurahan')
                                                    <div class="help-block">
                                                        <ul role="alert">
                                                            <li>{{ $message }}</li>
                                                        </ul>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <x-inputtext label="Kode Pos" value="{{ $pendaftar->kode_pos }}" field="kode_pos" icon="feather icon-codepen" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Orangtua</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <x-inputtext label="NIK. Ayah" value="{{$pendaftar->nik_ayah}}" field="nik_ayah" icon="feather icon-credit-card" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <x-inputtext label="Nama. Ayah" value="{{$pendaftar->nama_ayah}}" field="nama_ayah" icon="feather icon-user" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group  @error('pendidikan_ayah') error @enderror">
                                                    <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-control">
                                                        <option value="">Pendidikan Terakhir Ayah</option>
                                                        <option @isset($pendaftar->pendidikan_ayah)
                                                            @if (old('pendidikan_ayah'))
                                                            {{ old('pendidikan_ayah') == 'SD' ? 'selected' : '' }}
                                                            @else
                                                            {{ $pendaftar->pendidikan_ayah == 'SD' ? 'selected' : '' }}
                                                            @endif
                                                            @else
                                                            {{ old('pendidikan_ayah') == 'SD' ? 'selected' : '' }}
                                                            @endisset
                                                            value="SD">
                                                            SD
                                                        </option>
                                                        <option @isset($pendaftar->pendidikan_ayah)
                                                            @if(old('pendidikan_ayah'))
                                                            {{ old('pendidikan_ayah') == 'SMP' ? 'selected' : '' }}
                                                            @else
                                                            {{ $pendaftar->pendidikan_ayah == 'SMP' ? 'selected' : '' }}
                                                            @endif
                                                            @else
                                                            {{ old('pendidikan_ayah') == 'SMP' ? 'selected' : '' }}
                                                            @endisset value="SMP"> SMP </option>
                                                        <option @isset($pendaftar->pendidikan_ayah)
                                                            @if(old('pendidikan_ayah'))
                                                            {{ old('pendidikan_ayah') == 'SMA' ? 'selected' : '' }}
                                                            @else
                                                            {{ $pendaftar->pendidikan_ayah == 'SMA' ? 'selected' : '' }}
                                                            @endif
                                                            @else
                                                            {{ old('pendidikan_ayah') == 'SMA' ? 'selected' : '' }}
                                                            @endisset
                                                            value="SMA">SMA</option>
                                                        <option @isset($pendaftar->pendidikan_ayah) @if(old('pendidikan_ayah'))
                                                            {{ old('pendidikan_ayah') == 'D3' ? 'selected' : '' }}
                                                            @else
                                                            {{ $pendaftar->pendidikan_ayah == 'D3' ? 'selected' : '' }}
                                                            @endif
                                                            @else
                                                            {{ old('pendidikan_ayah') == 'D3' ? 'selected' : '' }}
                                                            @endisset
                                                            value="D3">D3</option>
                                                        <option @isset($pendaftar->pendidikan_ayah) @if(old('pendidikan_ayah'))
                                                            {{ old('pendidikan_ayah') == 'S1' ? 'selected' : '' }}
                                                            @else
                                                            {{ $pendaftar->pendidikan_ayah == 'S1' ? 'selected' : '' }}
                                                            @endif
                                                            @else
                                                            {{ old('pendidikan_ayah') == 'S1' ? 'selected' : '' }}
                                                            @endisset
                                                            value="S1"> S1 </option>
                                                        <option @isset($pendaftar->pendidikan_ayah) @if(old('pendidikan_ayah'))
                                                            {{ old('pendidikan_ayah') == 'S2' ? 'selected' : '' }}
                                                            @else
                                                            {{ $pendaftar->pendidikan_ayah == 'S2' ? 'selected' : '' }}
                                                            @endif
                                                            @else
                                                            {{ old('pendidikan_ayah') == 'S2' ? 'selected' : '' }}
                                                            @endisset
                                                            value="S2">
                                                            S2
                                                        </option>
                                                    </select>
                                                    @error('pendidikan_ayah')
                                                    <div class="help-block">
                                                        <ul role="alert">
                                                            <li>{{ $message }}</li>
                                                        </ul>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group  @error('pekerjaan_ayah') error @enderror">
                                                    <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control">
                                                        <option value="">Pekerjaan Ayah</option>
                                                        @foreach ($pekerjaan as $p)
                                                        <option @isset($pendaftar->pekerjaan_ayah) @if(old('pekerjaan_ayah'))
                                                            {{ old('pekerjaan_ayah') == $p->id ? 'selected' : '' }}
                                                            @else
                                                            {{ $pendaftar->pekerjaan_ayah == $p->id ? 'selected' : '' }}
                                                            @endif @else
                                                            {{ old('pekerjaan_ayah') == $p->id ? 'selected' : '' }}
                                                            @endisset {{ old('pekerjaan_ayah') == $p->id ? 'selected' :
                                                            '' }} value="{{ $p->id }}">
                                                            {{ $p->nama_pekerjaan }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_propinsi')
                                                    <div class="help-block">
                                                        <ul role="alert">
                                                            <li>{{ $message }}</li>
                                                        </ul>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <x-inputtext label="NIK. ibu" value="{{$pendaftar->nik_ibu}}" field="nik_ibu" icon="feather icon-credit-card" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <x-inputtext label="Nama. ibu" value="{{$pendaftar->nama_ibu}}" field="nama_ibu" icon="feather icon-user" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group  @error('pendidikan_ibu') error @enderror">
                                                    <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-control">
                                                        <option value="">Pendidikan Terakhir ibu</option>
                                                        <option @isset($pendaftar->pendidikan_ibu)
                                                            @if (old('pendidikan_ibu'))
                                                            {{ old('pendidikan_ibu') == 'SD' ? 'selected' : '' }}
                                                            @else
                                                            {{ $pendaftar->pendidikan_ibu == 'SD' ? 'selected' : '' }}
                                                            @endif
                                                            @else
                                                            {{ old('pendidikan_ibu') == 'SD' ? 'selected' : '' }}
                                                            @endisset
                                                            value="SD">
                                                            SD
                                                        </option>
                                                        <option @isset($pendaftar->pendidikan_ibu) @if(old('pendidikan_ibu'))
                                                            {{ old('pendidikan_ibu') == 'SMP' ? 'selected' : '' }}
                                                            @else
                                                            {{ $pendaftar->pendidikan_ibu == 'SMP' ? 'selected' : '' }}
                                                            @endif
                                                            @else
                                                            {{ old('pendidikan_ibu') == 'SMP' ? 'selected' : '' }}
                                                            @endisset value="SMP"> SMP </option>
                                                        <option @isset($pendaftar->pendidikan_ibu) @if(old('pendidikan_ibu'))
                                                            {{ old('pendidikan_ibu') == 'SMA' ? 'selected' : '' }}
                                                            @else
                                                            {{ $pendaftar->pendidikan_ibu == 'SMA' ? 'selected' : '' }}
                                                            @endif
                                                            @else
                                                            {{ old('pendidikan_ibu') == 'SMA' ? 'selected' : '' }}
                                                            @endisset
                                                            value="SMA">SMA</option>
                                                        <option @isset($pendaftar->pendidikan_ibu) @if(old('pendidikan_ibu'))
                                                            {{ old('pendidikan_ibu') == 'D3' ? 'selected' : '' }}
                                                            @else
                                                            {{ $pendaftar->pendidikan_ibu == 'D3' ? 'selected' : '' }}
                                                            @endif
                                                            @else
                                                            {{ old('pendidikan_ibu') == 'D3' ? 'selected' : '' }}
                                                            @endisset
                                                            value="D3">D3</option>
                                                        <option @isset($pendaftar->pendidikan_ibu) @if(old('pendidikan_ibu'))
                                                            {{ old('pendidikan_ibu') == 'S1' ? 'selected' : '' }}
                                                            @else
                                                            {{ $pendaftar->pendidikan_ibu == 'S1' ? 'selected' : '' }}
                                                            @endif
                                                            @else
                                                            {{ old('pendidikan_ibu') == 'S1' ? 'selected' : '' }}
                                                            @endisset
                                                            value="S1"> S1 </option>
                                                        <option @isset($pendaftar->pendidikan_ibu) @if(old('pendidikan_ibu'))
                                                            {{ old('pendidikan_ibu') == 'S2' ? 'selected' : '' }}
                                                            @else
                                                            {{ $pendaftar->pendidikan_ibu == 'S2' ? 'selected' : '' }}
                                                            @endif
                                                            @else
                                                            {{ old('pendidikan_ibu') == 'S2' ? 'selected' : '' }}
                                                            @endisset
                                                            value="S2">
                                                            S2
                                                        </option>
                                                    </select>
                                                    @error('pendidikan_ibu')
                                                    <div class="help-block">
                                                        <ul role="alert">
                                                            <li>{{ $message }}</li>
                                                        </ul>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group  @error('pekerjaan_ibu') error @enderror">
                                                    <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control">
                                                        <option value="">Pekerjaan ibu</option>
                                                        @foreach ($pekerjaan as $p)
                                                        <option @isset($pendaftar->pekerjaan_ibu) @if(old('pekerjaan_ibu'))
                                                            {{ old('pekerjaan_ibu') == $p->id ? 'selected' : '' }} @else
                                                            {{ $pendaftar->pekerjaan_ibu == $p->id ? 'selected' : '' }}
                                                            @endif @else
                                                            {{ old('pekerjaan_ibu') == $p->id ? 'selected' : '' }}
                                                            @endisset {{ old('pekerjaan_ibu') == $p->id ? 'selected' :
                                                            '' }} value="{{ $p->id }}">
                                                            {{ $p->nama_pekerjaan }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_propinsi')
                                                    <div class="help-block">
                                                        <ul role="alert">
                                                            <li>{{ $message }}</li>
                                                        </ul>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1 btn-block">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('myscript')
<script>
    $(function() {

        function loadkota() {
            var id_propinsi = $("#id_propinsi").val();
            var id_kota = "{{ $pendaftar->id_kota }}";
            //alert(id_kota);
            $.ajax({
                type: 'POST'
                , url: '/loaddata/getkota'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , id_propinsi: id_propinsi
                    , id_kota: id_kota
                }
                , cache: false
                , success: function(respond) {
                    $("#id_kota").html(respond);
                }
            });
        }

        $("#id_propinsi").change(function() {
            loadkota();
        });

        function loadkecamatan() {
            var kota = $("#id_kota").val();
            var id_kota = "";
            if (kota == "") {
                id_kota = "{{ $pendaftar->id_kota }}";
            } else {
                id_kota = kota
            }
            var id_kecamatan = "{{ $pendaftar->id_kecamatan }}";
            //alert(id_kota);
            $.ajax({
                type: 'POST'
                , url: '/loaddata/getkecamatan'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , id_kota: id_kota
                    , id_kecamatan: id_kecamatan
                }
                , cache: false
                , success: function(respond) {
                    $("#id_kecamatan").html(respond);
                }
            });
        }

        function loadkelurahan() {
            var kecamatan = $("#id_kecamatan").val();
            var id_kecamatan = "";
            if (kecamatan == "") {
                id_kecamatan = "{{ $pendaftar->id_kecamatan }}";
            } else {
                id_kecamatan = kecamatan;
            }

            var id_kelurahan = "{{ $pendaftar->id_kelurahan }}";
            $.ajax({
                type: 'POST'
                , url: '/loaddata/getkelurahan'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , id_kecamatan: id_kecamatan
                    , id_kelurahan: id_kelurahan
                }
                , cache: false
                , success: function(respond) {
                    $("#id_kelurahan").html(respond);
                }
            });
        }

        $("#id_kota").change(function() {
            loadkecamatan();
        });
        loadkota();
        loadkecamatan();
        loadkelurahan();
        $("#id_kecamatan").change(function() {
            loadkelurahan();
        });
    });

</script>
@endpush
