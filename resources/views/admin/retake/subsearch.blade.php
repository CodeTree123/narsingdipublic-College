@extends('admin.master.master')

@section('title')
Result Information | College
@endsection


@section('body')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-7">
            <h6>Result Information <b class="badge badge-success"></b></h6>
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Result Information </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
   
 

     <section class="content-header">
      <div class="card">
        <div class="card-header" style="background: linear-gradient(45deg,#00897B,#0081bf);">
           <div class="container-fluid">
         <form method="GET" action="{{ route('admin.addSub.search') }}">
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
                        <select class="form-control" name="d_id" id="prod_cat_id">
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
                        <select class="form-control productname" name="sub_id">
                          <option value="0" disabled="true" selected="true">Select Subject</option>
                            
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
           <div class="col-md-3">
      <div class="card">
        <div class="card-header" style="background: linear-gradient(45deg,#00897B,#0081bf);">
          <p class="text-center" style="color:white;font-size: 20px;">Semester Name</p><hr style="background:white;">
            <p class="text-center" style="color:white;font-size: 20px;">{{ $tSemesterName }}</p>
        </div>
      </div>
    </div>
     <div class="col-md-3">
      <div class="card">
        <div class="card-header" style="background: linear-gradient(45deg,#00897B,#0081bf);">
           <p class="text-center" style="color:white;font-size: 20px;">Department Name</p><hr style="background:white;">
           <p class="text-center" style="color:white;font-size: 20px;">{{ $tDepartmentName}}</p>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card">
        <div class="card-header" style="background: linear-gradient(45deg,#00897B,#0081bf);">
           <p class="text-center" style="color:white;font-size: 20px;">Section Name</p><hr style="background:white;">
<p class="text-center" style="color:white;font-size: 20px;">{{ $tSectionName }} </p>       </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card">
        <div class="card-header" style="background: linear-gradient(45deg,#00897B,#0081bf);">
           <p class="text-center" style="color:white;font-size: 20px;">Subject Name</p><hr style="background:white;">
           <p class="text-center" style="color:white;font-size: 20px;">{{ $tSubjectName }} </p>
        </div>
      </div>
    </div>
     <div class="col-md-2">
      <div class="card">
        <div class="card-header" style="background: linear-gradient(45deg,#00897B,#0081bf);">
           <p class="text-center" style="color:white;font-size: 20px;">Height Mark</p><hr style="background:white;">
           <p class="text-center" style="color:white;font-size: 20px;">{{ $Hmark }} </p>
        </div>
      </div>
    </div>
        </div>
      </div>
     
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
 <div class="card">
            <div class="card-header">
              <h3 class="card-title">Result Information List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Student Name</th>
                  <th>Student Roll</th>
                  <th>Written Mark</th>
                  <th>MCQ Mark</th>
                  <th>Total Mark</th>
                  <th>Status</th>
                  <th>Action</th>
             </tr>
                </thead>
                <tbody>
               @foreach($categories as $key=>$category)
                <tr>
                  <td>{{ $key + 1 }}</td>
                
                
                  <td>
                    @foreach($subjects as $category1)
                    @if($category1->id == $category->students_id)
                           {{ $category1->student_name }} 
                    @endif
                    @endforeach
                  </td>
                  <td>{{ $category->roll }}</td>
                  <td>
                    @if($category->written_exam < 20)
                    <span class="badge badge-danger">Failed</span>
                    @else
                     {{ $category->written_exam }} 
                    @endif
                   
                  </td>

                  <td>
                    @if($category->mcq_exam  < 14)
                    <span class="badge badge-danger">Failed</span>
                    @else
                     {{ $category->mcq_exam  }} 
                    @endif
                    
                  </td>
                  <td>
                     @if($category->main_total  < 34)
                    <span class="badge badge-danger">Failed</span>
                    @else
                     {{ $category->main_total }} 
                    @endif
                  
                  </td>
                  <td>
                    @if($category->status == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                  <span class="badge badge-danger">Inactive</span>
                  @endif
              </td>
                  <td><button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $category->id }})"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $category->id }}" action="{{ route('admin.result.destroy',$category->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    
                                                </form>
                    <a href="{{ route('admin.result.edit',$category->id) }}" type="button" class="btn btn-info text-light"><i class="fas fa-edit"></i></a>
               
               
                
                  </td>
               </tr>
              @endforeach
            </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Student Name</th>
                  <th>Student Roll</th>
                  <th>Written Mark</th>
                  <th>MCQ Mark</th>
                  <th>Total Mark</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
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