<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\student_courses;
use App\Models\Course;
use App\Models\CourseClass;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function view(){
        $student_id = 1;
        $student = User::where('id' , $student_id)->first();
        $student_courses_id = student_courses::select('course_id')->where('student_id' , $student_id)->get();
        $course_id = array();
        foreach ($student_courses_id as $student_courses_id1) {
            array_push($course_id , $student_courses_id1->course_id );
        }
        
        $student_courses = Course::whereIn('id' , $course_id)->get();
        $student_class_courses = student_courses::whereIn('course_id' , $course_id)->get();

        return  view('student.home')->with('student' , $student)->
                                    with('student_courses' , $student_courses)->with('student_class_courses' , $student_class_courses);

    }

    public function class($id ,Request $request){
        $teacher_id  = $request->input('teacher_id');
        $course_id  = $request->input('course_id');
        $student_id = 1;
        $course_id  = $id;
        $student_course = Course::where('id' , $course_id)->first();
        $classes = CourseClass::where('course_id' , $course_id)->get();

        return  view('student.class')->with('classes' , $classes)->
                                    with('student_course' , $student_course);

    }

}
