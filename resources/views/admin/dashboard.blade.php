@extends('admin.master.master')

@section('title')
Home | College
@endsection


@section('body')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>{{ $student_count }}</h3>

                            <p>Total Student</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <a href="{{route('admin.student')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-olive">
                        <div class="inner">
                            <h3>{{ $dep_count }}</h3>

                            <p>Total Department</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-school"></i>
                        </div>
                        <a href="{{route('admin.section')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-navy">
                        <div class="inner">
                            <h3>{{ $section_count }}</h3>

                            <p>Total Year</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chalkboard"></i>
                        </div>
                        <a href="{{route('admin.classinfo')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div id="container" class="calendar-container bg-navy"></div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="background: linear-gradient(90deg,#00897B,#0081bf)">
                            <h3 class="card-title ">New Students</h3>

                            <div class="card-tools">


                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="users-list clearfix">
                                @foreach($latests_Students as $stu)
                                <li>

                                    @if($stu->student_image == Null)
                                    <img src="{{asset('/')}}public/admin/ma.png" alt="User Image" height="128px"
                                        width="128px">
                                    @else
                                    <img src="{{asset('/')}}{{$stu->student_image}}" alt="User Image" height="128px"
                                        width="128px">
                                    @endif

                                    <a class="users-list-name" href="#">{{ $stu->student_name }}</a>
                                    <span class="users-list-date">{{ $stu->date }}</span>
                                </li>
                                @endforeach
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="{{route('admin.student')}}">View All Students</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

@endsection
