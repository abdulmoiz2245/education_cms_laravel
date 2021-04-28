@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                        <form action="/shedule" method="post">
                            @csrf    
                            <label for="" class="w-100" >Month</label>
                            <input type="month" name="month" value="{{$month}}">
                            <label for="" class="w-100">Week</label>
                            <input type="number" name="week"  value="{{$week}}" min="1" max="5"><br><br>
                            <input type="submit" value="Apply">
                        </form>
                        
                        <br><hr>
                        <table>
                            <thead>
                                <tr>
                                    <th width="200">Monday</th>
                                    <th  width="200">Tuesday</th>
                                    <th  width="200">Wednesday</th>
                                    <th  width="200">Thursday</th>
                                    <th  width="200">Friday</th>
                                    <th  width="200">Saturday</th>
                                    <th  width="200">Sunday</th>
                                </tr>
                            </thead>
                          
                            <tbody>
                            @foreach($course_list as $course)
                                <tr>
                                <?php  
                                    $data['start'] = $course->start;
                                   // dd($data['start']);
                                    $course->start = new DateTime($data['start']);
                                    $course->day = (string) $course->start->format('D');
                                    echo $course->day;
                                ?>
                                <th>@if($course->day == 'Mon')
                                 <h4>Course:</h4><h5>asdasda</h5><br>{{$course->title}}<br>{{$data['start']}}
                                    
                                    @endif
                                </th>
                                <th>@if($course->day == 'Tue')
                                {{$course->title}}<br>{{$data['start']}}
                                    @endif
                                </th>
                                <th>@if($course->day == 'Wed')
                                <h6>Course:</h6><h6>asdasda</h6><br> {{$course->title}}<br>{{$data['start']}}
                                    @endif
                                </th>
                                <th>@if($course->day == 'Thu')
                                {{$course->title}}<br>{{$data['start']}}
                                    @endif
                                </th>
                                <th>@if($course->day == 'Fri')
                                {{$course->title}}<br>{{$data['start']}}
                                    @endif
                                </th>
                                <th>@if($course->day == 'Sat')
                                {{$course->title}}<br>{{$data['start']}}
                                    @endif
                                </th>
                                <th>@if($course->day == 'Sun')
                                {{$course->title}}<br>{{$data['start']}}
                                    @endif
                                </th>
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