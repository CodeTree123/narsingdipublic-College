@extends('admin.master.master')

@section('title')
Teacher Info | College
@endsection


@section('body')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher Info </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Teacher Info </li>
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
            <a href="{{ route('admin.teacher.create') }}" type="button" class="btn btn-block bg-gradient-primary text-light">Add</a>
          </div>
          <div class="col-sm-2">
            
          </div>
          
           <div class="col-sm-8">
            <form method="GET" action="{{ route('admin.teachersearch') }}">
        <div class="row ">
      
                  <div class="col-md-4">
                   <div class="form-group">
                       
                        <select class="form-control" name="s_id">
                         <option value="#">Select Department</option>
                             @foreach($dNames as $category1)
                           <option value="{{ $category1->department_name }}" {{ $category1->department_name == $dName ? 'selected' : '' }}>{{ $category1->department_name }}</option>
                        @endforeach
                      </select>
                      </div>
                  </div>
                 
                
                 

                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary" style="">Search</button>
                  </div>
               
                </div>
                </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="row">
        
        <div class="col-12">
 <div class="card">
           
           <div class="card-header bg-navy color-palette text-center">
          
              <h3 class="card-title text-center">Teacher List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
   <div class = "table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Department Name</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>password</th>
                 
                  <th>Action</th>
             </tr>
                </thead>
                <tbody>
               @foreach($sResult as $key=>$category)
                <tr>
                  <td>{{ $key + 1 }}</td>
                <td>
                    {{ $category->department_name }} 
                  </td>

                  <td>
                    {{ $category->name }} 
                  </td>

                  <td>
                    {{ $category->desi }} 
                  </td>

                  <td>
                    {{ $category->phone }} 
                  </td>

                  <td>
                    {{ $category->email }} 
                  </td>

                  <td>
                    {{ $category->address }}
                  </td>
                  <td>
                    {{ $category->view_password}} 
                  </td>
             
   <td><button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $category->id }})"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $category->id }}" action="{{ route('admin.teacher.destroy',$category->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    
                                                </form>
                    <a href="{{ route('admin.teacher.edit',$category->id) }}" type="button" class="btn btn-info text-light"><i class="fas fa-edit"></i></a>
                    <a  href="{{ route('admin.teacher.infoadd',$category->id) }}" class="btn btn-success text-light"><i class="far fa-plus-square" title="Add Subject"></i></a>
                    <a  href="{{ route('admin.teacher.infoview',$category->id) }}" class="btn btn-success bg-navy color-palette text-light"><i class="far fa-list-alt" title="View Subject"></i></a>
                  </td>
               </tr>
              @endforeach
            </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Department Name</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>password</th>
                 
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