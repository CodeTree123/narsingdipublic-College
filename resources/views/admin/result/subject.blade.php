@extends('admin.master.master')

@section('title')
Result  | Subject  | College
@endsection


@section('body')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h6>Tabulation Sheet Of <b>Section:</b>{{ $sectionId }},<b>Department:</b>{{ $departmentName }},<b>Semester:</b>{{ $semesterName }}</h6>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">SubjectInfo</li>
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
            <!--<a href="" type="button" class="btn btn-block bg-gradient-primary text-light">Add</a>-->
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
         @foreach($categories as $department)
        <div class="col-4">
 <div class="card">
          
           <div class="card-header bg-gradient-danger text-center">
           
              <h3 class="card-title text-center">{{ $department->exam_name }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                      @foreach($subjects as $subject)
                    @if($department->subject_id == $subject->id)
                          <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                      @endif
                      @endforeach                    
                    <a href="{{ route('admin.result.info',['id'=>$department->id]) }}" type="button" class="btn btn-block bg-gradient-primary text-light">View Result</a>
                  

            
            </div>
           
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
       @endforeach
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