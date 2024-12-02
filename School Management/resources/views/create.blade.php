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

{{--        @include('body')--}}
        <div style="width: 400px; margin: 0 auto; margin-top: 70px; background: #2d3748; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h1 style="text-align: center; color: #4CAF50; margin-bottom: 20px;">Add New Student</h1>

            <div class="container" style="flex: 1; padding: 20px; background-color: #1b1e21; min-height: 100vh;">
                @if(session()->has('message'))
                    <div class="alert alert-success text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

            <form action="{{ route('students.store') }}" method="POST">
                @csrf

                <div style="margin-bottom: 15px;">
                    <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Name:</label>
                    <input type="text" id="name" name="name" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email:</label>
                    <input type="email" id="email" name="email" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px;">Password:</label>
                    <input type="password" id="password" name="password" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="password_confirmation" style="display: block; font-weight: bold; margin-bottom: 5px;">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="text-align: center;">
                    <button type="submit"
                            style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                        Add Student
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
