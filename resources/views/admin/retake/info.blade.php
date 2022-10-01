@extends('admin.master.master')

@section('title')
Tabulation Sheet | College
@endsection


@section('body')
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h6>Tabulation Sheet Of <b class="badge badge-success">Section:</b>{{ $sectionName }},<b class="badge badge-success">Department:</b>{{ $departmentName }},<b class="badge badge-success">Semester:</b>{{ $semesterName }},<b class="badge badge-success">Subject:</b>{{ $subjectName }}</h6>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Tabulation Sheet</li>
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
            Examiner Name:<b class="badge badge-primary">{{ $ExamInfo->examiner_name }}</b>
          </div>
         <div class="col-sm-2">Exam Name:<b class="badge badge-primary">{{ $examName }}</b></div> 
          <div class="col-sm-2">
            Total Mark:<b class="badge badge-primary">100</b>
          </div>
          <div class="col-sm-2">
            Heighest Mark:<b class="badge badge-primary">{{ $hMark }}</b>
          </div>
          <div class="col-sm-2">
            Pass Mark:<b class="badge badge-primary">40</b>
          </div>
          
           <div class="col-sm-2">
            <a href="{{ route('admin.result',['id'=>$semesterId]) }}" type="button" class="btn btn-block bg-navy color-palette text-light">Previous Page</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
 <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabulation Sheet</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class = "table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Roll No</th>
                  <th>Written Mark</th>
                  <th>Mcq Mark</th>
                  <th>Practical Mark</th>
                  <th>Total Mark</th>
                  <th>75%</th>
                  <th>1st Tutorial Mark</th>
                  <th>2nd Tutorial Mark</th>
                  <th>3rd Tutorial Mark</th>
                  <th>Avg. Mark</th>
                  <th>15%</th>
                  <th>Viva Mark</th>
                  <th>Behave Mark</th>
                  <th>Total Mark</th>
                  <th>Comment</th>
                  <th>Status</th>
                  <th>Action</th>
             </tr>
                </thead>
                <tbody>
               @foreach($categories as $key=>$category)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>
                    {{ $category->roll }} 
                  </td>

                  <td>
                    {{ $category->written_exam }} 
                  </td>

                  <td>
                    {{ $category->mcq_exam }} 
                  </td>

                  <td>
                    {{ $category->prac_exam }} 
                  </td>

                  <td>
                    {{ $category->wm_total }} 
                  </td>

                  <td>
                    {{ $category->wm_per }}
                  </td>
                  <td>
                    {{ $category->f_tuto_exam }} 
                  </td>
                  <td>
                    {{ $category->s_tuto_exam }} 
                  </td>
                  <td>
                    {{ $category->t_tuto_exam }} 
                  </td>

                   <td>
                    {{ $category->tuto_total }} 
                  </td>
                  <td>
                    @if($category->tuto_per <= 5)
                    <span class="badge badge-danger">Failed</span>
                    @else
                    {{ $category->tuto_per }}
                    @endif
                  </td>
                  <td>
                    {{ $category->viva }} 
                  </td>
                  <td>
                    {{ $category->behave }} 
                  </td>
                  <td>
                    {{ $category->main_total }} 
                  </td>
                  <td>
                    @if($category->tuto_per <= 5)
                    <span class="badge badge-danger">Failed</span>
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
                  <th>Roll</th>
                  <th>Written Mark</th>
                  <th>Mcq Mark</th>
                  <th>Practical Mark</th>
                  <th>Total Mark</th>
                  <th>75%</th>
                  <th>1st Tutorial Mark</th>
                  <th>2nd Tutorial Mark</th>
                  <th>3rd Tutorial Mark</th>
                  <th>Avg. Mark</th>
                  <th>15%</th>
                  <th>Viva Mark</th>
                  <th>Behave Mark</th>
                  <th>Total Mark</th>
                  <th>Comment</th>
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