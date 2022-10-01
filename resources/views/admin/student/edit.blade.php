@extends('admin.master.master')

@section('title')
StudentInfo | College
@endsection


@section('body')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>StudentInfo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">StudentInfo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <section class="content">
      <div class="row">
        <div class="col-12">
 <div class="card">
            <div class="card-header">
              <h3 class="card-title">Update Student Info</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('admin.student.update') }}" id="form_validation" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="form-group">
                        <label>Semester Name</label>
                        <select class="form-control" name="semester_id" id="prod_cat_id">
                          @foreach($categories1 as $category)
                          <option value="{{ $category->id }}" {{ $category4->semester_id == $category->id ? 'selected' : '' }}>{{ $category->semestername }}</option>
                          @endforeach
                      </select>
                       
                      </div>
                     
                     <div class="form-group">
                        <label>Department Name</label>
                        <select class="form-control" name="department_id">
                          @foreach($categories2 as $category)
                          <option value="{{ $category->id }}" {{ $category4->department_id == $category->id ? 'selected' : '' }}>{{ $category->department_name }}</option>
                          @endforeach
                      </select>
                      </div>

                      <div class="form-group">
                        <label>Section Name</label>
                        <select class="form-control" name="section_id">
                          @foreach($categories3 as $category)
                          <option value="{{ $category->id }}" {{ $category4->section_id == $category->id ? 'selected' : '' }}>{{ $category->section_name }}</option>
                          @endforeach
                      </select>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Name</label>
                    <input type="text" class="form-control" name="student_name" value="{{ $category4->student_name }}" id="exampleInputEmail1" placeholder="Enter Name">

                    <input type="text" class="form-control" name="id" value="{{ $category4->id }}" id="exampleInputEmail1" placeholder="Enter Name">
                   
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Date Of Birth</label>
                    <input type="date" class="form-control" name="student_dob" id="exampleInputEmail1" placeholder="Enter date" value="{{ $category4->student_dob }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Phone</label>
                    <input type="text" class="form-control" name="student_phone" id="exampleInputEmail1" placeholder="Enter Phone" value="{{ $category4->student_phone }}" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Email</label>
                    <input type="text" class="form-control" name="student_email" id="exampleInputEmail1" placeholder="Enter Email" value="{{ $category4->student_email }}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Roll</label>
                    <input type="text" class="form-control" name="student_roll" id="exampleInputEmail1" placeholder="Enter Roll" value="{{ $category4->student_roll }}" >
                  </div>
                  <div class="form-group">
                        <label>Student Address</label>
                      <textarea class="textarea" name="student_address" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $category4->student_address }}</textarea>
                      </div>
                               <div class="form-group">
    <label for="exampleFormControlFile1">Student Image</label>
    <input type="file" class="form-control-file" name="student_image" id="exampleFormControlFile1">
    <img src="{{asset('/')}}{{$category4->student_image}}" width="50px" height="50px">
  </div>
                  <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1" {{ $category4->status == 1 ? 'selected' : '' }}>Active</option>
                          <option value="0" {{ $category4->status == 0 ? 'selected' : '' }}>Inctive</option>
                      </select>
                      </div>
                  <button type="submit" class="btn btn-success">Update</button>
                   <a href="{{ route('admin.student') }}" type="button" class="btn btn-danger">Cancel</a>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
      </div>
    </section>
 </div>
 <script type="text/javascript">

    $(document).ready(function(){

        $('#prod_cat_id').on('change',function(){
            //console.log("hmm its change");

            var cat_id=$(this).val();
             //console.log(cat_id);
             var div=$(this).parent();


             var op=` <label>Department Name</label><select class="form-control productname" name="department_id" id="prod_cat_id1">`;

             $.ajax({
                type:'get',
                url:'{!!URL::to('findProductName')!!}',
                data:{'id':cat_id},
               success:function(data){

                  //console.log('success');

                    //console.log(data);

                    //console.log(data.length);

                   // op+='<option value="0" selected disabled>choose sub-category</option>';
                    for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].department_name+'</option>';
                   }
                  // console.log(op)

                  op+= `</select>`

                 $('#subcategory').html(op);
                  // div.find('#subcategory').append(op);


               },
               error:function(){

                }

             });

        });
    });
   
</script>
<script type="text/javascript">

    $(document).ready(function(){

        $('#prod_cat_id1').on('change',function(){
            //console.log("hmm its change");

            var cat_id1=$(this).val();
             //console.log(cat_id);
             var div=$(this).parent();


             var op=` <label>Section Name</label><select class="form-control productname1" name="section_id">`;

             $.ajax({
                type:'get',
                url:'{!!URL::to('findProductName1')!!}',
                data:{'id':cat_id1},
               success:function(data){

                  //console.log('success');

                    //console.log(data);

                    //console.log(data.length);

                   // op+='<option value="0" selected disabled>choose sub-category</option>';
                    for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].section_name+'</option>';
                   }
                  // console.log(op)

                  op+= `</select>`

                 $('#subcategory1').html(op);
                  // div.find('#subcategory').append(op);


               },
               error:function(){

                }

             });

        });
    });
   
</script>
@endsection
