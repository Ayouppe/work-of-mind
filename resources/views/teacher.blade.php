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
    <div style="margin: auto; text-align: center">

        <div class="container" style="flex: 1; padding: 20px; background-color: #1b1e21; min-height: 100vh;">
            @if(session()->has('message'))
                <div class="alert alert-success text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif

        <div style="width: 80%; margin: 30px auto; margin-top: 50px; background: #2d3748; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h1 style="text-align: center; color: #4CAF50; margin-bottom: 20px; margin-top: 10px;">Teachers</h1>

            <div style="text-align: center; margin-bottom: 20px;">
                <button onclick="window.location='{{ url('teach_create') }}'"
                        style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                    Create New Teacher
                </button>
            </div>

            <table style="width: 100%; border-collapse: collapse; text-align: center;">
                <thead>
                <tr style="background-color: #f5f5f5; color: #333; border-bottom: 2px solid #ddd;">
                    <th style="padding: 10px;">Name</th>
                    <th style="padding: 10px;">Email</th>
                    <th style="padding: 10px;">Registration Number</th>
                    <th style="padding: 10px;">Assigned Courses</th>
                    <th style="padding: 10px;">Edit</th>
                    <th style="padding: 10px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;">{{ $teacher->name }}</td>
                        <td style="padding: 10px;">{{ $teacher->email }}</td>
                        <td style="padding: 10px;">{{ $teacher->registration_number }}</td>
                        <td style="padding: 10px;">
                            @foreach($teacher->taughtCourses as $course)
                                <span>{{ $course->name }}</span><br>
                            @endforeach
                        </td>
                        <td style="padding: 10px;">

                            <button onclick="window.location='{{url('edit_teacher',$teacher->id)}}'"
                                    style="padding: 5px 10px; background-color: #ffc107; color: white; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">
                                Edit
                            </button>
                        </td>
                        <td>
                            <a href="{{ url('delete_teacher',$teacher->id) }}"  style="padding: 5px 10px; background-color: #dc3545; color: white; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;"
                               onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</a>
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
