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


        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="row">

        <div class="col-12">
 <div class="card">

           <div class="card-header " style="background-color: #4b9126; color:whitesmoke" >

              <h3 class="card-title text-center" >Teacher List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
   <div class = "table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Teacher Name</th>
                  <th>Designation</th>
                  <th>Department Name</th>
                  <th>section Name</th>
                  <th>subject Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>status</th>

                  <th>Action</th>
             </tr>
                </thead>
                <tbody>
               @foreach($teacher as $key=>$teach)
                <tr>
                    <td>
                       {{$key+1}}
                    </td>

                <td>
                    {{ $teach->name }}
                  </td>
                  <td>
                    {{ $teach->designation }}
                  </td>
                <td>
                    {{ $teach->department_name }}
                  </td>

                  <td>
                    {{ $teach->section_id }}
                  </td>

                  <td>
                    {{ $teach->subject_id }}
                  </td>


                  <td>
                    {{ $teach->phone }}
                  </td>

                  <td>
                    {{ $teach->email }}
                  </td>

                  <td>
                    {{ $teach->address }}
                  </td>
                  <td>
                    {{ $teach->status }}
                  </td>


   <td><button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $teach->id }})"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $teach->id }}" action="{{ route('admin.teacher.destroy',$teach->id) }}" method="POST" style="display: none;">
                                                    @csrf

                                                </form>
                    <a href="{{ route('admin.teacher.edit',$teach->id) }}" type="button" class="btn btn-info text-light"><i class="fas fa-edit"></i></a>
                    <a  href="{{ route('admin.teacher.infoadd',$teach->id) }}" class="btn btn-success text-light"><i class="far fa-plus-square" title="Add Subject"></i></a>
                    <a  href="{{ route('admin.teacher.infoview',$teach->id) }}" class="btn btn-success bg-navy color-palette text-light"><i class="far fa-list-alt" title="View Subject"></i></a>
                  </td>
               </tr>
              @endforeach
            </tbody>
                <tfoot>
                <tr>
                <th>Id</th>
                  <th>Teacher Name</th>
                  <th>Designation</th>
                  <th>Department Name</th>
                  <th>section Name</th>
                  <th>subject Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>status</th>

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

