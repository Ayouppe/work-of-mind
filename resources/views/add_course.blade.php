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
            <div
                style="width: 400px; margin: 0 auto; margin-top: 50px; background: #2d3748; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <h1 style="text-align: center; color: #4CAF50; margin-bottom: 20px;">Add New Course</h1>
                <form action="{{ url('store_course') }}" method="POST">
                    @csrf

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Select or Enter
                            Course</label>
                        <div>
                            <label>
                                <input type="radio" name="course_option" value="existing"
                                       onchange="toggleCourseInput('existing')" checked>
                                Select Existing Course
                            </label>
                            <label style="margin-left: 20px;">
                                <input type="radio" name="course_option" value="new"
                                       onchange="toggleCourseInput('new')">
                                Enter New Course
                            </label>
                        </div>
                    </div>

                    <!-- Existing Course Selection -->
                    <div id="existing-course-section" style="margin-bottom: 15px;">
                        <label for="existing_course" style="display: block; font-weight: bold; margin-bottom: 5px;">Select
                            Existing Course</label>
                        <select id="existing_course" name="existing_course_id"
                                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                            <option value="" disabled selected>Select a Course</option>
                            @foreach ($existingCourses as $course)
                                <option value="{{ $course->course_code }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- New Course Input -->
                    <div id="new-course-section" style="margin-bottom: 15px; display: none;">
                        <label for="course_name" style="display: block; font-weight: bold; margin-bottom: 5px;">Course
                            Name</label>
                        <input type="text" id="course_name" name="course_name" placeholder="Enter Course Name"
                               style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <label for="course_code" style="display: block; font-weight: bold; margin-bottom: 5px;">Course
                            Code</label>
                        <input type="text" id="course_code" name="course_code" placeholder="Enter Course Code"
                               style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    </div>

                    <!-- Assign to Teacher -->
                    <div style="margin-bottom: 15px;">
                        <label for="teacher" style="display: block; font-weight: bold; margin-bottom: 5px;">Assign to
                            Teacher</label>
                        <select id="teacher" name="teacher_id"
                                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                            <option value="" disabled selected>Select a Teacher</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="text-align: center;">
                        <button type="submit"
                                style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                            Add Course
                        </button>
                    </div>
                </form>
                <div style="text-align: center; margin-top: 15px;">
                    <a href="{{ url('courses') }}" style="text-decoration: none; color: #4CAF50; font-weight: bold;">Back
                        to All Courses</a>
                </div>
            </div>

            <script>
                function toggleCourseInput(option) {
                    const existingCourseSection = document.getElementById('existing-course-section');
                    const newCourseSection = document.getElementById('new-course-section');

                    if (option === 'existing') {
                        existingCourseSection.style.display = 'block';
                        newCourseSection.style.display = 'none';
                    } else if (option === 'new') {
                        existingCourseSection.style.display = 'none';
                        newCourseSection.style.display = 'block';
                    }
                }
            </script>


            @include('footer')
        </div>
    </div>
    <!-- JavaScript files-->
@include('js')
</body>
</html>
