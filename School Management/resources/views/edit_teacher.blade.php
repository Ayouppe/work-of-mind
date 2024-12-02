<!DOCTYPE html>
<html>
<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Teacher</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('links')
</head>
<body>
@include('header')
<div class="d-flex align-items-stretch">
    @include('sidebar')
    <div class="page-content">
        <div class="container" style="flex: 1; padding: 20px; background-color: #1b1e21; min-height: 100vh;">

            @if(session()->has('message'))
                <div class="alert alert-success text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif

            <div style="width: 60%; margin: 30px auto; background: #2d3748; padding: 30px; border-radius: 8px;">
                <h1 style="text-align: center; color: #4CAF50; margin-bottom: 20px;">Edit Teacher</h1>
                <form method="POST" action="{{ url('edit_teacher_confirm', $teacher->id) }}">
                    @csrf
                    <div class="form-group">
                        <label style="color: white;">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $teacher->name }}" required>
                    </div>
                    <div class="form-group">
                        <label style="color: white;">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $teacher->email }}" required>
                    </div>
                    <div class="form-group">
                        <label style="color: white;">Registration Number</label>
                        <input type="text" name="registration_number" class="form-control" value="{{ $teacher->registration_number }}" required>
                    </div>
                    <div style="text-align: center; margin-top: 20px;">
                        <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Update Teacher</button>
                    </div>
                </form>
            </div>
        </div>
        @include('footer')
    </div>
</div>
@include('js')
</body>
</html>
