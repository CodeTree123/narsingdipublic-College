@extends('admin.master.master')

@section('title')
subject Info | College
@endsection


@section('body')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>subject Info </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">subject Info </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
    
    <section class="content">
      <div class="row">
        
        <div class="col-12">
 <div class="card">
           
           <div class="card-header bg-navy color-palette text-center">
          
              <h3 class="card-title text-center">Subject List of  {{ $department_ids }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
   <div class = "table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Semester Name</th>
                  <th>Department Name</th>
                  <th>Section Name</th>
                  <th>Subject Name</th>
                  <th>Action</th>
             </tr>
                </thead>
                <tbody>
               @foreach($teacher_Names as $key=>$category)
                <tr>
                  <td>{{ $key + 1 }}</td>
                

                  <td>
                    @foreach($categories1 as $sename)
                    @if($sename->id == $category->semester_id)
                    {{ $sename->semestername }} 
                    @endif
                    @endforeach
                  </td>

                  <td>
                   @foreach($categories2 as $sename1)
                    @if($sename1->id == $category->department_id)
                    {{ $sename1->department_name }} 
                    @endif
                    @endforeach
                  </td>

                  <td>
                    @foreach($categories3 as $sename2)
                    @if($sename2->id == $category->section_id)
                    {{ $sename2->section_name }} 
                    @endif
                    @endforeach
                  </td>

                  <td>
                     @foreach($categories4 as $sename3)
                    @if($sename3->id == $category->subject_id)
                    {{ $sename3->subject_name }} 
                    @endif
                    @endforeach
                  </td>

                  
                 
             
   <td><button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $category->id }})"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $category->id }}" action="{{ route('admin.teacher.destroy',$category->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    
                                                </form>
                    <a href="{{ route('admin.teacher.edit',$category->id) }}" type="button" class="btn btn-info text-light"><i class="fas fa-edit"></i></a>
                  
                  </td>
               </tr>
              @endforeach
            </tbody>
                <tfoot>
                <tr>
                 <th>Id</th>
                  <th>Semester Name</th>
                  <th>Department Name</th>
                  <th>Section Name</th>
                  <th>Subject Name</th>
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