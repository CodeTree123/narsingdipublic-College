@extends('admin.master.master')

@section('title')
Result Information | College
@endsection


@section('body')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-7">
            <h6>Result Information<b class="badge badge-success"></b></h6>
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Result Information </li>
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
                  <th>Semester Name</th>
                  <th>Department Name</th>
                  <th>Section Name</th>
                  <th>Exam Name</th>
                  <th>Student Name</th>
                  <th>Roll No</th>
                  <th>Subject Name</th>
                  <th>Written Mark</th>
                  <th>Mcq Mark</th>
                  @if($examId == 3)
                  <th>75%(convert)</th>
                  @elseif($examId == 4)
                  <th>100%(convert)</th>
                  @else
                  @endif
                  <th>Incourse total</th>
                  <th>Viva</th>
                  <th>Total Mark</th>
                  <th>Status</th>
                  <th>Action</th>
             </tr>
                </thead>
                <tbody>
               @foreach($results as $key=>$category)
                <tr>
                  <td>{{ $key + 1 }}</td>

                   <td>
                   {{$category->semesterInfo['semestername']}}
                  </td>
                  <td>
                   {{$category->departmentInfo['department_name']}}
                  </td>
                  <td>
                    {{$category->sectionInfo['section_name']}}
                  </td>


                  <td>
                    {{ $examName }}
                  </td>

                  <td>
                    {{$category->studentsInfo['student_name']}}
                  </td>

                  <td>
                    {{ $category->roll }}
                  </td>

                  <td>
                    {{$category->subjectInfo['subject_name']}}
                  </td>

                  <td>
                    {{ $category->written_exam }}
                  </td>

                  <td>
                    {{ $category->mcq_exam }}
                  </td>
                  @if($examId == 3)
                      <th>{{ $category->wm_per }} </th>
                  @elseif($examId == 4)

                  <th>{{ $category->wm_per }}</th>
                  @else
                  @endif

                  <td>
                    {{ $category->incourse }}
                  </td>


                 <td>{{$category->viva}}</td>





                  <td>
                    {{ $category->wm_total }}
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
                  <th>Semester Name</th>
                  <th>Department Name</th>
                  <th>Section Name</th>
                  <th>Exam Name</th>
                  <th>Student Name</th>
                  <th>Roll No</th>
                  <th>Subject Name</th>
                  <th>Written Mark</th>
                  <th>Mcq Mark</th>
                  <th>Incourse total</th>
                  <th>Viva</th>
                  <th>Behaviour</th>
                  <th>Total Mark</th>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function () {

                $('#roll').on('keyup',function() {
                    var query = $(this).val();
                    $.ajax({

                        url:"{{ route('admin.result.cross-check') }}",

                        type:"GET",

                        data:{'roll':query},

                        success:function (data) {

                            $('#country_list').html(data);
                        }
                    })
                    // end of ajax call
                });


                $(document).on('click', 'li', function(){

                    var value = $(this).text();
                    $('#roll').val(value);
                    $('#country_list').html("");
                });
            });
        </script>

  <script type="text/javascript">

    $(document).ready(function(){

        $('#prod_cat_id').on('change',function(){
            //console.log("hmm its change");

            var cat_id=$(this).val();
             //console.log(cat_id);
             var div=$(this).parent();


             var op=` <label for="exampleInputEmail1">Student Roll</label>
                   <select class="form-control productname" name="roll" >`;

             $.ajax({
                type:'get',
                url:'{!!URL::to('findProductName3')!!}',
                data:{'id':cat_id},
               success:function(data){

                  //console.log('success');

                    //console.log(data);

                    //console.log(data.length);

                   // op+='<option value="0" selected disabled>choose sub-category</option>';
                    for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].student_roll+'">'+data[i].student_roll+'</option>';
                   }
                  // console.log(op)

                  op+= `</select>`

                 $('#subcategory').html(op);
                  // div.find('#subcategory').append(op);


               },
               error:function(){

                }

             });

        });
    });

</script>

<script type="text/javascript">

    $(document).ready(function(){

        $('#prod_cat_id1').on('change',function(){
            //console.log("hmm its change");

            var cat_id=$(this).val();
             //console.log(cat_id);
             var div=$(this).parent();


             var op=`   <label for="exampleInputEmail1">Exam Name</label>
                   <select class="form-control productname1" name="exam_id" >`;

             $.ajax({
                type:'get',
                url:'{!!URL::to('findProductName4')!!}',
                data:{'id':cat_id},
               success:function(data){

                  //console.log('success');

                    //console.log(data);

                    //console.log(data.length);

                   // op+='<option value="0" selected disabled>choose sub-category</option>';
                    for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].exam_name+'</option>';
                   }
                  // console.log(op)

                  op+= `</select>`

                 $('#subcategory1').html(op);
                  // div.find('#subcategory').append(op);


               },
               error:function(){

                }

             });

        });
    });

</script>
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
