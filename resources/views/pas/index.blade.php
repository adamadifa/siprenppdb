<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Download Sertifikat PAS Got Talent</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/authentication.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->
    <style>
        body {
            font-family: 'Poppins' !important;
            background-color: #1e634a !important;
        }

    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

    <div class="row" style="margin-top:20px; margin-left:10px; margin-right:10px">
        <div class="col-12 text-center">
            <img src="{{ asset('assets/logopas2.png') }}" class="img-fluid" alt="" width="400px" height="300px">
        </div>
    </div>
    <div class="row" class="mt-3" style="margin-left:2px; margin-right:2px">
        <div class="col-12">
            <form action="/pas" method="GET" autocomplete="off">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama_peserta" placeholder="Cari Nama Peserta" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning w-100"><i class="feather icon-search"></i> Cari Peserta</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row" class="mt-3" style="margin-left:2px; margin-right:2px">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No. Peserta</th>
                                    <th>Nama Peserta</th>
                                    <th>Asal sekolah</th>
                                    <th>Seftikat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peserta as $d)
                                <tr>
                                    <td>{{ $d->no_peserta }}</td>
                                    <td>{{ $d->nama_peserta }}</td>
                                    <td>{{ $d->asal_sekolah }}</td>
                                    <td>
                                        <a href="#" no_peserta="{{ $d->no_peserta }}" file="{{ $d->file }}" class="btn btn-sm btn-primary download"><i class="feather icon-download mr-1"></i>Download</a>
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
    <div class="modal fade text-left" id="mdldownload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel18">Download Sertifikat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="no_peserta">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="kritiksaran" id="kritiksaran" cols="30" rows="10" class="form-control" placeholder="Kritik dan Saran"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <a href="#" id="downloadsertifikat" class="btn btn-success w-100" target="_blank"><i class="feather icon-download mr-1"></i> Download Sertifikat Peserta </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: Vendor JS-->

    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.j')}}s"></script>
    <script src="{{asset('app-assets/js/scripts/components.js')}}"></script>
    <script>
        $(function() {
            $(".download").click(function(e) {
                e.preventDefault();
                var file = $(this).attr('file');
                var no_peserta = $(this).attr('no_peserta');
                $("#no_peserta").val(no_peserta);
                var link = "{{ asset('assets/sertifikat/')}}/" + file + ".pdf";
                //alert(link);
                $("#downloadsertifikat").attr('href', link);
                $("#mdldownload").modal("show");
            });

            $("#downloadsertifikat").click(function(e) {
                e.preventDefault();
                var no_peserta = $("#no_peserta").val();
                var kritiksaran = $("#kritiksaran").val();
                var href = $(this).attr('href');
                if (kritiksaran == "") {
                    alert('Silahkan Isi Kritik & Saran Terlebih Dahulu, Agar Kegiatan Ini Kedepannya Bisa Lebih Baik ^_^')
                    $("#kritiksaran").focus();
                } else {
                    $.ajax({
                        type: 'POST'
                        , url: '/storekritiksaran'
                        , data: {
                            _token: "{{ csrf_token() }}"
                            , no_peserta: no_peserta
                            , kritiksaran: kritiksaran
                        }
                        , cache: false
                        , success: function(respond) {
                            if (respond == 0) {
                                window.open(href, '_blank');
                            } else {
                                alert('error');
                            }
                        }
                    });
                }


            });

        });

    </script>
    <!-- END: Theme JS-->
</body>
</html>
