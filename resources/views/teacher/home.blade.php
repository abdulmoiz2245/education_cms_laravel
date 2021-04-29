@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <h4>Teacher Courses</h4>
                <table style="width:100%" class="table table-bordered table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Couses Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach($teacher_courses as $teacher_courses)
                        <tr>
                            <td>{{$teacher_courses->id}}</td>
                            <td>{{$teacher_courses->name}}</td>
                            <td><a href="/shedule_course/{{$teacher_courses->id}}" class="btn btn-primary">Shedule</a>
                            <a href="/teacher/class/{{$teacher_courses->id}}" class="btn btn-primary">Classes</a></td>
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