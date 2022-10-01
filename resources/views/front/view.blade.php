@extends('front.master.master')


@section('title')
Result
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
          <h2>View Result</h2>
         
        </div>

        <div class="row">

          <div class="col-lg-12 ">
          <!--  <form action="{{ route('viewresultr') }}" method="get"  >
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Roll Number</label>
                  <input type="text" name="name" class="form-control">
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                  <label>Exam Name</label>
                        <select class="form-control" name="exam_name">
                          @foreach($newExams12 as $category)
                          <option value="{{$category->exam_name}}">{{$category->exam_name}}</option>
                         
                         @endforeach 
                          
                      </select>
                  <div class="validate"></div>
                </div>
              </div>
             
              <div class="text-center"><button type="submit" class="btn btn-primary">View</button></div>
            </form>-->
          </div>

          

        </div>

      </div>
    </section><!-- End Contact Section -->


  </main><!-- End #main -->
@endsection