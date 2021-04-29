<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::group(['prefix'=>'teacher'] , function(){
//     Route:group(['middleware' => 'guest:teacher'] , function(){
//         Route::get('login' , [App\Http\Controllers\TeacherController::class, 'loginForm'])->name('teacher.login');
//         Route::post('login' , [App\Http\Controllers\TeacherController::class, 'authenticate'])->name('teacher.auth');

//     });
//     Route::group(['middleware' => 'teacher.auth'] , function(){
//         Route::view('dashboard' , 'admin.dashboard')->name('dashboard');
//     });
// });

Route::prefix('teacher')->group(function () {
    Route::middleware('guest:teacher')->group(function () {
        Route::view('login' , 'teacher.login')->name('teacher.login');
        
        Route::post('login' , [App\Http\Controllers\TeacherController::class, 'login'])->name('teacher.auth');
    });
    Route::middleware('teacher.auth')->group(function () {
        Route::get('/teacher' ,  [App\Http\Controllers\TeacherController::class, 'view'])->name('teacher');
    });
 
});

Route::get('/teacher' ,  [App\Http\Controllers\TeacherController::class, 'view'])->name('teacher');
Route::get('/teacher/class/{id}' ,  [App\Http\Controllers\TeacherController::class, 'class'])->name('teacher.class');
Route::get('/teacher/shedule' ,  [App\Http\Controllers\TeacherController::class, 'shedule'])->name('teacher.shedule');
Route::get('/teacher/class/edit/{id}' ,  [App\Http\Controllers\CourseClassController::class, 'edit'])->name('');
Route::get('/teacher/class/delete/{id}' ,  [App\Http\Controllers\CourseClassController::class, 'destroy'])->name('teacher.class.delete');

Route::post('/teacher/class/edit/{id}' ,  [App\Http\Controllers\CourseClassController::class, 'update'])->name('teacher.class.edit');
Route::get('/teacher/class/create/' ,  [App\Http\Controllers\CourseClassController::class, 'create'])->name('teacher.class.create');
Route::post('/teacher/class/create/' ,  [App\Http\Controllers\CourseClassController::class, 'store'])->name('teacher.class.create');
Route::get('/shedule' ,  [App\Http\Controllers\PlaningsController::class, 'index'])->name('shedule');
Route::post('/shedule' ,  [App\Http\Controllers\PlaningsController::class, 'index'])->name('shedule');
Route::get('/shedule_course/{id}' ,  [App\Http\Controllers\PlaningsController::class, 'course'])->name('shedule');
Route::post('/shedule_course/{id}' ,  [App\Http\Controllers\PlaningsController::class, 'course'])->name('shedule');


Route::get('/student' ,  [App\Http\Controllers\HomeController::class, 'view'])->name('student');
Route::get('/student/class/{id}' ,  [App\Http\Controllers\HomeController::class, 'class'])->name('teacher.class');
Route::get('/shedule_student/{id}' ,  [App\Http\Controllers\PlaningsController::class, 'student'])->name('shedule.student');
Route::post('/shedule_student/{id}' ,  [App\Http\Controllers\PlaningsController::class, 'student'])->name('shedule.student');
Route::get('/student' ,  [App\Http\Controllers\HomeController::class, 'view'])->name('student');
Route::get('/student/register_course/{id}' ,  [App\Http\Controllers\StudentCoursesController::class, 'create'])->name('student.register');
Route::post('/student/register_course/{id}' ,  [App\Http\Controllers\StudentCoursesController::class, 'store'])->name('student.register');
Route::get('/student/class/delete/{id}' ,  [App\Http\Controllers\StudentCoursesController::class, 'destroy'])->name('teacher.class.destroy');