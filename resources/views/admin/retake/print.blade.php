<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>{{ $studentName }}</title>
	<style type="text/css">

	
                table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding:10px;
}
                </style>
</head>
<body>
<section class="header-part">
	<center><img src="{{ asset('/') }}public/admin/dist/icon1.png" /></center>
	<center>Brahmondi,01855-908652</center>

</section>

<section class="second-part">
	<div style="float: left;overflow: hidden;padding:10px;">
		<h6>Semester Name</h6>
		
		<h6>{{ $semesterName }}</h6>
	</div>
    <div style="float: left;overflow: hidden;padding:10px;">
    	<h6>Department Name</h6>
    	
    	<h6>{{ $departmentName}}</h6>
    </div>
    <div style="float: left;overflow: hidden;padding:10px;">
    	<h6>Section Name</h6>
    	
    	<h6>{{ $sectionName }}</h6>
    </div>
    <div style="float: left;overflow: hidden;padding:10px;">
    	<h6>Student Name</h6>
    	
    	<h6>{{ $studentName }}</h6>
    </div>
    <div style="padding:10px;">
    	<h6>Student Roll</h6>
    	
    	<h6>{{ $studentRoll}}</h6>
    </div>
</section>
	<br>
<section class="body-part">
	<div style="float: left;overflow: hidden;padding:10px;">
	
		
		<h6>Exam Name:{{$newExam }}</h6>
	</div>
    <div style="float: left;overflow: hidden;padding:10px;">
    	
    	
    	<h6>Avg Gpa:{{ $mainResults1}}</h6>
    </div>

    <div style="padding:10px;">
    	
    	
    	<h6>Total Mark:{{ $mainResults2}}</h6>
    </div>
   

</section>

<section>
	<table>
  <tr>
    <th id="b">Id</th>
                  <th id="b">Subject Name</th>
                  <th id="b">Maximum Mark</th>
                  <th id="b">Written Mark</th>
                  <th id="b">Mcq Mark</th>
                 
                  <th id="b">Total Mark</th>
                   <th id="b">Letter Grade </th>
                  <th id="b">Grade Point</th>
  </tr>
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
                    {{ $category->written_exam }} 
                  </td>

                  <td>
                    {{ $category->mcq_exam }} 
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
</section>

</body>
</html>