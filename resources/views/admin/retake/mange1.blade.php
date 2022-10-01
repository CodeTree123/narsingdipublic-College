@extends('admin.master.master')

@section('title')
Retake Result Information | College
@endsection


@section('body')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-7">
            <h6>Retake Result Information<b class="badge badge-success"></b></h6>
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Retake Result Information </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
   
    <section class="content-header">
      <div class="card">
        <div class="card-header bg-olive">
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
                        <select class="form-control" name="d_id" >
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
                   <div class="form-group" id="subcategory">
                        <label style="color:white;">Subject Name</label>
                        <select class="form-control " name="sub_id">
                           @foreach($subjects1 as $category1)
                           <option value="{{ $category1->id }}">{{ $category1->subject_name }}</option>
                        @endforeach
                            
                      </select>
                      </div>
                  </div>

                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary" style="margin-top: 30px;font-size: 15px;">Add</button>
                  </div>
               
                </div>
                </form>
      </div><!-- /.container-fluid -->
        </div>
      </div>
     
    </section>

     <section class="content-header">
      <div class="card">
        <div class="card-header" style="background: linear-gradient(45deg,#00897B,#0081bf);">
           <div class="container-fluid">
        <form method="GET" action="{{ route('admin.addSub.searchr') }}">
        <div class="row mb-2">
      
                  <div class="col-md-2">
                   <div class="form-group">
                        <label style="color:white;">Semester Name</label>
                        <select class="form-control" name="s_id">
                           @foreach($categories1 as $category1)
                           <option value="{{ $category1->id }}">{{ $category1->semestername }}</option>
                        @endforeach
                            
                      </select>
                      </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label style="color:white;">Department Name</label>
                        <select class="form-control" name="d_id" >
                           @foreach($categories2 as $category1)
                           <option value="{{ $category1->id }}">{{ $category1->department_name }}</option>
                        @endforeach
                            
                      </select>
                      </div>
                  </div>
                  <div class="col-md-2">
                   <div class="form-group">
                        <label style="color:white;">Section Name</label>
                        <select class="form-control" name="se_id">
                           @foreach($categories3 as $category1)
                           <option value="{{ $category1->id }}">{{ $category1->section_name }}</option>
                        @endforeach
                            
                      </select>
                      </div>
                  </div>
                  <div class="col-md-2">
                   <div class="form-group" id="subcategory">
                        <label style="color:white;">Subject Name</label>
                        <select class="form-control " name="sub_id">
                           @foreach($subjects1 as $category1)
                           <option value="{{ $category1->id }}">{{ $category1->subject_name }}</option>
                        @endforeach
                            
                      </select>
                      </div>
                  </div>
                 <div class="col-md-2">
                   <div class="form-group">
                        <label style="color:white;">Exam Name</label>
                        <select class="form-control" name="exam_name">
                           
                         @foreach($newExams12 as $category)
                          <option value="{{$category->exam_name}}">{{$category->exam_name}}</option>
                         
                         @endforeach
                          
                      </select>
                      </div>
                  </div>

                  <div class="col-md-2">
                    <button type="submit" class="btn btn-light" style="margin-top: 30px;font-size: 15px;">Search</button>
                  </div>
               
                </div>
                </form>
      </div><!-- /.container-fluid -->
        </div>
      </div>
     
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
 <div class="card">
            <div class="card-header">
              <a href="{{route('admin.retake.vv')}}" class="btn bg-olive">view retake-result</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
            
            </div>
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