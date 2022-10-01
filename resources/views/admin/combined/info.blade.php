@extends('admin.master.master')

@section('title')
Combined Result | College
@endsection


@section('body')
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h5>Combined Results  Of <span class="badge badge-success"><b>Section:</b>@foreach($classinfos as $info)
              {{ $info->section_name }} ,
              @endforeach<span class="badge badge-success"><b>Department:</b>{{ $tDepartmentName }}</span>,<span class="badge badge-success"><b>Semester:</b>{{ $tSemesterName }}</span></h5>

          </div>
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Combined Result </li>
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
            <a href="{{ route('admin.allSubject') }}" type="button" class="btn btn-block bg-gradient-success text-light">Previous Page</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <section class="content-header">
      <div class="card">
        <div class="card-header bg-olive">
           <div class="container-fluid">
        <form method="GET" action="{{ route('admin.allSubject.info') }}">
        <div class="row mb-2">

                  <div class="col-md-2">
                   <div class="form-group">
                        <label>Semester Name</label>
                        <select class="form-control" name="s_id">
                           @foreach($categories1 as $category1)
                           <option value="{{ $category1->id }}">{{ $category1->semestername }}</option>
                        @endforeach

                      </select>
                      </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label>Department Name</label>
                        <select class="form-control" name="d_id">
                           @foreach($categories2 as $category1)
                           <option value="{{ $category1->id }}">{{ $category1->department_name }}</option>
                        @endforeach

                      </select>
                      </div>
                  </div>
                  <div class="col-md-2">
                   <div class="form-group">
                        <label>Section Type</label>
                        <select class="form-control" name="se_id">

                            <option value="male">Male</option>
                            <option value="female">FeMale</option>
                      </select>
                      </div>
                  </div>
                 <div class="col-md-2">
                   <div class="form-group">
                        <label>Exam Name</label>
                        <select class="form-control" name="exam_name">
                          @foreach($newExams12 as $category)
                          <option value="{{$category->exam_name}}">{{$category->exam_name}}</option>

                         @endforeach

                      </select>
                      </div>
                  </div>

                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary" style="margin-top: 30px;font-size: 15px;">Search</button>
                  </div>

                </div>
                </form>
      </div><!-- /.container-fluid -->
        </div>
      </div>

    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
 <div class="card">
            <div class="card-header bg-info">
              <center><h4>Student Who Passed In All Subject</h4></center>
            </div>
            <div class="card-body">
                <div class = "table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Position</th>
                   @if($section == 'all')
                   <th>Section Name</th>
                   @endif
                  <th>Roll No</th>
                  <th>Student Name</th>
                  <th>Total Mark</th>
                  <th>Comment</th>

             </tr>
                </thead>
                <tbody>
              @foreach($totalMarks as $key=>$category)

                <tr>
                  <td>{{ $key + 1 }}</td>
                   @if($section == 'all')
                  <td>

                  @foreach($categories3 as $category1)
                    @if($category1->id == $category->section_id)
                           {{ $category1->section_name }}
                    @endif
                    @endforeach

                  </td>
                   @endif
                 <td>
                    {{ $category->roll }}
                  </td>
                  <td>
                     @foreach($subjects as $category1)
                    @if($category1->id == $category->students_id)
                           {{ $category1->student_name }}
                    @endif
                    @endforeach
                  </td>



                  <td>
                    {{ $category->all_total }}
                  </td>

                  <td>

                  </td>









               </tr>
               @endforeach
            </tbody>
                <tfoot>
                <tr>
                 <th>Position</th>
                   @if($section == 'all')
                   <th>Section Name</th>
                   @endif
                  <th>Roll No</th>
                  <th>Student Name</th>
                  <th>Total Mark</th>
                  <th>Comment</th>
                </tr>
                </tfoot>
              </table>
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
            <div class="card-header bg-info">
              <center><h4>Student Who failed In One Or More Subject</h4></center>
            </div>
            <div class="card-body">
                <div class = "table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Position</th>
                   @if($section == 'all')
                   <th>Section Name</th>
                   @endif
                  <th>Roll No</th>
                  <th>Student Name</th>
                  <th>Total Mark</th>
                  <th>Comment</th>

             </tr>
                </thead>
                <tbody>
              @foreach($totalMarks1 as $key=>$category)

                <tr>
                  <td>{{ $key + 1 }}</td>
                   @if($section == 'all')
                  <td>

                  @foreach($categories3 as $category1)
                    @if($category1->id == $category->section_id)
                           {{ $category1->section_name }}
                    @endif
                    @endforeach

                  </td>
                   @endif
                 <td>
                    {{ $category->roll }}
                  </td>
                  <td>
                     @foreach($subjects as $category1)
                    @if($category1->id == $category->students_id)
                           {{ $category1->student_name }}
                    @endif
                    @endforeach
                  </td>



                  <td>
                    {{ $category->all_total }}
                  </td>

                  <td>

                  </td>









               </tr>
               @endforeach
            </tbody>
                <tfoot>
                <tr>
                 <th>Position</th>
                   @if($section == 'all')
                   <th>Section Name</th>
                   @endif
                  <th>Roll No</th>
                  <th>Student Name</th>
                  <th>Total Mark</th>
                  <th>Comment</th>
                </tr>
                </tfoot>
              </table>
            </div>
            </div>
          </div>
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
