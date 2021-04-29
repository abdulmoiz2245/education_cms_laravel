<?php

namespace App\Http\Controllers;

use App\Models\student_courses;
use App\Models\Course;

use Illuminate\Http\Request;

class StudentCoursesController extends Controller
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
        return view('student.course_register')->with('courses' , $courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id , Request $request)
    {
        unset($request['_token']);
        $student_courses = new student_courses;
        
           $student_courses->course_id = $request->input('course_id');
           $student_courses->student_id = $id;
           $student_courses->save();
        
       
        return redirect()->route('student')
        ->with('success','Class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student_courses  $student_courses
     * @return \Illuminate\Http\Response
     */
    public function show(student_courses $student_courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student_courses  $student_courses
     * @return \Illuminate\Http\Response
     */
    public function edit(student_courses $student_courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student_courses  $student_courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student_courses $student_courses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student_courses  $student_courses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,student_courses $student_courses)
    {
        $student_id=1;
        student_courses::where('course_id',$id)->where('student_id',$student_id)->delete();
        return redirect()->back();
    }
}
