<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{


    public function student_courses(){

        $courses = course::all();

        return view('student.student_courses',compact('courses'));
    }


    public function enroll(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = auth()->user();

        if ($student->user_type !== 'student') {
            return redirect()->back()->with('message', 'Only students can enroll in courses.');
        }

        $existingEnrollment = Enrollment::where('user_id', $student->id)
            ->where('course_id', $request->course_id)
            ->first();

        if ($existingEnrollment) {
            return redirect()->back()->with('message', 'You are already enrolled in this course.');
        }

        $enrollmentCount = Enrollment::where('user_id', $student->id)->count();

        if ($enrollmentCount >= 5) {
            return redirect()->back()->with('message', 'You cannot enroll in more than 5 courses.');
        }

        Enrollment::create([
            'user_id' => $student->id,
            'course_id' => $request->course_id,
        ]);

        return redirect()->back()->with('message', 'You have successfully enrolled in the course.');
    }


    public function enrolled_courses(){

        $courses = course::all();

        $student = auth()->user();

        $enrolledCourses = Course::whereIn('id', function ($query) use ($student) {
            $query->select('course_id')
                ->from('enrollments')
                ->where('user_id', $student->id);
        })->with('teacher')->get();

        return view('student.enrolled_courses',compact('courses','enrolledCourses'));
    }

}
