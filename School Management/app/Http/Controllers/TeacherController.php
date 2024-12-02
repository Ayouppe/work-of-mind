<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function assigned_courses(){

        // Get the logged-in teacher's information
        $teacher = auth()->user(); // Get the logged-in user (teacher)

        // Fetch the teacher's courses along with the enrolled students
        $teacherCourses = $teacher->taughtCourses()->with('students')->get();

        return view('teacher.assigned_courses',compact('teacherCourses'));
    }
}
