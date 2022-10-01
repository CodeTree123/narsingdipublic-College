@extends('admin.master.master')

@section('title')
Combined Subject Result | College
@endsection


@section('body')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 >Combined Subject Result Information </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active" >Combined Subject Result Information</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
     <section class="content-header">

           <div class="container-fluid" >

        <div class="row mb-2">
      @foreach($newExams1 as $semester)
                  <div class="col-md-4">
                   <div class="card">
        <div class="card-header " style="background-color: #2c549e; color:whitesmoke;" >

                           <center>{{ $semester->exam_name }}</center>

                     </div>
                     <div class="card-body"  >

                     @foreach($categories2 as $department)
                       <div class="card">
                       <div class="card-header "style="background: #4b9126;">
                           <center><a href="" style="color:white;">{{ $department->department_name }}</a></li></center>
                         </div>
                         <div class="card-body">
                         <center><a href="{{ route('admin.allSubject.section',['sid'=>$semester->id,'id'=>$department->id]) }}" style="color:black;">Show combined result</a></center>

                         </div>
                         </div>
@endforeach
                     </div>
                     </div>
                  </div>
                  @endforeach




                </div>

      </div><!-- /.container-fluid -->


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
