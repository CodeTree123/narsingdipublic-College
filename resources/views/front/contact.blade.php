@extends('front.master.master')


@section('title')
Contact
@endsection



@section('body')

@include('front.include.menuheader')

<br><br><br>
  <main id="main">
<!-- ======= About Us Section ======= -->
       <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="background-color: #f3f5fa;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
         
        </div>

        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Narsingdi</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>nmc112716@gmail.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+8801309-112716</p>
              </div>

             
            </div>

          </div>

          

        </div>

      </div>
    </section><!-- End Contact Section -->


  </main><!-- End #main -->
@endsection