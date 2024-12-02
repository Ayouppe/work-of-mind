<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\student;
use App\Models\teacher;
use App\Models\enrollment;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function redirect(){

        return view('index');
    }

    public function student(){

        $students = User::where('user_type', 'student')->with('enrollments.course')->get();

        return view('student',compact('students'));

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = student::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user]);
    }

    public function index()
    {
        $students = User::all();
        return view('student', compact('students'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (User::where('email', $validated['email'])->exists()) {
            return redirect()->back()->with('message', 'The email is already in use. Please try another email.');
        }

        $student = new User();
        $student->name = $validated['name'];
        $student->email = $validated['email'];
        $student->password = bcrypt($validated['password']);
        $student->registration_number = '2024-' . sprintf('%04d', User::count() + 1);
        $student->user_type = 'student';

        $student->save();

        return redirect()->back()->with('message', 'Student added successfully.');
    }


    public function teacher()
    {
        $teachers = User::where('user_type', 'teacher')->with('taughtCourses')->get();
        return view('teacher', compact('teachers'));
    }


    public function teach_create(){

        return view('teach_create');
    }

    public function cre_tech(Request $request){

        if (User::where('email',$request->email)->exists()) {
            return redirect()->back()->with('message', 'The email is already in use. Please try another email.');
        }

        $techer = new User();

        $techer->name = $request->name;
        $techer->email = $request->email;
        $techer->user_type = 'teacher';
        $techer->registration_number = '20-2024-' . sprintf('%04d', User::count() + 1);
        $techer->password = Hash::make($request->password);
//        $techer->password = Hash::make($request->password_confirmation);

        $techer->save();

        return redirect()->back()->with('message', 'Teacher added successfully.');

    }

    public function courses(){

        $courses = course::all();

        return view('courses',compact('courses'));
    }

    public function add_course(Request $request){

        $existingCourses = Course::all();
        $teachers = User::where('user_type', 'teacher')->get();

        return view('add_course',compact('teachers','existingCourses'));
    }

    public function store_course(Request $request)
    {

        if ($request->teacher_id) {
            $courseCount = Course::where('user_id', $request->teacher_id)->count();

            if ($courseCount >= 3) {
                return redirect()->back()->with('message', 'This teacher cannot teach more than 3 courses.');
            }
        }
        if ($request->existing_course_id) {
            $existingCourse = Course::where('course_code', $request->existing_course_id)->first();

            if ($existingCourse && $existingCourse->user_id) {
                return redirect()->back()->with('message', 'This course is already assigned to a teacher.');
            }

            if ($existingCourse) {
                $existingCourse->user_id = $request->teacher_id;
                $existingCourse->save();

                return redirect()->back()->with('message', 'Existing course assigned to teacher successfully.');
            }
        } else {
            $courses = new Course();
            $courses->course_code = $request->course_code;
            $courses->name = $request->course_name . '-' . $request->course_code;
            if ($request->teacher_id) {
                $courses->user_id = $request->teacher_id;
            }

            $courses->save();

            if ($request->teacher_id) {
                return redirect()->back()->with('message', 'New course created and assigned to teacher successfully.');
            } else {
                return redirect()->back()->with('message', 'New course created successfully, but no teacher assigned.');
            }
        }

        return redirect()->back()->with('message', 'Something went wrong. Please try again.');
    }


    public function all(){

        $teachers = User::where('user_type', 'teacher')
            ->with('taughtCourses.students') // Eager load courses and students
            ->get();

        return view('all',compact('teachers'));
    }

    public function edit_student($id){

        $student = User::find($id);

        return view('edit_student',compact('student'));

    }

    public function delete_student($id){

        $student = User::find($id);
        $student->delete();

        return redirect()->back()->with('message', 'The student has been deleted successfully');
    }

    public function edit_student_confirm(Request $request, $id){


        $student = User::find($id);

        $emailExists = User::where('email', $request->email)
            ->where('id', '!=', $id)
            ->exists();

        $registrationNumberExists = User::where('registration_number', $request->registration_number)
            ->where('id', '!=', $id)
            ->exists();

        if ($emailExists) {
            return redirect()->back()->with('message', 'The email address is already in use.');
        }

        if ($registrationNumberExists) {
            return redirect()->back()->with('message', 'The registration number is already in use.');
        }

        $student->name = $request->name;
        $student->email = $request->email;
        $student->registration_number = $request->registration_number;

        $student->save();

        return redirect()->back()->with('message', 'Student updated successfully!');

    }


    public function edit_teacher($id){

        $teacher = User::find($id);

        return view('edit_teacher',compact('teacher'));

    }

    public function delete_teacher($id){

        $teacher = User::find($id);

        $teacher->delete();

        return redirect()->back()->with('message', 'The teacher has been deleted successfully');
    }

    public function edit_teacher_confirm(Request $request, $id)
    {
        $teacher = User::find($id);

        $emailExists = User::where('email', $request->email)
            ->where('id', '!=', $id)
            ->exists();

        $registrationNumberExists = User::where('registration_number', $request->registration_number)
            ->where('id', '!=', $id)
            ->exists();

        if ($emailExists) {
            return redirect()->back()->with('message', 'The email address is already in use.');
        }

        if ($registrationNumberExists) {
            return redirect()->back()->with('message', 'The registration number is already in use.');
        }

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->registration_number = $request->registration_number;
        $teacher->save();

        return redirect()->back()->with('message', 'Teacher updated successfully!');
    }

    public function edit_course($id){

        $course = Course::find($id);
        $teachers = User::where('user_type', 'teacher')->get();

        return view('edit_course',compact('course','teachers'));

    }

    public function delete_course($id){

        $course = course::find($id);
        $course->delete();

        return redirect()->back()->with('message', 'The course has been deleted successfully');
    }

    public function edit_course_confirm(Request $request, $id)
    {

        $existingCourse = Course::where('course_code', $request->course_code)->where('id', '!=', $id)->first();
        if ($existingCourse) {
            return redirect()->back()->with('message', 'Course code already exists.');
        }

        if ($request->teacher_id) {
            $courseCount = Course::where('user_id', $request->teacher_id)->count();

            if ($courseCount >= 3) {
                return redirect()->back()->with('message', 'This teacher cannot teach more than 3 courses.');
            }
        }

        $course = Course::find($id);

        $course->name = $request->name;
        $course->course_code = $request->course_code;
        $course->user_id = $request->teacher_id;
        $course->save();

        return redirect()->back()->with('message', 'Course updated successfully!');
    }

    public function admins(){

        $admins = User::where('user_type', 'admin')->get();

        return view('admins',compact('admins'));
    }

    public function add_admin(Request $request){

        $emailExists = User::where('email', $request->email)
            ->exists();

        if ($emailExists) {
            return redirect()->back()->with('message', 'The email address is already in use.');
        }

        $admin = new User();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->user_type = 'admin';
        $admin->registration_number = '10-2024-' . sprintf('%04d', User::count() + 1);


        $admin->save();

        return redirect()->back()->with('message','The Admin has been created successfully');

    }

    public function delete_admin($id){

        $admin = User::find($id);

        $admin->delete();

        return redirect()->back()->with('message','The Admin has been deleted successfully');

    }

}
