<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>College | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ asset('/') }}public/admin/dist/logo.png" rel="shortcut icon"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/') }}public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/') }}public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/') }}public/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background: linear-gradient(to right, rgb(179, 255, 171), rgb(197 255 18));" >
  <!--new frame -->
  <div class="container">
    <div class="row">
      <div class="col-md-6">
  <div class="login-logo">
     <img src="{{ asset('/') }}public/admin/dist/logo.png" alt="AdminLTE Logo" style="    position: relative;
    bottom: 18px;">
</div></div>
      <div class="col-md-6">
        <div class="login-box">

  <!-- /.login-logo -->
  <div class="card" style=" border-radius: 10px;" >
    <div class="card-body login-card-body" style="background-color: rgb(86 197 62 / 96%); border-radius: 10px;">
      <p class="login-box-msg" style="color:white;">Sign in to start your session</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email"  name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope" style="color:white;"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password"  name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock" style="color:white;"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember" style="color:white;">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-light btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


    </div>

  </div>
</div>
      </div>
    </div>
  </div>
  <!--new frame-->

<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/') }}public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}public/admin/dist/js/adminlte.min.js"></script>

</body>
</html>
