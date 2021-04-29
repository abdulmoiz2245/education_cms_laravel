@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <a class="btn btn-primary" style="float:right" href="/teacher/class/create">Add new</a></div>

                <div class="card-body">
                <h4>Classes of couse "{{$teacher_course->name}}"</h4>
                <table style="width:100%" class="table table-bordered table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Class Title</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Action</th>


                        </tr>
                        @foreach($classes as $class)
                        <tr>
                            <td>{{$class->id}}</td>
                            <td>{{$class->title}}</td>
                            <td>{{$class->start}}</td>
                            <td>{{$class->end}}</td>

                            <td><a href="/teacher/class/edit/{{$class->id}}" class="btn btn-primary">Edit</a>
                            <a href="/teacher/class/delete/{{$class->id}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
   
<script type="text/javascript">
  $(function () {
    
     $('table').DataTable({});
    
  });
</script>
@endsection