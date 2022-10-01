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
            <h1>ExamInfo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">ExamInfo</li>
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
              <h3 class="card-title">Update ExamInfo</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('admin.exam_list.update') }}" id="form_validation" method="POST" enctype="multipart/form-data">
                @csrf
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Semester Name</label>
                   <select class="form-control" name="semester_id">
                     @foreach($categories1 as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $cats->semester_id ? 'selected':'' }}>{{ $cat->semestername }}</option>
                    @endforeach
                   </select>
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Exam Name</label>
                    <input type="text" class="form-control" name="exam_name" value="{{ $cats->exam_name }}" id="exampleInputEmail1" placeholder="Enter Exam Name">
                    <input type="hidden" class="form-control" name="id" value="{{ $cats->id }}" id="exampleInputEmail1" placeholder="Enter Exam Name">
                  </div>

             

                  <div class="form-group">
                    <label for="exampleInputEmail1">Exam Date</label>
                    <input type="date" class="form-control" name="date" value="{{ $cats->date }}" id="exampleInputEmail1" placeholder="Enter date">
                  </div>

                
<div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                   <select class="form-control" name="status">
                     
                    <option value="1" {{ $cats->status == 1 ? 'selected':'' }}>Active</option>
                    <option value="0" {{ $cats->status == 0 ? 'selected':'' }}>InActive</option>
                   </select>
                  </div>
                  
                  
              
                  <button type="submit" class="btn btn-success">Update</button>
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
