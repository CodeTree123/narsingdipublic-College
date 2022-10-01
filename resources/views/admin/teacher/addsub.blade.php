@extends('admin.master.master')

@section('title')
Subject Info | College
@endsection


@section('body')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subject Info</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Subject Info</li>
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
              <h3 class="card-title">Add Subject Info Of <span class="badge badge-success">{{ $desi_Name }} {{ $teacher_Name }}</span></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('admin.teacher.infostore') }}" id="form_validation" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="form-group">
                     
                <div class="form-group">
                        <label>Semester Name</label>
                        <select class="form-control" name="semester_id" >
                          @foreach($categories1 as $category)
                          <option value="{{ $category->id }}">{{ $category->semestername }}</option>
                          @endforeach
                      </select>
                       <input type="hidden" class="form-control" value="{{ $teacher_ID }}" name="user_id" id="exampleInputEmail1" placeholder="Enter Name">
                      </div>
                 

                      <div class="form-group">
                        <label>Department Name</label>
                        <select class="form-control" name="department_id" id="prod_cat_id">
                          @foreach($categories2 as $category)
                          <option value="{{ $category->id }}">{{ $category->department_name }}</option>
                          @endforeach
                      </select>
                      </div>
                      <div class="form-group" id="subcategory">
                        <label>Subject Name</label>
                        <select class="form-control productname" name="subject_id">
                          <option value="0" disabled="true" selected="true">Select Subject</option>
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

                     

              
                  <button type="submit" class="btn btn-success">Add</button>
                   <a href="{{ route('admin.teacher') }}" type="button" class="btn btn-danger">Cancel</a>
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


             var op=`<label>Subject Name</label>
                        <select class="form-control productname" name="subject_id">`;

             $.ajax({
                type:'get',
                url:'{!!URL::to('findProductNamenew')!!}',
                data:{'id':cat_id},
               success:function(data){

                  //console.log('success');

                    //console.log(data);

                    //console.log(data.length);

                   // op+='<option value="0" selected disabled>choose sub-category</option>';
                    for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].subject_name+'</option>';
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
