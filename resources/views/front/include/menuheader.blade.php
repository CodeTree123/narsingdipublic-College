<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

     <!--<h1 class="logo mr-auto"><a href="index.html"><img src=""></a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ route('index') }}" class="logo mr-auto"><img src="{{ asset('/') }}public/front/img/logo.png"  style="height: 400px;"></a>

      <nav class="nav-menu d-none d-lg-block">
       <ul>
          <li class="active"><a href="{{ route('index') }}">Home</a></li>
          <li><a href="{{ route('about') }}">About</a></li>
          <li><a href="{{ route('notice') }}">Notice</a></li>
          <li><a href="{{ route('admission') }}">Admission</a></li>
          <li><a href="{{ route('online-lecture') }}">Online Lecture</a></li>
          <li class="drop-down"><a href="">Login</a>
            <ul>
             
              
              <li><a href="{{ route('login') }}">Teacher Login</a></li>
              
            </ul>
          </li>
          <li><a href="{{ route('contact') }}">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

     

    </div>
  </header><!-- End Header -->