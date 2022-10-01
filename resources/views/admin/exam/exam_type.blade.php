@extends('admin.master.master')

@section('title')
ExamInfo | College
@endsection


@section('body')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Exam Info</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Exam Info</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <section class="content">
      <div class="row">
        <div class="col-12">
 <div class="card">
            <div class="card-header">
              <h3 class="card-title">Add Exam Info</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('admin.exam_type') }}" id="form_validation" method="POST" enctype="multipart/form-data">
                @csrf

                  <div class="form-group">
                    <label for="exampleInputEmail1">Exam Type Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Exam Name">
                  </div>
                  <button type="submit" class="btn btn-success">Add</button>
                   <a href="{{ route('admin.exam.semester') }}" type="button" class="btn btn-danger">Cancel</a>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
      </div>
    </section>

 </div>


@endsection
