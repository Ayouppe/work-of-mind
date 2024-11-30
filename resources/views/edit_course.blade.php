<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    @include('links')
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

<div class="container" style="padding: 20px; background-color: #1b1e21; min-height: 100vh;">
    <div style="
            width: 60%;
            margin: auto;
            background: #2d3748;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        ">
        <h1 style="text-align: center; color: #4CAF50; margin-bottom: 20px;">Edit Course</h1>

        <form action="{{ url('edit_course_confirm',$course->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name" style="color: white;">Course Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $course->name }}" required>
            </div>

            <div class="form-group">
                <label for="course_code" style="color: white;">Course Code:</label>
                <input type="text" name="course_code" class="form-control" value="{{ $course->course_code }}" required>
            </div>

            <div class="form-group">
                <label for="assigned_teacher" style="color: white;">Assigned Teacher:</label>
                <p style="color: white;">
                    @if ($course->teacher)
                        {{ $course->teacher->name }}
                    @else
                        No teacher assigned
                    @endif
                </p>
            </div>

            <div class="form-group">
                <label for="teacher_id" style="color: white;">Change Teacher (Optional):</label>
                <select name="teacher_id" class="form-control">
                    <option value="">Select Teacher</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                            {{ $teacher->id == $course->teacher_id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-warning" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">Update Course</button>
        </form>
    </div>
</div>

@include('footer')
@include('js')
</body>
</html>
