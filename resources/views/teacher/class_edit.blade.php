@extends('layouts.app')

@section('content')
@php

    
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
                            <input type="datetime-local" name="start" id="" value ="{{$class->start}}">
                        </div>
                        <div class="form-group">
                            <label for="title">End date with time</label>
                            <input type="datetime-local" name="end" id="" value="{{$class->end}}">
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