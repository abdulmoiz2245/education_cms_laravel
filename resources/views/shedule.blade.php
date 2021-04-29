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
                            <div class="row">
                                <div class="col-md-4">
                            <label for="" class="w-100 col-md-4" >Month</label>
                            <input type="month" class="col-md-7" name="month" value="{{$month}}">
                            </div>
                                 <div class="col-md-4">
                            <label for="" class="w-100  col-md-4">Week</label>
                            <input type="number"  class="col-md-7"  name="week"  value="{{$week}}" min="1" max="5"><br><br>
                                     </div>
                                 <div class="col-md-3">
                                <input type="submit" class="btn btn-dark" value="Filter">
                                 </div>
                             </div>
                        </form>
                        
                        <br><hr>
                        <table class="table table-bordered">
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
                                ?>
                                <th>@if($course->day == 'Mon')
                                 <h6>Course: <strong>{{$course->title}}</strong> </h6><br><p class="text-nowrap">{{$data['start']}}</p>
                                    
                                    @endif
                                </th>
                                <th>@if($course->day == 'Tue')
                                <h6>Course: <strong>{{$course->title}}</strong> </h6><br><p class="text-nowrap">{{$data['start']}}</p>
                                    @endif
                                </th>
                                <th>@if($course->day == 'Wed')
                                    <h6>Course: <strong>{{$course->title}}</strong> </h6><br><p class="text-nowrap">{{$data['start']}}</p>
                                    @endif
                                </th>
                                <th>@if($course->day == 'Thu')
                                <h6>Course: <strong>{{$course->title}}</strong> </h6><br><p class="text-nowrap">{{$data['start']}}</p>
                                    @endif
                                </th>
                                <th>@if($course->day == 'Fri')
                                <h6>Course: <strong>{{$course->title}}</strong> </h6><br><p class="text-nowrap">{{$data['start']}}</p>
                                    @endif
                                </th>
                                <th>@if($course->day == 'Sat')
                                <h6>Course: <strong>{{$course->title}}</strong> </h6><br><p class="text-nowrap">{{$data['start']}}</p>
                                    @endif
                                </th>
                                <th>@if($course->day == 'Sun')
                                <h6>Course: <strong>{{$course->title}}</strong> </h6><br><p class="text-nowrap">{{$data['start']}}</p>
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
//  $(function () {
//    
//    $(document).ready(function() {
//        $('table').DataTable();
//    } );
//    
//  });
</script>
@endsection