<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Result information</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('/') }}public/admin/dist/logo.png" rel="shortcut icon" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="margin-left: 166px;">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('/') }}public/front/img/logo.png" style="height: 226px;margin-top: 32px;margin-left:97px">
            </div>
            <div class="col-md-8 mt-3">
                <center>
                    <h6><b>College Code:3032 </b><b style="margin-left:57%;">EIIN: 136842</b></h6>
                    <h2 style="color:#274B2E;"><b>নরসিংদী পাবলিক কলেজ</b></h2>
                    <h6><b> ২১৭/৩, পশ্চিম ব্রাহ্মন্দী, নরসিংদী ।</b></h6>
                    <h6><b> অফিস: 0294-52706,01309-136842 </b></h6>
                    <h6><b>E-mail: narsingdipubliccollege@gmail.com</b></h6>

                    <style>
                        b.division-group:before {
                            content: "";
                            display: inline-block;
                            background: red;
                            width: 15px;
                            height: 15px;
                            margin-right: 5px;
                        }

                        b#divisionScience {
                            margin-right: -32px;
                        }

                        b#divisionBusiness {
                            margin-right: -30px;
                            margin-left: 50px;
                        }

                        b#divisionHumanities {
                            margin-left: 50px;
                        }
                    </style>

                    <h6>
                        <b class="division-group" id="divisionScience">বিজ্ঞান</b>
                        <b class="division-group" id="divisionBusiness"> ব্যবসায় শিক্ষা</b>
                        <b class="division-group" id="divisionHumanities"> মানবিক</b>
                    </h6>
                </center>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <hr><br>
    <div class="container" style="margin-left: 250px;">
        <div class="row">
            <div class="col-md-6">
                <h5 style="font-size: 18px;"><b>Name:</b> {{ $studentName }}</h5>
            </div>
            <div class="col-md-6">
                <h5 style="font-size: 18px;"><b>ID:</b> {{ $studentRoll }}</h5>
            </div>
            <div class="col-md-6 mt-3">
                <h5 style="font-size: 18px;"><b>Section:</b> {{ $sectionName }}</h5>
            </div>
            <div class="col-md-6 mt-3">
                <h5 style="font-size: 18px;"><b>Exam Type:</b> {{ $newExam }}</h5>
            </div>
            <div class="col-md-6 mt-3">
                <h5 style="font-size: 18px;"><b>Year:</b> {{ $semesterName }}</h5>
            </div>
            <div class="col-md-6 mt-3">
                <h5 style="font-size: 18px;"><b>Group:</b> {{ $departmentName }}</h5>
            </div>
            <div class="col-md-6  mt-3">
                @if($mainResultsnew > 0)
                <b>Total GPA: 0</b>
                @else
                <b>Total GPA: {{$newGrade}}</b>
                @endif
            </div>

            <div class="col-md-6 mt-3">
                <h5 style="font-size: 18px;"><b>Total Marks:</b> {{$mainResults23 }}</h5>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <h6 style="margin-left: 42%; font-size:30px;">Mark Sheet</h6>
        <hr style="border-top:2px solid black">
        <div class="row">
            <div class="col-md-12">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th id="b">Subject Name</th>
                            <th id="b">Maximum Mark</th>
                            <th id="b">Written Mark</th>
                            <th id="b">Mcq Mark</th>
                            <th id="b">75%(convert)</th>
                            <th id="b">Incourse Mark</th>
                            <th id="b">Viva</th>
                            <th id="b">Total Mark</th>
                            <th id="b">Letter Grade </th>
                            <th id="b">Grade Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($height_mark=0)
                        @foreach($mainResults as $category)
                        <tr>
                            <td>
                                @foreach($subjects as $sub)
                                @if($sub->id == $category->subject_id)
                                {{ $sub->subject_name }}
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($subjectHeightMarks as $sub)
                                @if($sub->exam_id == $category->exam_id && $sub->subject_id ==
                                $category->subject_id)
                                <span class="badge badge-info"> <b>{{ $sub->highest_mark}}</b></span>
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @if($category->subject_id == 3 || $category->subject_id == 4 ||
                                $category->subject_id == 5 || $category->subject_id == 6 ||
                                $category->subject_id == 7 || $category->subject_id == 8 ||
                                $category->subject_id == 11 || $category->subject_id ==15||
                                $category->subject_id == 18 || $category->subject_id == 23 )
                                @if($category->written_exam < 22 ) <span class="badge badge-danger">
                                    Failed</span>
                                    {{ $category->written_exam }}
                                    @else
                                    {{ $category->written_exam }}
                                    @endif
                                    @else
                                    @if($category->subject_id == 2 || $category->subject_id == 10 || $category->subject_id == 17)
                                    @if($category->written_exam < 45 ) <span class="badge badge-danger">
                                        Failed</span>
                                        {{ $category->written_exam }}
                                        @else
                                        {{ $category->written_exam }}
                                        @endif
                                        @else
                                        @if($category->written_exam < 32 ) <span class="badge badge-danger">
                                            Failed</span>
                                            {{ $category->written_exam }}
                                            @else
                                            {{ $category->written_exam }}
                                            @endif
                                            @endif
                                            @endif
                            </td>
                            <td>
                                @if($category->subject_id == 3 || $category->subject_id == 4 ||
                                $category->subject_id == 5 || $category->subject_id == 6 ||
                                $category->subject_id == 7 || $category->subject_id == 8 ||
                                $category->subject_id == 11 || $category->subject_id ==15||
                                $category->subject_id == 18 || $category->subject_id == 23 )
                                @if($category->mcq_exam == NULL)
                                <span class="badge badge-danger">N/A</span>
                                @else
                                @if($category->mcq_exam < 11) <span class="badge badge-danger">Failed</span>
                                    {{ $category->mcq_exam }}
                                    @else
                                    {{ $category->mcq_exam }}
                                    @endif
                                    @endif
                                    @else
                                    @if($category->mcq_exam == NULL)
                                    <span class="badge badge-danger">N/A</span>
                                    @else
                                    @if($category->mcq_exam < 13) <span class="badge badge-danger">
                                        Failed</span>
                                        {{ $category->mcq_exam }}
                                        @else
                                        {{ $category->mcq_exam }}
                                        @endif
                                        @endif
                                        @endif
                            </td>
                            <td>
                                @if($category->subject_id == 3 || $category->subject_id == 4 ||
                                $category->subject_id == 5 || $category->subject_id == 6 ||
                                $category->subject_id == 7 || $category->subject_id == 8 ||
                                $category->subject_id == 11 || $category->subject_id ==15||
                                $category->subject_id == 18 || $category->subject_id == 23 )
                                <span class="badge badge-danger">N/A</span>
                                @else
                                {{ $category->wm_per }}
                            </td>
                            @endif
                            <td>
                                {{ $category->incourse}}
                            </td>
                            <td> {{ $category->viva }}</td>
                            <td>
                                {{ $category->main_total }}
                            </td>
                            <td>
                                <!--first-->
                                @if($category->subject_id == 3 || $category->subject_id == 4 ||
                                $category->subject_id == 5 || $category->subject_id == 6 ||
                                $category->subject_id == 7 || $category->subject_id == 8 ||
                                $category->subject_id == 11 || $category->subject_id ==15||
                                $category->subject_id == 18 || $category->subject_id == 23 )
                                @if($category->written_exam < 22 || $category->mcq_exam < 11 ) <span class="badge badge-danger">
                                        F
                                        </span>
                                        @else
                                        <span class="badge badge-success">
                                            {{ $category-> gradeLetter   }}
                                            <span>
                                                @endif
                                                @endif

                                                @if($category->subject_id == 2 || $category->subject_id == 10 || $category->subject_id == 17 )
                                                @if($category->written_exam < 45 ) @if(empty($category->mcq_exam||$category->written_exam < 45 )) <span class="badge badge-success">
                                                        {{ $category-> gradeLetter }}
                                                        <span>
                                                            @else
                                                            <span class="badge badge-danger">
                                                                F
                                                            </span>
                                                            @endif
                                                            @else
                                                            <span class="badge badge-success">
                                                                {{ $category-> gradeLetter   }}
                                                            </span>
                                                            @endif
                                                            @endif

                                                            @if($category->subject_id == 1 || $category->subject_id == 9 ||
                                                            $category->subject_id == 12 || $category->subject_id == 13 ||
                                                            $category->subject_id == 14 || $category->subject_id == 16 ||
                                                            $category->subject_id == 19 || $category->subject_id ==20||
                                                            $category->subject_id == 21 || $category->subject_id == 22||
                                                            $category->subject_id == 24 || $category->subject_id == 25||
                                                            $category->subject_id == 26 )
                                                            @if($category->written_exam < 32 || $category->mcq_exam < 13 ) <span class="badge badge-danger">
                                                                    F
                                                        </span>
                                                        @else
                                                        <span class="badge badge-success">
                                                            {{ $category-> gradeLetter   }}
                                                            <span>
                                                                @endif
                                                                @endif
                                                                <!--first-->
                            </td>
                            <!-- Grade point  -->
                            </td>
                            <td>
                                <!--first-->
                                @if($category->subject_id == 3 || $category->subject_id == 4 ||
                                $category->subject_id == 5 || $category->subject_id == 6 ||
                                $category->subject_id == 7 || $category->subject_id == 8 ||
                                $category->subject_id == 11 || $category->subject_id ==15||
                                $category->subject_id == 18 || $category->subject_id == 23 )
                                @if($category->written_exam < 22 || $category->mcq_exam < 11 ) <span class="badge badge-danger">
                                        0
                                        </span>
                                        @else
                                        <span class="badge badge-success">
                                            {{ $category-> gradePoint   }}
                                            <span>
                                                @endif
                                                @endif

                                                @if($category->subject_id == 2 || $category->subject_id == 10 || $category->subject_id == 17 )
                                                @if($category->written_exam < 45 ) @if(empty($category->mcq_exam||$category->written_exam < 45 )) <span class="badge badge-success">
                                                        {{ $category-> gradePoint }}
                                                        <span>
                                                            @else
                                                            <span class="badge badge-danger">
                                                                0
                                                            </span>
                                                            @endif
                                                            @else
                                                            <span class="badge badge-success">
                                                                {{ $category-> gradePoint   }}
                                                            </span>
                                                            @endif
                                                            @endif

                                                            @if($category->subject_id == 1 || $category->subject_id == 9 ||
                                                            $category->subject_id == 12 || $category->subject_id == 13 ||
                                                            $category->subject_id == 14 || $category->subject_id == 16 ||
                                                            $category->subject_id == 19 || $category->subject_id ==20||
                                                            $category->subject_id == 21 || $category->subject_id == 22||
                                                            $category->subject_id == 24 || $category->subject_id == 25||
                                                            $category->subject_id == 26 )
                                                            @if($category->written_exam < 32 || $category->mcq_exam < 13 ) <span class="badge badge-danger">
                                                                    0
                                                        </span>
                                                        @else
                                                        <span class="badge badge-success">
                                                            {{ $category-> gradePoint   }}
                                                            <span>
                                                                @endif
                                                                @endif
                                                                <!--first-->
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>

    <!-- Add your site or application content here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
