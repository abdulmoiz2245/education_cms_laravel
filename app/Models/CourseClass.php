<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    use HasFactory;
    protected $fillable = ['title' , 'course_id' , 'teacher_id' , 'start' , "end"];
}
