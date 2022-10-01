@extends('admin.master.master')

@section('title')
Section | Bosonika
@endsection


@section('body')
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sections</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Sections</li>
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
              <h3 class="card-title">Update Section</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('admin.section.update') }}" id="form_validation" method="POST">
              	@csrf
              	<div class="form-group">
                    <label for="exampleInputEmail1">Section Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $cats->name }}" id="exampleInputEmail1" placeholder="Enter Name">
                    <input type="hidden" class="form-control" name="id" value="{{ $cats->id }}" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1" {{ $cats->status == 1 ? 'selected' : '' }}>Active</option>
                          <option value="0" {{ $cats->status == 0 ? 'selected' : '' }}>Inctive</option>
                      </select>
                      </div>
                  <button type="submit" class="btn btn-success">Update</button>
                   <a href="{{ route('admin.category') }}" type="button" class="btn btn-danger">Cancel</a>
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
