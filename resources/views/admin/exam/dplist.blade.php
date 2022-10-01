@extends('admin.master.master')

@section('title')
Exam Information | College
@endsection


@section('body')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-7">
                    <h6>Exam Information Of <b class="badge badge-success"></b></h6>
                </div>
                <div class="col-sm-5">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Exam Information</li>
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
                    <a href="{{ route('admin.exam.create') }}" type="button"
                        class="btn btn-block bg-gradient-success text-light">Add</a>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Exam Information List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Year Name</th>
                                        <th>Exam Name</th>
                                        <th>Exam type</th>
                                        <th>Exam Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key=>$category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>

                                            @foreach($categories1 as $cat1)
                                            @if($category->semester_id == $cat1->id)

                                            {{ $cat1->semestername }}
                                            @endif

                                            @endforeach
                                        </td>
                                        <td>{{ $category->exam_name }} </td>

                                        <td>{{ $category->type }} </td>

                                        <td>{{ $category->date }} </td>
                                        <td>
                                            @if($category->status == 1)

                                            <span class="badge bg-success">Active</span>
                                            @else
                                            <span class="badge bg-danger">Inactive</span>

                                            @endif

                                        </td>

                                        <td><button type="button" class="btn btn-danger text-light"
                                                onclick="deleteTag({{ $category->id }})"><i
                                                    class="fas fa-trash-alt"></i></button>
                                            <form id="delete-form-{{ $category->id }}"
                                                action="{{ route('admin.exam_list.destroy',$category->id) }}"
                                                method="POST" style="display: none;">
                                                @csrf

                                            </form>
                                            <a href="{{ route('admin.exam_list.edit',$category->id) }}" type="button"
                                                class="btn btn-info text-light"><i class="fas fa-edit"></i></a>



                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Exam Date</th>
                                        <th>Year Name</th>
                                        <th>Exam Name</th>
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
<script type="text/javascript">
$(document).ready(function() {

    $('#prod_cat_id').on('change', function() {
        //console.log("hmm its change");

        var cat_id = $(this).val();
        //console.log(cat_id);
        var div = $(this).parent();


        var op = `<label>Subject Name</label>
                        <select class="form-control productname" name="su_id">`;

        $.ajax({
            type: 'get',
            url: '{!!URL::to('
            findProductNamenew ')!!}',
            data: {
                'id': cat_id
            },
            success: function(data) {

                //console.log('success');

                //console.log(data);

                //console.log(data.length);

                // op+='<option value="0" selected disabled>choose sub-category</option>';
                for (var i = 0; i < data.length; i++) {
                    op += '<option value="' + data[i].id + '">' + data[i].subject_name +
                        '</option>';
                }
                // console.log(op)
                op += `<option value="all">All</option>`
                op += `</select>`

                $('#subcategory').html(op);
                // div.find('#subcategory').append(op);


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
