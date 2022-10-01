<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Result information</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ asset('/') }}public/admin/dist/icon1.png" rel="shortcut icon"/>
        <!-- Place favicon.ico in the root directory -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-2">
    				<img src="{{ asset('/') }}public/front/img/logo.png" style="height: 226px;">
    			</div>
    			<div class="col-md-8 mt-3">
    				 <center>
                    <h2 style="color:#274B2E;"><b>নরসিংদী পাবলিক কলেজ</b></h2>
                    <h6><b>কলেজ কোড: ৩০৩২ EIIN: 136842</b></h6>
                    <h6><b>বিজ্ঞান , ব্যবসা শিক্ষা , মানবিক</b></h6>
                    <h6><b> ২১৭/৩, পশ্চিম ব্রাহ্মন্দী, নরসিংদী । অফিস: ০২৯৪-৫২৭০৬, মোবাইল: ০১৭২৮-০৮২০৩১,
                            ০১৯২৮-৬৮০০৯১</b>
                    </h6>
                    <h6><b> Email: narsingdipubliccollage@gmail.com</b></h6>
                </center>
    			</div>
    			<div class="col-md-2"></div>
    		</div>
    	</div>
        <hr><br>
        <div class="container">
        	<div class="row">
        		<div class="col-md-12">
        		  Section : @foreach($sectionNames as $section)
            <span class="badge badge-success">{{$section->section_name}} ,</span>
             @endforeach
 {{ $department_name }} ,{{ $semester_name }} ,{{$examNamenew}}
        		</div>
        	</div>
        </div>
        <br><br>
        <div class="container">
        	<div class="row">
        		<div class="col-md-12">
                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>Position</th>
                                            <th>Roll No</th>
                                            <th>Student Name</th>
                                            <th>Section Name</th>
                                            <th>Total Mark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($resultDetailPass as $key=>$fail)

<tr>
    <td>{{ $key + 1 }}</td>
    <td>
        {{ $fail->roll }}
    </td>
    <td>
        @foreach($studentNames as $student)
        @if($student->id == $fail->students_id)
        {{ $student->student_name }}
        @endif
        @endforeach
    </td>

    <td>
    @foreach($sectionNames as $sec)
        @if($sec->id == $fail->section_id)
        {{ $sec->section_name }}
        @endif
        @endforeach
    </td>

    <td>
        {{ $fail->all_total }}
    </td>


</tr>
@endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <<th>Position</th>
                                            <th>Roll No</th>
                                            <th>Student Name</th>
                                            <th>Section Name</th>
                                            <th>Total Mark</th>

                                        </tr>
                                    </tfoot>
                                </table>
        		</div>
        	</div>
        </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="container">
        	<div class="row">
        		<div class="col-md-4">
        			<center>
        				<h6><b>

        				</b></h6>
        				<h6><b>
        					 <span>www.codetreebd.com</span>
        				</b></h6>
        			</center>
        		</div>
        		<div class="col-md-4">

        		</div>

        		<div class="col-md-4">
        			<center>
        				<h6><b>
        					অধ্যক্ষ
        				</b></h6>
        				<h6><b>
        				নরসিংদী পাবলিক কলেজ
        				</b></h6>
        			</center>
        		</div>
        	</div>
        </div>

        <!-- Add your site or application content here -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>

