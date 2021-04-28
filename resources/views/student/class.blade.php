@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <h4>Classes of couse "{{$student_course->name}}"</h4>
                    <table style="width:100%" class='table'>
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Class Title</th>
                            <th>Start Time</th>
                            <th>End Time</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($classes as $class)
                        <tr>
                            <td>{{$class->id}}</td>
                            <td>{{$class->title}}</td>
                            <td>{{$class->start}}</td>
                            <td>{{$class->end}}</td>

                            
                        </tr>
                        @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
   
<script type="text/javascript">
  $(function () {
    
    $(document).ready(function() {
        $('table').DataTable();
    } );
    
  });
</script>
@endsection