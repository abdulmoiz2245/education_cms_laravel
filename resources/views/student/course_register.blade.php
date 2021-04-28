@extends('layouts.app')

@section('content')
@php
    $start_data = "2014-01-02T11:42:13.510";
    $end_data = "2014-01-02T11:42:13.510";

    
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <h4>Regsiter Course</h4>
                   <form action="/student/register_course/1" method="post">
                   @csrf
                        
                        <div class="form-group">
                            <label for="couse" class="w-100">Couses</label>
                            <select name="course_id" id="couse" require>
                            @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->name}}</option>
                                
                            @endforeach    
                            </select>
                        </div>
                        
                       <input type="submit" value="Submit">
                   </form>
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