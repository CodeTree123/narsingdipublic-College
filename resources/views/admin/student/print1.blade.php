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
    				<center><h6 style="color:#222844;"><b>রাজনীতি ,ধূমপান এবং নকলমুক্ত আদর্শ শিক্ষা প্রতিষ্ঠান</b></h6>
    					<h2 style="color:#274B2E;"><b>নরসিংদী মডেল কলেজ</b></h2>
    					<h3 style="color:#222844;"><b>Narsingdi Model College</b></h3>
    					<h6 style="color:#E30000;"><b>সরকার অনুমোদিত ও স্বীকৃতিপ্রাপ্ত</b></h6>
    					<h6><b>স্থাপিত:২০০২ খ্রি. কলেজ কোড: ৩০১৩ EIIN: 112716</b></h6>
    					<h6><b> ২০৬/৩৭ পশ্চিম ব্রাহ্মন্দী, নরসিংদী সদর, নরসিংদী । মোবাইল: ০১৩০৯-১১২৭১৬ ,০১৯১৬-৫৭৪৫৯৯</b></h6>
    					<h6><b>Website: college.codetreebd.com, Email: nmc112716@gmail.com</b></h6>
    				</center>
    			</div>
    			<div class="col-md-2"></div>
    		</div>
    	</div>
        <hr><br>
        <div class="container">
        	<div class="row">
        		<div class="col-md-6">
        			<h5 style="font-size: 15px;"><b >Name:</b> {{ $studentName }}</h5>
        		</div>
        		<div class="col-md-6">
        			<h5 style="font-size: 15px;"><b >Roll:</b> {{ $studentRoll }}</h5>
        		</div>
        		<div class="col-md-6 mt-3">
        			<h5 style="font-size: 15px;"><b >Section:</b> {{ $sectionName }}</h5>
        		</div>

        		<div class="col-md-6 mt-3">
        			<h5 style="font-size: 15px;"><b >Exam Type:</b> {{ $newExam }}</h5>
        		</div>
<div class="col-md-6 mt-3">
        			<h5 style="font-size: 15px;"><b >Semester:</b> {{ $semesterName }}</h5>
        		</div>
        		<div class="col-md-6 mt-3">
        			<h5 style="font-size: 15px;"><b >Department:</b> {{ $departmentName }}</h5>
        		</div>
        		<div class="col-md-6  mt-3">
        			<h5 style="font-size: 15px;"><b >Avg Gpa:</b> {{ $newGrade }}</h5>
        		</div>

        		<div class="col-md-6 mt-3">
        			<h5 style="font-size: 15px;"><b >Total Mark:</b> {{$main =  $categories3 + $categories2 }}</h5>
        		</div>

        	</div>
        </div>
        <br><br>
        <div class="container">
        	<div class="row">
        		<div class="col-md-12">
        			<table class="table table-bordered table-striped">
  <tr style="font-size: 13px;">
    <th id="b">Id</th>
                  <th id="b">Subject Name</th>
                  <th id="b">Maximum Mark</th>
                  <th id="b">Written Mark</th>
                  <th id="b">Mcq Mark</th>
                 
                  <th id="b">Total Mark</th>
                   <th id="b">Letter Grade </th>
                  <th id="b">Grade Point</th>
  </tr style="font-size: 13px;">
       @php($i=1)
                  @php($hm=0)
                  @foreach($mainResults as $category)
              
                 
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                      @foreach($subjects as $sub)

                   @if($sub->id == $category->subject_id)
                      {{ $sub->subject_name }}
                      @endif
                      @endforeach
                    </td>
<td>
    @foreach($subjectHeightMarks as $sub)

                   @if($sub->exam_name == $category->exam_name && $sub->subject_id == $category->subject_id)
                     <span class="badge badge-danger"> <b>{{ $sub->hm }}</b></span>
                      @endif
                      @endforeach
</td>
                     <td>
                        
                    @if($category->written_exam < 20 )
                    <span class="badge badge-danger">Failed</span>
                    {{ $category->written_exam }} 
                    @else
                    {{ $category->written_exam }} 
                    @endif
                  </td>

                  <td>
                      @if($category->mcq_exam == NULL)
                      
                      @else
                     @if($category->mcq_exam < 14)
                    <span class="badge badge-danger">Failed</span>
                    {{ $category->mcq_exam }} 
                    @else
                    {{ $category->mcq_exam }} 
                    @endif
                      @endif
                  </td>

                  <td>
                    @if($category->main_total < 34 )
                    <span class="badge badge-danger">Failed</span>
                    @else
                    {{ $category->main_total }} 
                    @endif
                  </td>
                  <td>
                    {{ $category->gradeLetter }} 
                  </td>
                  <td>
                    {{ $category->gradePoint }} 
                  </td>
                  

                  </tr>
                  
               
                @endforeach
 
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
        					রেক্টর
        				</b></h6>
        				<h6><b>
        					নরসিংদী মডেল কলেজ
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
        					নরসিংদী মডেল কলেজ
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