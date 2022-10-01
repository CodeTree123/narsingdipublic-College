@extends('front.master.master')


@section('title')
Form
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
          <h2>Student Info Form</h2>
         
        </div>

        <div class="row">

          <div class="col-lg-12 ">
            <form action="{{ route('studentstore') }}" id="form_validation" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="form-group">
                        <label>Semester Name</label>
                        <select class="form-control" name="semester_id" id="prod_cat_id">
                          @foreach($categories1 as $category)
                          <option value="{{ $category->id }}">{{ $category->semestername }}</option>
                          @endforeach
                      </select>
                       
                      </div>
                     
                     <div class="form-group">
                        <label>Department Name</label>
                        <select class="form-control" name="department_id">
                          @foreach($categories2 as $category)
                          <option value="{{ $category->id }}">{{ $category->department_name }}</option>
                          @endforeach
                      </select>
                      </div>

                      <div class="form-group">
                        <label>Section Name</label>
                        <select class="form-control" name="section_id">
                          @foreach($categories3 as $category)
                          <option value="{{ $category->id }}">{{ $category->section_name }}</option>
                          @endforeach
                      </select>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Name</label>
                    <input type="text" class="form-control" name="student_name" id="exampleInputEmail1" placeholder="Enter Name">
                   
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Date Of Birth</label>
                    <input type="date" class="form-control" name="student_dob" id="exampleInputEmail1" placeholder="Enter date">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Phone</label>
                    <input type="text" class="form-control" name="student_phone" id="exampleInputEmail1" placeholder="Enter Phone">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Email</label>
                    <input type="text" class="form-control" name="student_email" id="exampleInputEmail1" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Roll</label>
                    <input type="text" class="form-control" name="student_roll" id="exampleInputEmail1" placeholder="Enter Roll">
                  </div>
                  <div class="form-group">
                        <label>Student Address</label>
                      <textarea class="textarea" name="student_address" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                               <div class="form-group">
    <label for="exampleFormControlFile1">Student Image</label>
    <input type="file" class="form-control-file" name="student_image" id="exampleFormControlFile1">
  </div>
                  <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1">Active</option>
                          <option value="0">Inctive</option>
                      </select>
                      </div>
                  <button type="submit" class="btn btn-success">Add</button>
                   <a href="{{ route('index') }}" type="button" class="btn btn-danger">Cancel</a>
              </form>

          </div>

          

        </div>

      </div>
    </section><!-- End Contact Section -->


  </main><!-- End #main -->
@endsection