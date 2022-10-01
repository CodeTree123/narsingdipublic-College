@extends('admin.master.master')

@section('title')
Retake Result  Information | College
@endsection


@section('body')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-7">
            <h6>Retake Result  Information of <b class="badge badge-success">{{ $tSemesterName }}</b> <b class="badge badge-success">{{ $tDepartmentName }}</b> <b class="badge badge-success">{{ $tSectionName }}</b>
            <b class="badge badge-success">{{ $tExamName }}</b><b class="badge badge-success">{{ $tSubjectName }}</b></h6>
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Retake Result  Information </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
   
    <section class="content-header">
      <div class="container-fluid">
         <form method="GET" action="{{ route('admin.addResult.searchr') }}">
        <div class="row mb-2">
      
                  <div class="col-md-2">
                   <div class="form-group">
                        <label>Semester Name</label>
                        <select class="form-control" name="s_id">
                           @foreach($categories1 as $category1)
                           <option value="{{ $category1->id }}">{{ $category1->semestername }}</option>
                        @endforeach
                            
                      </select>
                      </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label>Department Name</label>
                        <select class="form-control" name="d_id" id="prod_cat_id12">
                           @foreach($categories2 as $category1)
                           <option value="{{ $category1->id }}">{{ $category1->department_name }}</option>
                        @endforeach
                            
                      </select>
                      </div>
                  </div>
                  <div class="col-md-2">
                   <div class="form-group">
                        <label>Section Name</label>
                        <select class="form-control" name="se_id">
                           @foreach($categories3 as $category1)
                           <option value="{{ $category1->id }}">{{ $category1->section_name }}</option>
                        @endforeach
                            
                      </select>
                      </div>
                  </div>
                 <div class="col-md-2">
                   <div class="form-group">
                        <label>Exam Name</label>
                        <select class="form-control" name="exam_name">
                    @foreach($newExams12 as $category)
                          <option value="{{$category->exam_name}}">{{$category->exam_name}}</option>
                         
                         @endforeach
                         
                          
                      </select>
                      </div>
                  </div>
                  <div class="col-md-2">
                   <div class="form-group" id="subcategory1">
                        <label style="color:white;">Subject Name</label>
                        <select class="form-control productname1" name="sub_id">
                          <option value="0" disabled="true" selected="true">Select Subject</option>
                            
                      </select>
                      </div>
                  </div>

                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary" style="margin-top: 30px;font-size: 15px;">Add</button>
                  </div>
               
                </div>
                </form>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
 <div class="card">
            <div class="card-header">
              <h3 class="card-title">Add Retake Result Information List</h3>
              @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('admin.retake.store') }}" id="form_validation" method="POST" enctype="multipart/form-data">
                @csrf
               
                     
                  <div class="form-group">
                    
                     <input type="hidden" class="form-control" value="{{ $exName }}"  name="exam_name" id="exampleInputEmail1" placeholder="Enter Name" >
                    <input type="hidden" class="form-control" value="{{ $semester }}" name="semester_id" id="exampleInputEmail1" placeholder="Enter Name">
                    
                    <input type="hidden" class="form-control" value="{{ $department }}" name="department_id" id="exampleInputEmail1" placeholder="Enter Name">
                    <input type="hidden" class="form-control" value="{{ $section }}" name="section_id" id="exampleInputEmail1" placeholder="Enter Name">
                    <input type="hidden" class="form-control" value="{{ $section12 }}" name="subject_id" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>

                  


                  <div class="form-group" id="subcategory">
                  <label for="exampleInputEmail1">Roll</label>
                    <input type="number" class="form-control" name="roll"  placeholder="Enter Roll">
                  
                  </div>
                  <div id="country_list"></div>   
                  <div class="form-group">
                    <label for="exampleInputEmail1">Written Exam</label>
                    <input type="number" class="form-control" name="written_exam" id="exampleInputEmail1" placeholder="Enter Mark">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mcq Exam</label>
                    <input type="number" class="form-control" name="mcq_exam" id="exampleInputEmail1" placeholder="Enter Mark">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Failed Subject Name</label>
                    <input type="number" class="form-control" name="fail_status" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Total Failed Subject </label>
                    <input type="number" class="form-control" name="fail_sub" id="exampleInputEmail1" placeholder="Enter Number">
                  </div>

                  
              
                  <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1">Active</option>
                          <option value="0">Inctive</option>
                      </select>
                      </div>
                  <button type="submit" class="btn btn-success">Add</button>
                   <a href="{{ route('admin.result') }}" type="button" class="btn btn-danger">Cancel</a>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
      </div>
    </section>
 </div>
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function () {
             
                $('#roll').on('keyup',function() {
                    var query = $(this).val(); 
                    $.ajax({
                       
                        url:"{{ route('admin.result.cross-check') }}",
                  
                        type:"GET",
                       
                        data:{'roll':query},
                       
                        success:function (data) {
                          
                            $('#country_list').html(data);
                        }
                    })
                    // end of ajax call
                });

                
                $(document).on('click', 'li', function(){
                  
                    var value = $(this).text();
                    $('#roll').val(value);
                    $('#country_list').html("");
                });
            });
        </script>

 <script type="text/javascript">

    $(document).ready(function(){

        $('#prod_cat_id12').on('change',function(){
            //console.log("hmm its change");

            var cat_id=$(this).val();
             //console.log(cat_id);
             var div=$(this).parent();


             var op=`<label style="color:white;">Subject Name</label>
                        <select class="form-control productname1" name="sub_id">`;

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

                 $('#subcategory1').html(op);
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

        $('#prod_cat_id').on('change',function(){
            //console.log("hmm its change");

            var cat_id=$(this).val();
             //console.log(cat_id);
             var div=$(this).parent();


             var op=`<label style="color:white;">Subject Name</label>
                        <select class="form-control productname" name="sub_id">`;

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
        function deleteTag(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection