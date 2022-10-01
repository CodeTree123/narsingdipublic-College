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
            <div class="col-3">
                <div class="card-header">
                    <h6><span><i class="fas fa-school"></i></span><span style="margin-left:5px;" class="badge badge-info">{{ $semesterName }}</span></h6>
                </div>
            </div>
            <div class="col-3">
                <div class="card-header">
                    <h6><span><i class="fas fa-graduation-cap"></i></span><span style="margin-left:5px;" class="badge badge-info">{{ $departmentName }}</span></h6>
                </div>
            </div>
            <div class="col-3">
                <div class="card-header">
                    <h6><span><i class="fas fa-graduation-cap"></i></span><span style="margin-left:5px;" class="badge badge-info">{{ $sectionName }}</span></h6>
                </div>
            </div>
            <div class="col-3">
                <div class="card-header">
                    <h6><span><i class="fas fa-graduation-cap"></i></span><span style="margin-left:5px;" class="badge badge-info">{{ $examName }}</span></h6>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="GET" action="{{ route('admin.search_subject_deparment_add_result') }}">
                        <div class="form-group">
                            <label>Subject List</label>
                            <select class="form-control" name="subject_id">
                                <option value=""> Select Subject </option>
                                @foreach($subjects as $category1)
                                <option value="{{ $category1->id }}">{{ $category1->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Hidden id -->
                        <input type="hidden" name="exam_id" value="{{ $exam_id }}">
                        <input type="hidden" name="semester_id" value="{{ $semester_id }}">
                        <input type="hidden" name="department_id" value="{{ $depId }}">
                        <input type="hidden" name="section_id" value="{{ $sec_id }}">
                        <!-- Hidden id -->
                        <button type="submit" class="btn btn-primary float-right">Add Result</button>
                    </form>
                </div>
            </div>
        </div>
</div>
<!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        $("#category").on('change', function() {
            var catId = $(this).val();
            //ajax
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('admin.subcategory.selectSubcategory')}}",
                type: "POST",
                data: {
                    'catId': catId
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#subcategory').empty();
                    $.each(data, function(index, subcatObj) {

                        $("#subcategory").append('<option value ="' + subcatObj.id + '">' + subcatObj.section_name + '</option>');
                    });
                },
                error: function() {
                    alert("error ase");
                }
            });
            //endajax
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#prod_cat_id').on('change', function() {
            var cat_id = $(this).val();
            var div = $(this).parent();
            var op = `<label style="color:white;">Subject Name</label>
                        <select class="form-control productname" name="sub_id">`;
            $.ajax({
                type: 'get',
                url: '{!!URL::to('
                findProductNamenew ')!!}',
                data: {
                    'id': cat_id
                },
                success: function(data) {
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].subject_name + '</option>';
                    }
                    op += `</select>`
                    $('#subcategory').html(op);
                },
                error: function() {
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
                document.getElementById('delete-form-' + id).submit();
            } else if (
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
