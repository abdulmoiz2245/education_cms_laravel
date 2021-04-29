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
                <h4>Student Courses</h4>
                    <a href="/shedule_student/1" class="btn btn-primary">Shedule</a>
                    <a href="/student/register_course/1" class="btn btn-primary">Enroll</a>

                    <table style="width:100%" class="table table-striped table-bordered mt-4">
                    <thead>
                    <tr>
                            <th>Id</th>
                            <th>Couses Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($student_courses as $student_course)
                         
                        <tr>
                            <td>{{$student_course->id}}</td>
                            <td>{{$student_course->name}}</td>
                            <td><a href="/shedule_course/{{$student_course->id}}" class="btn btn-primary">Shedule</a>
                            <a href="/student/class/{{$student_course->id}}" class="btn btn-primary">Classes</a><a href="/student/class/delete/{{$student_course->id}}" class="btn btn-danger">Unenroll</a></td>
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
//  $(function () {
//    
//    $(document).ready(function() {
//        $('table').DataTable();
//    } );
//    
//  });
</script>
@endsection