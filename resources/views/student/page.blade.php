<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Result information</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('/') }}public/admin/dist/logo.png" rel="shortcut icon" />
    <link rel="stylesheet" href="{{asset('/')}}public/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('/')}}public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/')}}public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('/')}}public/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/')}}public/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('/')}}public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/')}}public/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('/')}}public/admin/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('/')}}public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset('/')}}public/admin/simple-calendar.css">
    <!-- jQuery -->
    <script src="{{asset('/')}}public/admin/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('/')}}public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />

</head>
<style>
#hello{
margin-left: 0;
}
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('/') }}public/front/img/logo.png" style="height: 226px;margin-top: 32px;margin-left:97px">
            </div>
            <div class="col-md-8 mt-3">
                <center>
                    <h6><b>College Code:3032 </b><b style="margin-left:57%;">EIIN: 136842</b></h6>
                    <h2 style="color:#274B2E;"><b>নরসিংদী পাবলিক কলেজ</b></h2>
                    <h6><b> ২১৭/৩, পশ্চিম ব্রাহ্মন্দী, নরসিংদী ।</b></h6>
                    <h6><b> অফিস: 0294-52706,01309-136842 </b></h6>
                    <h6><b>E-mail: narsingdipubliccollege@gmail.com</b></h6>

                    <style>
                        b.division-group:before {
                            content: "";
                            display: inline-block;
                            background: red;
                            width: 15px;
                            height: 15px;
                            margin-right: 5px;
                        }

                        b#divisionScience {
                            margin-right: -32px;
                        }

                        b#divisionBusiness {
                            margin-right: -30px;
                            margin-left: 50px;
                        }

                        b#divisionHumanities {
                            margin-left: 50px;
                        }
                    </style>

                    <h6>
                        <b class="division-group" id="divisionScience">বিজ্ঞান</b>
                        <b class="division-group" id="divisionBusiness"> ব্যবসায় শিক্ষা</b>
                        <b class="division-group" id="divisionHumanities"> মানবিক</b>
                    </h6>
                </center>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <hr><br>
    <div class="content-wrapper" id="hello">
        <section class="content">
            <div class="row">
                @foreach($newExams1 as $newexam)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header bg-olive">
                            <h3 class="card-title">{{ $newexam->exam_name }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-footer bg-navy">
                            <a href="{{ route('student.result_print',['eid'=>$newexam->id,'sid'=>$students->id]) }}" type="button" class="btn  bg-navy color-palette text-light"><i class="fas fa-clipboard-list"></i><span style="padding-left:3px;">View Result</span></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                @endforeach
            </div>
        </section>
    </div>
</body>

</html>
