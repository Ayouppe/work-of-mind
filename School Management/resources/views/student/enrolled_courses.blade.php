<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    @include('student.links')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
@include('student.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('student.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">

        <div class="container" style="flex: 1; padding: 20px; background-color: #1b1e21; min-height: 100vh;">
            @if(session()->has('message'))
                <div class="alert alert-success text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif

            <div style="
    width: 80%;
    margin: 50px auto;
    background: #2d3748;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
">
                <h1 style="margin-bottom: 20px; color: #4CAF50;">My Enrolled Courses</h1>

                <table style="
        border-collapse: collapse;
        width: 100%;
        text-align: center;
        margin: auto;
        border: 1px solid #ddd;
        background-color: white;
    ">
                    <thead>
                    <tr style="background-color: white; color: black;">
                        <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Course Name</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Course Code</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Teacher</th>
                    </tr>
                    </thead>
                    <tbody style="background-color: #2d3748; color: white;">
                    @forelse ($enrolledCourses as $course)
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;">{{ $course->id }}</td>
                            <td style="padding: 10px; border: 1px solid #ddd;">{{ $course->name }}</td>
                            <td style="padding: 10px; border: 1px solid #ddd;">{{ $course->course_code }}</td>
                            <td style="padding: 10px; border: 1px solid #ddd;">
                                {{ $course->teacher ? $course->teacher->name : 'Not Assigned' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding: 10px; border: 1px solid #ddd; color: red;">
                                You are not enrolled in any courses.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            @include('student.footer')
        </div>
    </div>
    <!-- JavaScript files-->
@include('student.js')
</body>
</html>
