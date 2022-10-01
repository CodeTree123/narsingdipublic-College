@extends('admin.master.master')

@section('title')
StudentInfo | College
@endsection


@section('body')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-7">
                    <h6>StudentInfo Of <b class="badge badge-success"></b></h6>
                </div>
                <div class="col-sm-5">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">StudentInfo</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->


    <section class="content">
        <div class="row">
            @foreach($newExams1 as $newexam)
            <div class="col-4">
                <div class="card">
                    <div class="card-header bg-olive">
                        <h3 class="card-title">{{ $newexam->exam_name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-footer bg-navy">
                        <a href="{{ route('admin.student.result',['eid'=>$newexam->id,'sid'=>$students->id]) }}" type="button" class="btn  bg-navy color-palette text-light"><i class="fas fa-clipboard-list"></i><span style="padding-left:3px;">View Result</span></a>
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
