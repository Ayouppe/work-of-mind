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
    @include('teacher.links')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
@include('teacher.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('teacher.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">

        <div style="width: 80%; margin: 30px auto; margin-top: 50px; background: #2d3748; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h1 style="text-align: center; color: #4CAF50; margin-bottom: 20px; margin-top: 10px;">My Courses</h1>

            <!-- Courses table -->
            <table style="width: 100%; border-collapse: collapse; text-align: center;">
                <thead>
                <tr style="background-color: #f5f5f5; color: #333; border-bottom: 2px solid #ddd;">
                    <th style="padding: 10px;">ID</th>
                    <th style="padding: 10px;">Course Name</th>
                    <th style="padding: 10px;">Enrolled Students</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teacherCourses as $course)
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;">{{ $course->id }}</td>
                        <td style="padding: 10px;">{{ $course->name }}</td>
                        <td style="padding: 10px;">
                            @if($course->students->count() > 0)
                                <ul>
                                    @foreach($course->students as $student)
                                        <li>{{ $student->name }} ({{ $student->email }})</li>
                                    @endforeach
                                </ul>
                            @else
                                <span>No students enrolled yet.</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


        @include('teacher.footer')
    </div>
</div>
<!-- JavaScript files-->
@include('teacher.js')
</body>
</html>
