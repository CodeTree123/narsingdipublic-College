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
          <div class="col-sm-7">
            <h6>StudentInfo Of <b class="badge badge-success">Section:</b>{{ $sectionId }},<b class="badge badge-success">Department:</b>{{ $departmentName }},<b class="badge badge-success">Semester:</b>{{ $semesterName }}</h6>
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">StudentInfo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2">
            
          </div>
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-2"></div>
           <div class="col-sm-2">
            <a href="{{ route('admin.student',['id'=>$semesterId]) }}" type="button" class="btn btn-block bg-gradient-success text-light">Previous Page</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
 <div class="card">
            <div class="card-header">
              <h3 class="card-title">StudentInfo List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Student Roll</th>
                  <th>Student Image</th>
                  <th>Student Name</th>
                  <th>Student Phone</th>
                  <th>Student Email</th>
                  <th>Student Address</th>
                  <th>Student BithDate</th>
                  <th>Status</th>
                  <th>Action</th>
             </tr>
                </thead>
                <tbody>
               @foreach($categories as $key=>$category)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>
                    {{ $category->student_roll }} 
                  </td>
                  <td><img src="{{asset('/')}}{{$category->student_image}}" width="70px" height="70px"></td>
                  <td>{{ $category->student_name }} </td>
                  <td>{{ $category->student_phone }} </td>
                  <td>{{ $category->student_email }} </td>
                  <td>{!! $category->student_address !!} </td>
                  <td>{{ $category->student_dob }} </td>
                  <td>
                  	@if($category->status == 1)
                  	<span class="badge badge-success">Active</span>
                  	@else
                  <span class="badge badge-danger">Inactive</span>
                  @endif
              </td>
                  <td><button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $category->id }})"><i class="fas fa-trash-alt"></i></button>
                  	<form id="delete-form-{{ $category->id }}" action="{{ route('admin.section.destroy',$category->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    
                                                </form>
                  	<!--<a href="{{ route('admin.section.edit',$category->id) }}" type="button" class="btn btn-info text-light"><i class="fas fa-edit"></i></a>-->
                <a href="{{ route('admin.student.result',['id'=>$category->id]) }}" type="button" class="btn btn-block bg-navy color-palette text-light">View Result</a>
                  </td>
               </tr>
              @endforeach
            </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Student Roll</th>
                  <th>Student Image</th>
                  <th>Student Name</th>
                  <th>Student Phone</th>
                  <th>Student Email</th>
                  <th>Student Address</th>
                  <th>Student BithDate</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
      </div>
    </section>
 </div>
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