@extends('front.master.master')


@section('title')
Narsingdi Model College
@endsection



@section('body')
<!-- ======= Header ======= -->

  @include('front.include.header')
  <!-- End Header -->
 <!-- ======= Hero Section ======= -->

 @include('front.include.banner')
  <!-- End Hero -->

  <main id="main">

   

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
         
          <div class="col-lg-12 pt-4 pt-lg-0">
            <p>
             An Ideal of Education In the Heart of the City, College Code: 3013
EIIN No: 112716</p>
<p>
Crowned with the Glorious 7th Place in Dhaka Board in the H.S.C Exam 2008
An Ideal Institution Free From Smoking, Politics and Unfairmeans
            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>Speech Of<strong> Principal</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>

              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>

              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>

              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>

            

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("public/front/img/pp.jpg");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


     <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>News</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="{{ asset('/') }}public/front/img/new.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
              
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="{{ asset('/') }}public/front/img/new.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
               
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
              
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="{{ asset('/') }}public/front/img/new.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
               
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="{{ asset('/') }}public/front/img/new.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
               
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->


  

    
   

    <!-- ======= Team Section ======= -->
    <section id="team" class="team " style="background-color:#2B527E;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="color:white;">Notice Board</h2>
          <p style="color:white;">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
       
              <div class="member-info">
                <h4>Walter White</h4>
              
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                 
                  <a href=""><i class="ri-facebook-fill"></i></a>
               
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
             
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
             
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                <div class="social">
                 
                  <a href=""><i class="ri-facebook-fill"></i></a>
                
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
             
              <div class="member-info">
                <h4>William Anderson</h4>
                
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                 
                  <a href=""><i class="ri-facebook-fill"></i></a>
                 
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
        
              <div class="member-info">
                <h4>Amanda Jepson</h4>
              
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                 
                  <a href=""><i class="ri-facebook-fill"></i></a>
                 
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="background-color: #f3f5fa;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
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

  </main>

@endsection
