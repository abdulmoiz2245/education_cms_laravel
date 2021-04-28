<?php

namespace App\Http\Controllers;

use App\Models\planings;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\student_courses;

use DateTime;
use Request;

class PlaningsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $request;

    public function __construct(\Illuminate\Http\Request $request)
    {
        $this->request = $request;
    }
     public function getFirstandLastDate($year, $month, $week) {

        $thisWeek = 1;
    
        for($i = 1; $i < $week; $i++) {
            $thisWeek = $thisWeek + 7;
        }
    
        $currentDay = date('Y-m-d',mktime(0,0,0,$month,$thisWeek,$year));
    
        $monday = strtotime('monday this week', strtotime($currentDay));
        $sunday = strtotime('sunday this week', strtotime($currentDay));
        
        $data['weekStart'] = date('Y-m-d H:i:s', $monday);
        $data['weekEnd'] = date('Y-m-d H:i:s', $sunday);
    
        return $data;
    }
    public function index($year = 2021, $month = 4, $week = 5 ,Request $request )
    {
       

        if ($this->request->isMethod('post'))
        {
            $day = explode('-', $this->request->input('month'));
            $year = (int)$day[0];
            $month =  (int)$day[1];
            $week =  (int)$this->request->input('week');
        }
      

        $courses = CourseClass::all();
        $course_list = array();
        $data = $this->getFirstandLastDate($year, $month, $week);
        // dd($data);
        
       
        foreach($courses as $course){
            $course_start = new DateTime($course->start);
            $course_end = new DateTime($course->end);
            $weekStart = $data['weekStart'];
            $weekEnd = $data['weekEnd'];
            $weekStart = new DateTime($weekStart);
            $weekEnd  = new DateTime($weekEnd);
            if(($course_start >= $weekStart  && ($course_start <= $weekEnd))){
                array_push($course_list , $course);
            }
        }
        $data = [
            'course_list'  => $course_list,
            'week' => $week ,
            'month'   => $this->request->input('month'),
            
        ];
        return view('shedule')->with($data) ;
    }
    public function course($course_id = 1 , $year = 2021, $month = 4, $week = 5 ,Request $request )
    {
        
        if ($this->request->isMethod('post'))
        {
            $day = explode('-', $this->request->input('month'));
            $year = (int)$day[0];
            $month =  (int)$day[1];
            $week =  (int)$this->request->input('week');
        }
      
        $course_id = 1;
        $courses = CourseClass::where('course_id' , $course_id)->get();
        
        $course_list = array();
        $data = $this->getFirstandLastDate($year, $month, $week);
        // dd($data);
        
       
        foreach($courses as $course){
            $course_start = new DateTime($course->start);
            $course_end = new DateTime($course->end);
            $weekStart = $data['weekStart'];
            $weekEnd = $data['weekEnd'];
            $weekStart = new DateTime($weekStart);
            $weekEnd  = new DateTime($weekEnd);
            if(($course_start >= $weekStart  && ($course_start <= $weekEnd))){
                array_push($course_list , $course);
            }
        }
        $data = [
            'course_list'  => $course_list,
            'week' => $week ,
            'month'   => $this->request->input('month'),
            
        ];
        return view('shedule')->with($data);
    }


    public function student($student_id ,$year = 2021, $month = 4, $week = 5 ,Request $request )
    {
       

        if ($this->request->isMethod('post'))
        {
            $day = explode('-', $this->request->input('month'));
            $year = (int)$day[0];
            $month =  (int)$day[1];
            $week =  (int)$this->request->input('week');
        }
      
        $student_courses_id = student_courses::select('course_id')->where('student_id' , $student_id)->get();
        $course_id = array();
        foreach ($student_courses_id as $student_courses_id1) {
            array_push($course_id , $student_courses_id1->course_id );
        }
        
        $courses = CourseClass::whereIn('course_id' , $course_id)->get();
        //$courses = CourseClass::all();
        $course_list = array();
        $data = $this->getFirstandLastDate($year, $month, $week);
        // dd($data);
        
       
        foreach($courses as $course){
            $course_start = new DateTime($course->start);
            $course_end = new DateTime($course->end);
            $weekStart = $data['weekStart'];
            $weekEnd = $data['weekEnd'];
            $weekStart = new DateTime($weekStart);
            $weekEnd  = new DateTime($weekEnd);
            if(($course_start >= $weekStart  && ($course_start <= $weekEnd))){
                array_push($course_list , $course);
            }
        }
        $data = [
            'course_list'  => $course_list,
            'week' => $week ,
            'month'   => $this->request->input('month'),
            
        ];
        return view('shedule')->with($data) ;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\planings  $planings
     * @return \Illuminate\Http\Response
     */
    public function show(planings $planings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\planings  $planings
     * @return \Illuminate\Http\Response
     */
    public function edit(planings $planings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\planings  $planings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, planings $planings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\planings  $planings
     * @return \Illuminate\Http\Response
     */
    public function destroy(planings $planings)
    {
        //
    }
}
