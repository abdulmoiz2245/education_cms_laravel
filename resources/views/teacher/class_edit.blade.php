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
                <h4>Edit Classes of couse ""</h4>
                   <form action="/teacher/class/edit/{{$class->id}}" method="post">
                   @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{$class->title}}">
                        </div>
                        <div class="form-group">
                            <label for="title">Stat date with time</label>
                            <input type="datetime-local" name="start" id="" value ="{{$start_data}}">
                        </div>
                        <div class="form-group">
                            <label for="title">End date with time</label>
                            <input type="datetime-local" name="end" id="" value="{{$end_data}}">
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