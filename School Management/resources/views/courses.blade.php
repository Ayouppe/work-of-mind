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
    @include('links')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
@include('header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('sidebar')
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
            <h1 style="margin-bottom: 20px; color: #4CAF50;">All Courses</h1>

            <!-- Add New Course Button -->
            <button onclick="window.location='{{url('add_course')}}'"
                    style="
                margin-top: 10px;
                margin-bottom: 20px;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            ">
                Create New Course
            </button>

            <!-- Courses Table -->
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
                    <th style="
            padding: 10px;
            border: 1px solid #ddd;
        ">ID</th>
                    <th style="
            padding: 10px;
            border: 1px solid #ddd;
        ">Course Name</th>
                    <th style="
            padding: 10px;
            border: 1px solid #ddd;
        ">Course Code</th>
                    <th style="
            padding: 10px;
            border: 1px solid #ddd;
        ">Teacher</th>
                    <th style="padding: 10px;">Edit</th>
                    <th style="padding: 10px;">Action</th>
                </tr>
                </thead>
                @foreach($courses as $course)
                    <tbody style="background-color: #2d3748; color: white;">
                    <tr>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $course->id }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $course->name }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $course->course_code }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">
                            {{ $course->teacher ? $course->teacher->name : 'Not Assigned' }}
                        </td>
                        <td style="padding: 10px;">
                            <!-- Edit button -->
                            <button onclick="window.location='{{url('edit_course',$course->id)}}'"
                                    style="padding: 5px 10px; background-color: #ffc107; color: white; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">
                                Edit
                            </button>
                        </td>
                        <td>
                            <a href="{{ url('delete_course',$course->id) }}"  style="padding: 5px 10px; background-color: #dc3545; color: white; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;"
                               onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>

        </div>

        @include('footer')
    </div>
</div>
<!-- JavaScript files-->
@include('js')
</body>
</html>
