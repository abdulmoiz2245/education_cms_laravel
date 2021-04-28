<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\TeacherCourses;
use App\Models\CourseClass;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class TeacherController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email' , 'password');
        if(Auth::guard('teacher')->attempt($credentials , $request->remember)){
            $uesr = Teacher::where('email' , $request->email)->first();
            Auth::guard('teacher')->login($uesr);
            
            return redirect()->route('teacher.home');
        }
        return  redirect()->route('teacher.login')->with('staus' , 'Faild to process');
    }

    public function view(){
        $teacher_id = 1;
        $teacher = Teacher::where('id' , $teacher_id)->first();
        $teacher_courses_id = TeacherCourses::select('course_id')->where('teacher_id' , 1)->get();
        $course_id = array();
        foreach ($teacher_courses_id as $teacher_courses_id1) {
            array_push($course_id , $teacher_courses_id1->course_id );
        }
        
        $teacher_courses = Course::whereIn('id' , $course_id)->get();

        return  view('teacher.home')->with('teacher' , $teacher)->
                                    with('teacher_courses' , $teacher_courses);
        

    }

    public function class($id , Request $request){
        $teacher_id  = $request->input('teacher_id');
        $course_id  = $request->input('course_id');
        $teacher_id = 1;
        $course_id  = $id;
        $teacher_course = Course::where('id' , $course_id)->first();
        $classes = CourseClass::where('course_id' , $course_id)->get();

        return  view('teacher.class')->with('classes' , $classes)->
                                    with('teacher_course' , $teacher_course);

    }





    public function shedule(){
        
    }
}
