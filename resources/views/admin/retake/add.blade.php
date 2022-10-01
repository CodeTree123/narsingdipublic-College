@extends('admin.master.master')

@section('title')
ResultInfo | College
@endsection


@section('body')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h6 > <b class="badge badge-success">Section:</b> {{ $sectionName }}, <b class="badge badge-success">Department:</b> {{ $departmentName }}, <b class="badge badge-success">Semester:</b> {{ $semesterName }}</h6>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">ResultInfo</li>
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
              <h3 class="card-title">Add ResultInfo of <b>{{ $subjectName }}</b></h3>
              <center><a href="{{ route('admin.studentTermExam.add',['id'=>$sectionId ]) }}" type="button" class="btn btn-danger">Previous Page</a></center>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('admin.result.store') }}" id="form_validation" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="form-group">
                     
                  <div class="form-group">
                    <input type="hidden" class="form-control" value="{{ $subjectId }}" name="subject_id" id="exampleInputEmail1" placeholder="Enter Name">
                     <input type="hidden" class="form-control" value="{{ $examID }}" name="exam_id" id="exampleInputEmail1" placeholder="Enter Name">
                    <input type="hidden" class="form-control" value="{{ $semesterId }}" name="semester_id" id="exampleInputEmail1" placeholder="Enter Name">
                    
                    <input type="hidden" class="form-control" value="{{ $departmentId}}" name="department_id" id="exampleInputEmail1" placeholder="Enter Name">
                    <input type="hidden" class="form-control" value="{{ $sectionId }}" name="section_id" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>

                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Exam Name</label>
                    <input type="text" class="form-control" value="{{ $examName }}" name="exam_name" id="exampleInputEmail1" placeholder="Enter Phone">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Name</label>
                   <select class="form-control" name="student_id" id="prod_cat_id">
                   
                                        @foreach($students as $subject)
                  
                          <option value="{{ $subject->id }}">{{ $subject->student_name }}</option>
                    
                       @endforeach   
                      </select>
                  
                  </div>

                  <div class="form-group" id="subcategory">
                    <label for="exampleInputEmail1">Student Roll</label>
                   <select class="form-control productname" name="roll" >
                   
                   
                   
                         <option value="0" disabled="true" selected="true">Select Roll</option>
                      
                     
                          
                      </select>
                  
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Written Exam</label>
                    <input type="number" class="form-control" name="written_exam" id="exampleInputEmail1" placeholder="Enter Mark">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mcq Exam</label>
                    <input type="number" class="form-control" name="mcq_exam" id="exampleInputEmail1" placeholder="Enter Mark">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Practical Exam</label>
                    <input type="number" class="form-control" name="prac_exam" id="exampleInputEmail1" placeholder="Enter Mark">
                  </div>
<hr>
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Tutorial Exam</label>
                    <input type="number" class="form-control" value="0" name="f_tuto_exam" id="exampleInputEmail1" placeholder="Enter Mark">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Second Tutorial Exam</label>
                    <input type="number" class="form-control" value="0" name="s_tuto_exam" id="exampleInputEmail1" placeholder="Enter Mark">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Third Tutorial Exam</label>
                    <input type="number" class="form-control" value="0" name="t_tuto_exam" id="exampleInputEmail1" placeholder="Enter Mark">
                  </div>
                  <hr>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Viva</label>
                    <input type="number" class="form-control" name="viva" id="exampleInputEmail1" placeholder="Enter Mark">
                  </div>
<div class="form-group">
                    <label for="exampleInputEmail1">Behave</label>
                    <input type="number" class="form-control" name="behave" id="exampleInputEmail1" placeholder="Enter Mark">
                  </div>

                  
              
                  <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1">Active</option>
                          <option value="0">Inctive</option>
                      </select>
                      </div>
                  <button type="submit" class="btn btn-success">Add</button>
                   <a href="{{ route('admin.result',['id'=>$semesterId]) }}" type="button" class="btn btn-danger">Cancel</a>
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


             var op=` <label for="exampleInputEmail1">Student Roll</label>
                   <select class="form-control productname" name="roll" >`;

             $.ajax({
                type:'get',
                url:'{!!URL::to('findProductName3')!!}',
                data:{'id':cat_id},
               success:function(data){

                  //console.log('success');

                    //console.log(data);

                    //console.log(data.length);

                   // op+='<option value="0" selected disabled>choose sub-category</option>';
                    for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].student_roll+'">'+data[i].student_roll+'</option>';
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

            var cat_id=$(this).val();
             //console.log(cat_id);
             var div=$(this).parent();


             var op=`   <label for="exampleInputEmail1">Exam Name</label>
                   <select class="form-control productname1" name="exam_id" >`;

             $.ajax({
                type:'get',
                url:'{!!URL::to('findProductName4')!!}',
                data:{'id':cat_id},
               success:function(data){

                  //console.log('success');

                    //console.log(data);

                    //console.log(data.length);

                   // op+='<option value="0" selected disabled>choose sub-category</option>';
                    for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].exam_name+'</option>';
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
