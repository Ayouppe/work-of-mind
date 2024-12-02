<!DOCTYPE html>
<html>
<head>
    <base href="/public">
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
            <div style="width: 60%; margin: 30px auto; background: #2d3748; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <h1 style="text-align: center; color: #4CAF50; margin-bottom: 20px;">Edit Student</h1>

                <form action="{{url('edit_student_confirm',$student->id)}}" method="POST">
                    @csrf
                    <div style="margin-bottom: 20px;">
                        <label for="name" style="display: block; color: white; margin-bottom: 5px;">Name</label>
                        <input type="text" id="name" name="name" value="{{ $student->name }}"
                               style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd;" required>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label for="email" style="display: block; color: white; margin-bottom: 5px;">Email</label>
                        <input type="email" id="email" name="email" value="{{ $student->email }}"
                               style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd;" required>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label for="registration_number" style="display: block; color: white; margin-bottom: 5px;">Registration Number</label>
                        <input type="text" id="registration_number" name="registration_number" value="{{ $student->registration_number }}"
                               style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd;" required>
                    </div>

                    <div style="text-align: center;">
                        <button type="submit"
                                style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                            Update Student
                        </button>
                    </div>
                </form>
            </div>


        @include('footer')
    </div>
</div>
<!-- JavaScript files-->
@include('js')
</body>
</html>
