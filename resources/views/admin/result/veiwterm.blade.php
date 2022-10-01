@extends('admin.master.master')

@section('title')
ExamDetail  | College
@endsection


@section('body')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h6>Exam Detail Of <b>Section:</b>{{ $sectionName }},<b>Department:</b>{{ $departmentName }},<b>Semester:</b>{{ $semesterName }}</h6>
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
         @foreach($exams as $department)
        <div class="col-4">
 <div class="card">
          
           <div class="card-header bg-navy color-palette text-center">
           
              <h3 class="card-title text-center">{{ $department->exam_name }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                      
                <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
   @foreach($examName as $key=>$category)
   @if($category->exam_name == $department->exam_name)
   @foreach($subjects as $sub)

   @if($sub->id == $category->subject_id)
                <tr>
                  <td>{{ $i++ }}</td>
                 
                  <td>{{ $sub->subject_name }} </td>
                 
                  <td>  <a href="{{ route('admin.result.info',['id'=>$category->id]) }}" type="button" class="btn btn-block bg-navy color-palette text-light">View Result</a></td>
               </tr>
               @endif
               @endforeach
               @endif
              @endforeach
  </tbody>
</table>
            

            
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