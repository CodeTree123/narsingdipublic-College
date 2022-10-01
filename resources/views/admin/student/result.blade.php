@extends('admin.master.master')

@section('title')
{{ $studentName  }}| College
@endsection


@section('body')
<style type="text/css">
    #b {
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
                        <div class="card-header" style="background-color: #4b9126;">
                            <p class="text-center" style="color:white;font-size: 20px;">Year Name</p>
                            <hr style="background:white;">
                            <p class="text-center" style="color:white;font-size: 20px;">{{ $semesterName }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header" style="background-color: #4b9126;">
                            <p class="text-center" style="color:white;font-size: 20px;">Department Name</p>
                            <hr style="background:white;">
                            <p class="text-center" style="color:white;font-size: 20px;">{{ $departmentName}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header" style="background-color: #4b9126;">
                            <p class="text-center" style="color:white;font-size: 20px;">Section Name</p>
                            <hr style="background:white;">
                            <p class="text-center" style="color:white;font-size: 20px;">{{ $sectionName }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header" style="background-color: #4b9126;">
                            <p class="text-center" style="color:white;font-size: 20px;">Student Namev</p>
                            <hr style="background:white;">
                            <p class="text-center" style="color:white;font-size: 20px;">{{ $studentName }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header" style="background-color: #4b9126;">
                            <p class="text-center" style="color:white;font-size: 20px;">Student Roll</p>
                            <hr style="background:white;">
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
                    <a href="{{ route('admin.student') }}" type="button" class="btn btn-block bg-gradient-success text-light">Previous Page</a>
                </div>
                <div class="col-sm-6">
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            @foreach($newExamName as $name)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <h6 class="card-title"><b class="badge badge-info">Exam
                                            Name:{{ $name->exam_name }}</b></h6>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="card-title"><b class="badge badge-info">
                                            @if($mainResultsnew > 0)
                                            Total GPA: 0
                                            @else
                                            Total GPA: {{$newGrade}}
                                            @endif
                                        </b></h6>
                                </div>
                                <div class="col-sm-2">
                                    <h6 class="card-title"><b class="badge badge-info">
                                            Total Mark:{{$mainResults23}}
                                        </b></h6>
                                </div>
                                <div class="col-sm-3 mt-2">
                                    <form action="{{ route('admin.allSubject.update') }}" id="form_validation" method="POST">
                                        @csrf
                                        <input type="hidden" class="form-control" name="roll" value="{{ $studentRoll}}" id="exampleInputEmail1" placeholder="Enter Roll">
                                        <input type="hidden" class="form-control" name="cgpa" value="{{ $newGrade}}" id="exampleInputEmail1" placeholder="Enter Roll">
                                        <input type="hidden" class="form-control" name="total_mark" value="{{$categories3}}" id="exampleInputEmail1" placeholder="Enter Total Mark">
                                        <button type="submit" class="btn  bg-gradient-primary text-light">Update</button>
                                    </form>
                                    <br>
                                    <a href="{{ route('admin.studentview.resultprint',['id'=>$studentId,'ename'=>$name->exam_name]) }}" type="button" class="btn  bg-gradient-success text-light">Print View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th id="b">Subject Name</th>
                                        <th id="b">Maximum Mark</th>
                                        <th id="b">Written Mark</th>
                                        <th id="b">Mcq Mark</th>
                                        <th id="b">75%(convert)</th>
                                        <th id="b">Incourse Mark</th>
                                        <th id="b">Viva</th>
                                        <th id="b">Total Mark</th>
                                        <th id="b">Letter Grade </th>
                                        <th id="b">Grade Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($height_mark=0)
                                    @foreach($mainResults as $category)
                                    @if($category->exam_id == $name->id)
                                    <tr>
                                        <td>
                                            @foreach($subjects as $sub)
                                            @if($sub->id == $category->subject_id)
                                            {{ $sub->subject_name }}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($subjectHeightMarks as $sub)
                                            @if($sub->exam_id == $category->exam_id && $sub->subject_id ==
                                            $category->subject_id)
                                            <span class="badge badge-info"> <b>{{ $sub->highest_mark}}</b></span>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($category->subject_id == 3 || $category->subject_id == 4 ||
                                            $category->subject_id == 5 || $category->subject_id == 6 ||
                                            $category->subject_id == 7 || $category->subject_id == 8 ||
                                            $category->subject_id == 11 || $category->subject_id ==15||
                                            $category->subject_id == 18 || $category->subject_id == 23 )
                                            @if($category->written_exam < 22 ) <span class="badge badge-danger">
                                                Failed</span>
                                                {{ $category->written_exam }}
                                                @else
                                                {{ $category->written_exam }}
                                                @endif
                                                @else
                                                @if($category->subject_id == 2 || $category->subject_id == 10 || $category->subject_id == 17)
                                                @if($category->written_exam < 45 ) <span class="badge badge-danger">
                                                    Failed</span>
                                                    {{ $category->written_exam }}
                                                    @else
                                                    {{ $category->written_exam }}
                                                    @endif
                                                    @else
                                                    @if($category->written_exam < 32 ) <span class="badge badge-danger">
                                                        Failed</span>
                                                        {{ $category->written_exam }}
                                                        @else
                                                        {{ $category->written_exam }}
                                                        @endif
                                                        @endif
                                                        @endif
                                        </td>
                                        <td>
                                            @if($category->subject_id == 3 || $category->subject_id == 4 ||
                                            $category->subject_id == 5 || $category->subject_id == 6 ||
                                            $category->subject_id == 7 || $category->subject_id == 8 ||
                                            $category->subject_id == 11 || $category->subject_id ==15||
                                            $category->subject_id == 18 || $category->subject_id == 23 )
                                            @if($category->mcq_exam == NULL)
                                            <span class="badge badge-danger">N/A</span>
                                            @else
                                            @if($category->mcq_exam < 11) <span class="badge badge-danger">Failed</span>
                                                {{ $category->mcq_exam }}
                                                @else
                                                {{ $category->mcq_exam }}
                                                @endif
                                                @endif
                                                @else
                                                @if($category->mcq_exam == NULL)
                                                <span class="badge badge-danger">N/A</span>
                                                @else
                                                @if($category->mcq_exam < 13) <span class="badge badge-danger">
                                                    Failed</span>
                                                    {{ $category->mcq_exam }}
                                                    @else
                                                    {{ $category->mcq_exam }}
                                                    @endif
                                                    @endif
                                                    @endif
                                        </td>
                                        <td>
                                            @if($category->subject_id == 3 || $category->subject_id == 4 ||
                                            $category->subject_id == 5 || $category->subject_id == 6 ||
                                            $category->subject_id == 7 || $category->subject_id == 8 ||
                                            $category->subject_id == 11 || $category->subject_id ==15||
                                            $category->subject_id == 18 || $category->subject_id == 23 )
                                            <span class="badge badge-danger">N/A</span>
                                            @else
                                            {{ $category->wm_per }}
                                        </td>
                                        @endif
                                        <td>
                                            {{ $category->incourse}}
                                        </td>
                                        <td> {{ $category->viva }}</td>
                                        <td>
                                            {{ $category->main_total }}
                                        </td>
                                        <td>
                                            <!--first-->
                                            @if($category->subject_id == 3 || $category->subject_id == 4 ||
                                            $category->subject_id == 5 || $category->subject_id == 6 ||
                                            $category->subject_id == 7 || $category->subject_id == 8 ||
                                            $category->subject_id == 11 || $category->subject_id ==15||
                                            $category->subject_id == 18 || $category->subject_id == 23 )
                                            @if($category->written_exam < 22 || $category->mcq_exam < 11 ) <span class="badge badge-danger">
                                                    F
                                                    </span>
                                                    @else
                                                    <span class="badge badge-success">
                                                        {{ $category-> gradeLetter   }}
                                                        <span>
                                                            @endif
                                                            @endif

                                                            @if($category->subject_id == 2 || $category->subject_id == 10 || $category->subject_id == 17 )
                                                            @if($category->written_exam < 45 ) @if(empty($category->mcq_exam||$category->written_exam < 45 )) <span class="badge badge-success">
                                                                    {{ $category-> gradeLetter }}
                                                                    <span>
                                                                        @else
                                                                        <span class="badge badge-danger">
                                                                            F
                                                                        </span>
                                                                        @endif
                                                                        @else
                                                                        <span class="badge badge-success">
                                                                            {{ $category-> gradeLetter   }}
                                                                        </span>
                                                                        @endif
                                                                        @endif

                                                                        @if($category->subject_id == 1 || $category->subject_id == 9 ||
                                                                        $category->subject_id == 12 || $category->subject_id == 13 ||
                                                                        $category->subject_id == 14 || $category->subject_id == 16 ||
                                                                        $category->subject_id == 19 || $category->subject_id ==20||
                                                                        $category->subject_id == 21 || $category->subject_id == 22||
                                                                        $category->subject_id == 24 || $category->subject_id == 25||
                                                                        $category->subject_id == 26 )
                                                                        @if($category->written_exam < 32 || $category->mcq_exam < 13 ) <span class="badge badge-danger">
                                                                                F
                                                                    </span>
                                                                    @else
                                                                    <span class="badge badge-success">
                                                                        {{ $category-> gradeLetter   }}
                                                                        <span>
                                                                            @endif
                                                                            @endif
                                                                            <!--first-->
                                        </td>
                                        <!-- Grade point  -->
                                        </td>
                                        <td>
                                            <!--first-->
                                            @if($category->subject_id == 3 || $category->subject_id == 4 ||
                                            $category->subject_id == 5 || $category->subject_id == 6 ||
                                            $category->subject_id == 7 || $category->subject_id == 8 ||
                                            $category->subject_id == 11 || $category->subject_id ==15||
                                            $category->subject_id == 18 || $category->subject_id == 23 )
                                            @if($category->written_exam < 22 || $category->mcq_exam < 11 ) <span class="badge badge-danger">
                                                    0
                                                    </span>
                                                    @else
                                                    <span class="badge badge-success">
                                                        {{ $category-> gradePoint   }}
                                                        <span>
                                                            @endif
                                                            @endif

                                                            @if($category->subject_id == 2 || $category->subject_id == 10 || $category->subject_id == 17 )
                                                            @if($category->written_exam < 45 ) @if(empty($category->mcq_exam||$category->written_exam < 45 )) <span class="badge badge-success">
                                                                    {{ $category-> gradePoint }}
                                                                    <span>
                                                                        @else
                                                                        <span class="badge badge-danger">
                                                                            0
                                                                        </span>
                                                                        @endif
                                                                        @else
                                                                        <span class="badge badge-success">
                                                                            {{ $category-> gradePoint   }}
                                                                        </span>
                                                                        @endif
                                                                        @endif

                                                                        @if($category->subject_id == 1 || $category->subject_id == 9 ||
                                                                        $category->subject_id == 12 || $category->subject_id == 13 ||
                                                                        $category->subject_id == 14 || $category->subject_id == 16 ||
                                                                        $category->subject_id == 19 || $category->subject_id ==20||
                                                                        $category->subject_id == 21 || $category->subject_id == 22||
                                                                        $category->subject_id == 24 || $category->subject_id == 25||
                                                                        $category->subject_id == 26 )
                                                                        @if($category->written_exam < 32 || $category->mcq_exam < 13 ) <span class="badge badge-danger">
                                                                                0
                                                                    </span>
                                                                    @else
                                                                    <span class="badge badge-success">
                                                                        {{ $category-> gradePoint   }}
                                                                        <span>
                                                                            @endif
                                                                            @endif
                                                                            <!--first-->
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
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
                document.getElementById('delete-form-' + id).submit();
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
