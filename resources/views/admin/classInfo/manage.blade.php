@extends('admin.master.master')

@section('title')
Section | College
@endsection


@section('body')
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Section</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Section </li>
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
            <a href="{{ route('admin.classinfo.create') }}" type="button" class="btn btn-block bg-navy color-palette text-center">Add</a>
          </div>
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-2"></div>
           <div class="col-sm-2">
            <!--<a href="{{ route('admin.section.customize') }}" type="button" class="btn btn-block bg-gradient-success text-light">Customize Section</a>-->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="row">
        
        <div class="col-12">
 <div class="card">
           
            
           <div class="card-header ">
         
              <h3 class="card-title text-center">Section List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Department Name</th>
      <th scope="col">Section Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($categories as $key=>$category)
                <tr>
                  <td>{{ $key + 1 }}</td>
                
                  <td>
                    @foreach($categories2 as $key=>$category1)
                    @if($category->section_id == $category1->id)
                    {{ $category1->department_name }}
                    @endif
                    @endforeach 
                  </td>
                   <td>
                    {{ $category->section_name }} 
                  </td>
                  <td>
                    @if($category->status == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                  <span class="badge badge-danger">Inactive</span>
                  @endif
              </td>
                  <td><button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $category->id }})"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $category->id }}" action="{{ route('admin.classinfo.destroy',$category->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    
                                                </form>
                    <a href="{{ route('admin.classinfo.edit',$category->id) }}" type="button" class="btn btn-info text-light"><i class="fas fa-edit"></i></a>
                  </td>
               </tr>
              @endforeach
  </tbody>
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