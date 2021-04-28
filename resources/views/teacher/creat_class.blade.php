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
                <h4>Create Class</h4>
                   <form action="/teacher/class/create/" method="post">
                   @csrf
                        <div class="form-group">
                            <label for="title" class="w-100">Title</label>
                            <input type="text" name="title" id="title" value="" required> 
                        </div>
                        <div class="form-group">
                            <label for="title" class="w-100">Stat date with time</label>
                            <input type="datetime-local" name="start" id="" value ="" required>
                        </div>
                        <div class="form-group">
                            <label for="couse" class="w-100">Couses</label>
                            <select name="course_id" id="couse" require>
                            @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->name}}</option>
                                
                            @endforeach    
                            </select>
                        </div>
                        <div class="form-group" >
                            <label for="title" class="w-100">End date with time</label>
                            <input type="datetime-local" name="end" id="" value="" required>
                            <input type="" name="teacher_id" id="" value="1" style="display:none" require>

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