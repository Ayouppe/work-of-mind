<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin</title>
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

        <div style="width: 80%; margin: 30px auto; margin-top: 50px; background: #2d3748; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h1 style="text-align: center; color: #4CAF50; margin-bottom: 20px; margin-top: 10px;">All Teachers With Courses</h1>

            <!-- Teachers table -->
            <table style="width: 100%; border-collapse: collapse; text-align: center;">
                <thead>
                <tr style="background-color: #f5f5f5; color: #333; border-bottom: 2px solid #ddd;">
                    <th style="padding: 10px;">Name</th>
                    <th style="padding: 10px;">Email</th>
                    <th style="padding: 10px;">Registration Number</th>
                    <th style="padding: 10px;">Assigned Courses</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;">{{ $teacher->name }}</td>
                        <td style="padding: 10px;">{{ $teacher->email }}</td>
                        <td style="padding: 10px;">{{ $teacher->registration_number }}</td>
                        <td style="padding: 10px;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <thead>
                                <tr style="background-color: #e6f7ff; color: #0056b3; font-size: 14px;">
                                    <th style="padding: 8px;">Course Name</th>
                                    <th style="padding: 8px;">Enrolled Students</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teacher->taughtCourses as $course)
                                    <tr style="background-color: #f9f9f9;">
                                        <td style="padding: 8px; font-size: 16px; font-weight: bold; color: #333;">{{ $course->name }}</td>
                                        <td style="padding: 8px; font-size: 14px;">
                                            <ul style="list-style: none; padding-left: 0; margin: 0;">
                                                @foreach($course->students as $student)
                                                    <li style="margin-bottom: 4px; color: #555;">
                                                        <span style="font-weight: bold; color: #007bff;">{{ $student->name }}</span>
                                                        <br>
                                                        <span style="font-size: 12px;">{{ $student->email }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @include('footer')
    </div>
</div>
<!-- JavaScript files-->
@include('js')
</body>
</html>
