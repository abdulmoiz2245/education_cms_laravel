<?php

namespace App\Http\Controllers;

use App\Models\CourseClass;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher_id = 1;
        $courses =  Course::all();
      
        return view('teacher.creat_class')->with('courses' , $courses);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        unset($request['_token']);
        CourseClass::create($request->all());
      
        return redirect()->route('teacher.class.create')
        ->with('success','Class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\course_class  $course_class
     * @return \Illuminate\Http\Response
     */
    public function show(CourseClass $CourseClass)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\course_class  $course_class
     * @return \Illuminate\Http\Response
     */
    public function edit( $id , CourseClass $CourseClass)
    {
        //$teacher_course = Course::where('id' , $course_id)->first();
        $class =  CourseClass::where('id' , $id)->first();
        return view('teacher.class_edit')->with('class' , $class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\course_class  $course_class
     * @return \Illuminate\Http\Response
     */
    public function update( $id,Request $request, CourseClass $CourseClass)
    {
        $input = $request->all();
        $class = CourseClass::find($id);
        $class->title = $request->input('title');
        $class->start = $request->input('start');
        $class->end = $request->input('end');
        $class->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\course_class  $course_class
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , CourseClass $CourseClass)
    {
        $CourseClass = CourseClass::find($id);
        $CourseClass->delete();
        return redirect()->back();

    }
}
