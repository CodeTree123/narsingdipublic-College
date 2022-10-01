@extends('admin.master.master')

@section('title')
Customize Section | Bosonika
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2">
            <a href="{{ route('admin.section') }}" type="button" class="btn btn-block bg-gradient-warning text-light">Previous Page</a>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
 <div class="card">
                        <div class="header">
                          <div class="header">
                           <h2>
                            ALL SECTION LIST
                            <span class="badge bg-blue">{{ $categories->count() }}</span>
                        </h2>
                    </div>
                            
                        </div>
                        <div class="body">
                            <ul class="sort_menu list-group">
                @foreach ($categories as $cat)
                <li class="list-group-item" data-id="{{$cat->id}}">
                    <span class="handle"></span>
                    <h6>{{$cat->name}}</h6>
                   </li>
                @endforeach
            </ul>
                        </div>
                    </div>
       </div>
      </div>
    </section>
 </div>
    <style>
    .list-group-item {
        display: flex;
        align-items: center;
    }

    .highlight {
        background: #f7e7d3;
        min-height: 30px;
        list-style-type: none;
    }

    .handle {
        min-width: 18px;
        background: #607D8B;
        height: 15px;
        display: inline-block;
        cursor: move;
        margin-right: 10px;
    }
</style>
    </section>
   <script>
    $(document).ready(function(){

      function updateToDatabase(idString){
         $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
        
         $.ajax({
              url:'{{url('/admin/update-items')}}',
              method:'POST',
              data:{ids:idString},
              success:function(){
                 alert('Successfully updated')
                 //do whatever after success
              }
           })
      }

        var target = $('.sort_menu');
        target.sortable({
            handle: '.handle',
            placeholder: 'highlight',
            axis: "y",
            update: function (e, ui){
               var sortData = target.sortable('toArray',{ attribute: 'data-id'})
               updateToDatabase(sortData.join(','))
            }
        })
        
    })
</script>
@endsection