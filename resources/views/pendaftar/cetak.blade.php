<style>
    @page {
        margin: 20px 20px 10px 30px !important;
        padding: 0px 0px 0px 0px !important;
    }

    .judul {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 16px;
        text-align: center;
    }

    .huruf {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .ukuranhuruf {
        font-size: 12px;
    }

    .datatable3 {
        border: 2px solid #D6DDE6;
        border-collapse: collapse;
        /* font-size: 10px; */
        /*float:left; */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        width: 100%;


    }

    .datatable3 td {
        border: 1px solid #000000;
        padding: 6px;
        font-size: 10px;

    }


    .datatable3 th {
        border: 1px solid #000000;
        font-weight: bold;
        padding: 4px;
        text-align: center;
        font-size: 12px;
        background-color: green;
        color: white;
    }

    hr.style2 {
        border-top: 3px double #8c8b8b;
    }

</style>
<table style="width:100%">
    <tr>
        <td style="width:10%">
            <img src="{{ URL::to('/')}}/app-assets/images/logo/logopesantren.png" alt="" width="80px" height="80px">
        </td>
        <td style="text-align: center">
            <h1 class="judul">
                PANITIA PENERIMAAN SANTRI BARU ( PSB )<br>
                PESANTREN PERSATUAN ISLAM AL AMIN SINDANGKASIH<br>
                TINGKAT {{ $pendaftar->jenjang }} TAHUN AJARAN 2022/2023
            </h1>
            <span style="font-style:italic">
                Jln. Raya Ancol No. 27 Ancol I Sindangkasih Telp.-Fax. (0265) 325285 Ciamis 46268
                <br>
                e-mail : peris.alamin80sinkas@gmail.com - web : persisalamin.com
            </span>
        </td>
        <td style="width:10%"></td>
    </tr>
</table>
<hr class="style2">
<table style="width: 100%" border="">
    <tr>
        <td style="text-align: right">Nomor Pendaftaran : {{ $pendaftar->no_pendaftaran }}</td>
    </tr>
    <tr>
        <td style="text-align: center">
            <h1 class="judul">FORMULIR PENDAFTARAN</h1>
        </td>
    </tr>
</table>
<table style="width:70%" class="huruf ukuranhuruf">
    <tr>
        <td colspan="3">
            <b style="font-size:14px;">A. DATA PESERTA DIDIK</b>
        </td>
    </tr>
    <tr>
        <td>1. NISN</td>
        <td>:</td>
        <td>{{ $pendaftar->nisn }}</td>
    </tr>
    <tr>
        <td>2. Nama Lengkap</td>
        <td>:</td>
        <td>{{ $pendaftar->nama_lengkap }}</td>
    </tr>
    <tr>
        <td>3. Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $pendaftar->tempat_lahir }} / {{ date("d M Y",strtotime($pendaftar->tanggal_lahir)) }}</td>
    </tr>
    <tr>
        <td>4. Jenis Kelamin</td>
        <td>:</td>
        <td>{{ ($pendaftar->jenis_kelamin=="L" ? "Laki-Laki":"Perempuan") }}</td>
    </tr>
    <tr>
        <td>5. Anak Ke</td>
        <td>:</td>
        <td>{{ $pendaftar->anak_ke }}</td>
    </tr>
    <tr>
        <td>6. Jumlah Saudara</td>
        <td>:</td>
        <td>{{ $pendaftar->jml_saudara }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="3">
            <b style="font-size:14px;">B. ALAMAT</b>
        </td>
    </tr>
    <tr>
        <td>1. Kp/Jalan</td>
        <td>:</td>
        <td>{{ $pendaftar->alamat }}</td>
    </tr>
    <tr>
        <td>2. Kelurahan</td>
        <td>:</td>
        <td>{{ $pendaftar->vill_name }}</td>
    </tr>
    <tr>
        <td>3. Kecamatan</td>
        <td>:</td>
        <td>{{ $pendaftar->dist_name }}</td>
    </tr>
    <tr>
        <td>4. Kota</td>
        <td>:</td>
        <td>{{ $pendaftar->regc_name }}</td>
    </tr>
    <tr>
        <td>5. Propinsi</td>
        <td>:</td>
        <td>{{ $pendaftar->prov_name }}</td>
    </tr>
    <tr>
        <td>6. No. HP</td>
        <td>:</td>
        <td>{{ $pendaftar->no_hp }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="3">
            <b style="font-size:14px;">C. INFORMASI ORANGTUA</b>
        </td>
    </tr>
    <tr>
        <td>1. NIK. Ayah</td>
        <td>:</td>
        <td>{{ $pendaftar->nik_ayah }}</td>
    </tr>
    <tr>
        <td>2. Nama Ayah</td>
        <td>:</td>
        <td>{{ $pendaftar->nama_ayah }}</td>
    </tr>
    <tr>
        <td>3. Pendidikan Ayah</td>
        <td>:</td>
        <td>{{ $pendaftar->pendidikan_ayah }}</td>
    </tr>
    <tr>
        <td>4. Pekerjaan Ayah</td>
        <td>:</td>
        <td>{{ $pendaftar->pekerjaan_ayah }}</td>
    </tr>
    <tr>
        <td>5. NIK. Ibu</td>
        <td>:</td>
        <td>{{ $pendaftar->nik_ibu }}</td>
    </tr>
    <tr>
        <td>6. Nama Ibu</td>
        <td>:</td>
        <td>{{ $pendaftar->nama_ibu }}</td>
    </tr>
    <tr>
        <td>7. Pendidikan Ibu</td>
        <td>:</td>
        <td>{{ $pendaftar->nama_ibu }}</td>
    </tr>
    <tr>
        <td>8. Pekerjaan Ibu</td>
        <td>:</td>
        <td>{{ $pendaftar->pekerjaan_ibu }}</td>
    </tr>
</table>
<table style="width: 100%">
    <tr>
        <td align="right">
            <img src="data:image/png;base64, {!! $qrcode !!}" style="margin-right: 40px">
        </td>
    </tr>

</table>
