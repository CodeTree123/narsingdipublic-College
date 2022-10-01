<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="An Ideal of Education In the Heart of the City
College Code: 3013
EIIN No: 112716" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('/') }}public/admin/dist/logo.png" rel="icon"/>
  <!-- <link href="{{ asset('/') }}public/front/img/logo.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/') }}public/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}public/front/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}public/front/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}public/front/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('/') }}public/front/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="{{ asset('/') }}public/front/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}public/front/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/') }}public/front/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  <!-- =======================================================
  * Template Name: Arsha - v2.2.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  

 <!-- End #main -->
@yield('body')
  <!-- ======= Footer ======= -->
  @include('front.include.footer')
  <!-- End Footer -->

  <!--<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>-->

  <!-- Vendor JS Files -->
  <script src="{{ asset('/') }}public/front/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('/') }}public/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/') }}public/front/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="{{ asset('/') }}public/front/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('/') }}public/front/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="{{ asset('/') }}public/front/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('/') }}public/front/vendor/venobox/venobox.min.js"></script>
  <script src="{{ asset('/') }}public/front/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="{{ asset('/') }}public/front/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/') }}public/front/js/main.js"></script>
   <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
           <script>
    @if($errors->any())
        @foreach($errors->all() as $error)
              toastr.error('{{ $error }}','Error',{
                  closeButton:true,
                  progressBar:true,
               });
        @endforeach
    @endif
</script>

</body>

</html>