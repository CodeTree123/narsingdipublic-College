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
             <center> <h2 class="btn bg-olive"><i class="fas fa-graduation-cap"></i> Exam List</h2><center>
            </div>
            <!-- /.card-header -->
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
      </div>

      <div class="row mt-3">

  @foreach($newExams12 as $exam)
        <div class="col-4 mt-3">
 <div class="card">
            <div class="card-header">
             <center> <h2 class="btn bg-olive"><i class="fas fa-graduation-cap"></i>{{ $exam->exam_name }}</h2><center>
            </div>
            <!-- /.card-header -->
            <div class="card-footer">
              @if($exam->status == 1)

            <center>  <a href="{{ route('admin.new_result_2021',['eid'=>$exam->id,'sid'=>$exam->semester_id]) }}"   class="btn bg-navy"><i class="fas fa-arrow-circle-right"></i></i>Add Result</a></center>


               <center class="mt-2">  <a href="{{ route('admin.new_result_list',['id'=>$exam->id]) }}"   class="btn bg-olive"><i class="fas fa-list-alt"></i>View Result</a></center>

              @else

<center>
  <h2 class="btn bg-danger"><i class="fas fa-exclamation-triangle"></i>Not Available</h2>
  <center>  <a href="{{ route('admin.new_result_list',['id'=>$exam->id]) }}"   class="btn bg-olive"><i class="fas fa-list-alt"></i>View Result</a></center>
</center>
              @endif
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
@endforeach


      </div>
    </section>
 </div>

@endsection