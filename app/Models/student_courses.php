<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_courses extends Model
{
    use HasFactory;
    protected $fillable = [ 'course_id' , 'student_id' ];
}
