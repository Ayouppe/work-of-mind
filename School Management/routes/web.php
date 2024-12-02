<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('showLoginForm');
//});

Route::get('/',[AuthController::class,'showLoginForm']);

//Admin
Route::middleware(['auth', 'admin'])->group(function () {
Route::get('/redirect',[App\Http\Controllers\Controller::class,'redirect']);
Route::get('/student',[App\Http\Controllers\Controller::class,'student']);
Route::get('/teacher',[App\Http\Controllers\Controller::class,'teacher']);
Route::get('/teach_create',[App\Http\Controllers\Controller::class,'teach_create']);
Route::post('/cre_tech',[App\Http\Controllers\Controller::class,'cre_tech']);
Route::get('/courses',[App\Http\Controllers\Controller::class,'courses']);
Route::get('/add_course',[App\Http\Controllers\Controller::class,'add_course']);
Route::post('/store_course',[App\Http\Controllers\Controller::class,'store_course']);
Route::get('/all',[App\Http\Controllers\Controller::class,'all']);

//edit and delete student
Route::get('/edit_student/{id}',[App\Http\Controllers\Controller::class,'edit_student']);
Route::get('/delete_student/{id}',[App\Http\Controllers\Controller::class,'delete_student']);
Route::post('/edit_student_confirm/{id}',[App\Http\Controllers\Controller::class,'edit_student_confirm']);

//edit and delete teacher
    Route::get('/edit_teacher/{id}',[App\Http\Controllers\Controller::class,'edit_teacher']);
    Route::get('/delete_teacher/{id}',[App\Http\Controllers\Controller::class,'delete_teacher']);
    Route::post('/edit_teacher_confirm/{id}',[App\Http\Controllers\Controller::class,'edit_teacher_confirm']);

    //edit and delete courses
    Route::get('/edit_course/{id}',[App\Http\Controllers\Controller::class,'edit_course']);
    Route::get('/delete_course/{id}',[App\Http\Controllers\Controller::class,'delete_course']);
    Route::post('/edit_course_confirm/{id}',[App\Http\Controllers\Controller::class,'edit_course_confirm']);

    //admins managements
    Route::get('/admins',[App\Http\Controllers\Controller::class,'admins']);
    Route::post('/add_admin',[App\Http\Controllers\Controller::class,'add_admin']);
    Route::get('/delete_admin/{id}',[App\Http\Controllers\Controller::class,'delete_admin']);

    Route::get('/students', [\App\Http\Controllers\Controller::class, 'index'])->name('students.index'); // List students
Route::get('/students/create', [\App\Http\Controllers\Controller::class, 'create'])->name('students.create'); // Add Student Page
Route::post('/students/store', [\App\Http\Controllers\Controller::class, 'store'])->name('students.store'); // Store new student
});

//student
Route::middleware(['auth', 'student'])->group(function () {
Route::get('/student_courses',[StudentController::class,'student_courses']);
Route::post('/enroll', [StudentController::class, 'enroll'])->name('enroll');
Route::get('/enrolled_courses',[StudentController::class,'enrolled_courses']);
});

//teacher
Route::middleware(['auth', 'teacher'])->group(function () {
Route::get('/assigned_courses',[TeacherController::class,'assigned_courses']);
});

Route::post('student/login', [\App\Http\Controllers\Controller::class, 'login']);
Route::post('teacher/login', [\App\Http\Controllers\Controller::class, 'login']);


//login

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//redirections
Route::get('/teacher/dashboard', function () {
    return 'Welcome, Teacher!';
})->name('teacher.dashboard');

Route::get('/student/dashboard', function () {
    return 'Welcome, Student!';
})->name('student.dashboard');
