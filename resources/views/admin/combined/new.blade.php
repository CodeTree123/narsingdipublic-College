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
                    <h5></h5>

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

                <div class="col-sm-8">
                    Section : @foreach($sectionNames as $section)
                    <span class="badge badge-success">{{$section->section_name}} ,</span>
                    @endforeach
                    {{ $department_name }} ,{{ $semester_name }} ,{{$examNamenew}}

                </div>

                <div class="col-sm-2">
                    <a href="{{ route('admin.allSubject') }}" type="button"
                        class="btn btn-block bg-gradient-success text-light">Previous Page</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card" >
                        <div class="card-header" style="background:#70b849;">
                            <center>
                                <h4 style="color:white">Student Who Attended in All Subjects</h4>
                            </center>
                            <a href="{{ route('admin.allSubjectpass.section',['sid'=>$semester_id,'id'=>$department_id]) }}"
                                type="button" class="btn  bg-gradient-success text-light">Print View</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Position</th>
                                            <th>Roll No</th>
                                            <th>Student Name</th>
                                            <th>Section Name</th>
                                            <th>Total Mark</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($resultDetailPass as $key=>$fail)

                                        <tr>
                                            <td>{{ $key + 1 }}</td>



                                            <td>
                                                {{ $fail->roll }}
                                            </td>
                                            <td>
                                                @foreach($studentNames as $student)
                                                @if($student->id == $fail->students_id)
                                                {{ $student->student_name }}
                                                @endif
                                                @endforeach
                                            </td>

                                            <td>
                                            @foreach($sectionNames as $sec)
                                                @if($sec->id == $fail->section_id)
                                                {{ $sec->section_name }}
                                                @endif
                                                @endforeach
                                            </td>

                                            <td>
                                                {{ $fail->all_total }}
                                            </td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Position</th>
                                            <th>Roll No</th>
                                            <th>Student Name</th>
                                            <th>Section Name</th>
                                            <th>Total Mark</th>

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
                        <div class="card-header" style="background:#70b849;">
                            <center>
                                <h4 style="color:white">Student Who did not </h4>
                            </center>
                            <a  href="{{ route('admin.allSubjectfail.section',['sid'=>$semester_id,'id'=>$department_id]) }}"
                                type="button" class="btn  bg-gradient-success text-light">Print View</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>Position</th>
                                            <th>Roll No</th>
                                            <th>Student Name</th>
                                            <th>Section Name</th>
                                            <th>Failed</th>
                                            <th>Total Mark</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($resultDetailFailed as $key=>$fail)


                                        <tr>

                                        <td>{{ $key + 1 }}</td>



                                            <td>
                                                {{ $fail->roll }}
                                            </td>
                                            <td>
                                                @foreach($studentNames as $student)
                                                @if($student->id == $fail->students_id)
                                                {{ $student->student_name }}
                                                @endif
                                                @endforeach
                                            </td>

                                            <td>
                                            @foreach($sectionNames as $sec)
                                                @if($sec->id == $fail->section_id)
                                                {{ $sec->section_name }}
                                                @endif
                                                @endforeach
                                            </td>

                                            <td>
                                                {{ $fail->fail_sub }} Subject
                                            </td>


                                            <td>
                                                {{ $fail->all_total }}
                                            </td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>

                                        <th>Position</th>
                                            <th>Roll No</th>
                                            <th>Student Name</th>
                                            <th>Section Name</th>
                                            <th>Failed</th>
                                            <th>Total Mark</th>

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
