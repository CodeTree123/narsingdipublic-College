@extends('admin.master.master')

@section('title')
Subject | College
@endsection


@section('body')
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subject</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Subject</li>
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
              <h3 class="card-title">Add Subject</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('admin.subject.store') }}" id="form_validation" method="POST">
              	@csrf
                 <div class="form-group">
                        <label>Semester Name</label>
                        <select class="form-control" name="semester_id" id="prod_cat_id">
                          @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->semestername }}</option>
                          @endforeach
                      </select>
                      </div>
                      <div class="form-group" >
                        <label>Department Name</label>
                        <select class="form-control" name="department_id">
                          @foreach($categories1 as $category)
                          <option value="{{ $category->id }}">{{ $category->department_name }}</option>
                          @endforeach
                      </select>

                      </div>
              	<div class="form-group">
                    <label for="exampleInputEmail1">Subject Name</label>
                    <input type="text" class="form-control" name="subject_name" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1">Active</option>
                          <option value="0">Inctive</option>
                      </select>
                      </div>
                  <button type="submit" class="btn btn-success">Add</button>
                   <a href="{{ route('admin.subject') }}" type="button" class="btn btn-danger">Cancel</a>
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
