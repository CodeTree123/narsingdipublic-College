@extends('admin.master.master')

@section('title')
{{ $studentName  }}| College
@endsection


@section('body')
<style type="text/css">
  #b{
    font-size: 12px;
  }
</style>
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
   
     <section class="content-header">
      <div class="container-fluid">
        <div class="row">
           <div class="col-md-3">
      <div class="card">
        <div class="card-header" style="background: linear-gradient(45deg,#00897B,#0081bf);">
          <p class="text-center" style="color:white;font-size: 20px;">Semester Name</p><hr style="background:white;">
            <p class="text-center" style="color:white;font-size: 20px;">{{ $semesterName }}</p>
        </div>
      </div>
    </div>
     <div class="col-md-3">
      <div class="card">
        <div class="card-header" style="background: linear-gradient(45deg,#00897B,#0081bf);">
           <p class="text-center" style="color:white;font-size: 20px;">Department Name</p><hr style="background:white;">
           <p class="text-center" style="color:white;font-size: 20px;">{{ $departmentName}}</p>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card">
        <div class="card-header" style="background: linear-gradient(45deg,#00897B,#0081bf);">
           <p class="text-center" style="color:white;font-size: 20px;">Section Name</p><hr style="background:white;">
<p class="text-center" style="color:white;font-size: 20px;">{{ $sectionName }} </p>       </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card">
        <div class="card-header" style="background: linear-gradient(45deg,#00897B,#0081bf);">
           <p class="text-center" style="color:white;font-size: 20px;">Student Name</p><hr style="background:white;">
           <p class="text-center" style="color:white;font-size: 20px;">{{ $studentName }} </p>
        </div>
      </div>
    </div>
     <div class="col-md-2">
      <div class="card">
        <div class="card-header" style="background: linear-gradient(45deg,#00897B,#0081bf);">
           <p class="text-center" style="color:white;font-size: 20px;">Student Roll</p><hr style="background:white;">
           <p class="text-center" style="color:white;font-size: 20px;">{{ $studentRoll}} </p>
        </div>
      </div>
    </div>
        </div>
      </div>
     
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
            <a href="{{ route('admin.student') }}" type="button" class="btn btn-block bg-gradient-success text-light">Previous Page</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="row">
        @foreach($examNames as $name)
        <div class="col-md-12">
 <div class="card">
            <div class="card-header">
              <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h6 class="card-title"><b class="badge badge-info">Exam Name:{{ $name->exam_name }}</b></h6>
          </div>
          <div class="col-sm-3">
            <h6 class="card-title"><b class="badge badge-info">
              

            Avarege GPA: {{$newGrade}}

            

          </b></h6>
          </div>
          <div class="col-sm-3">
            <h6 class="card-title"><b class="badge badge-info">


            Total Mark:{{$main =  $categories3 + $categories2 }}


          </b></h6>
          </div>
          <div class="col-sm-3">
              <form action="{{ route('admin.allSubjectr.update') }}" id="form_validation" method="POST">
              	@csrf
              	 <input type="hidden" class="form-control" name="roll"value="{{ $studentRoll}}" id="exampleInputEmail1" placeholder="Enter Roll">
              	 <input type="hidden" class="form-control" name="cgpa"value="{{ $newGrade}}" id="exampleInputEmail1" placeholder="Enter Roll">
              	 <input type="hidden" class="form-control" name="total_mark" value="{{$main =  $categories3 + $categories2 }}" id="exampleInputEmail1" placeholder="Enter Total Mark">
             <button  type="submit" class="btn  bg-gradient-primary text-light">Update</button>
             </form>

             <a href="{{ route('admin.studentview.resultprintr',['id'=>$studentId,'ename'=>$name->exam_name]) }}" type="button" class="btn  bg-gradient-success text-light">Print View</a>
          </div>
        </div>
      </div>
              
              
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class = "table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th id="b">Id</th>
                  <th id="b">Subject Name</th>
                  <th id="b">Maximum Mark</th>
                  <th id="b">Written Mark</th>
                  <th id="b">Mcq Mark</th>
                 
                  <th id="b">Total Mark</th>
                   <th id="b">Letter Grade </th>
                  <th id="b">Grade Point</th>
               </tr>
                </thead>
                <tbody>
                  @php($i=1)
                  @php($hm=0)
                  @foreach($mainResults as $category)
                  @if($category->exam_name == $name->exam_name)
                 
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                      @foreach($subjects as $sub)

                   @if($sub->id == $category->subject_id)
                      {{ $sub->subject_name }}
                      @endif
                      @endforeach
                    </td>
<td>
    @foreach($subjectHeightMarks as $sub)

                   @if($sub->exam_name == $category->exam_name && $sub->subject_id == $category->subject_id)
                     <span class="badge badge-danger"> <b>{{ $sub->hm }}</b></span>
                      @endif
                      @endforeach
</td>
                    <td>
                        
                    @if($category->written_exam < 20 )
                    <span class="badge badge-danger">Failed</span>
                    {{ $category->written_exam }} 
                    @else
                    {{ $category->written_exam }} 
                    @endif
                  </td>

                  <td>
                      @if($category->mcq_exam == NULL)
                      
                      @else
                     @if($category->mcq_exam < 14)
                    <span class="badge badge-danger">Failed</span>
                    {{ $category->mcq_exam }} 
                    @else
                    {{ $category->mcq_exam }} 
                    @endif
                      @endif
                  </td>

                  <td>
                    @if($category->main_total < 34 )
                    <span class="badge badge-danger">Failed</span>
                    @else
                    {{ $category->main_total }} 
                    @endif
                  </td>
                  <td>
                    {{ $category->gradeLetter }} 
                  </td>
                  <td>
                    {{ $category->gradePoint }} 
                  </td>
                  

                  </tr>
                  
                  @endif
                @endforeach
            </tbody>
                <tfoot>
                
                  <tr>
                   <th id="b">Id</th>
                  <th id="b">Subject Name</th>
                  <th id="b">Maximum Mark</th>
                  <th id="b">Written Mark</th>
                  <th id="b">Mcq Mark</th>
                 
                  <th id="b">Total Mark</th>
                   <th id="b">Letter Grade </th>
                  <th id="b">Grade Point</th>
               </tr>
               
                </tfoot>
              </table>
            </div>
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