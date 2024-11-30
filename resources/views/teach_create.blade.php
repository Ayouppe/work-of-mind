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

        <div style="width: 50%; margin: 50px auto; margin-top: 50px; background: #2d3748; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h1 style="text-align: center; color: #4CAF50; margin-bottom: 20px;">Add New Teacher</h1>

            <div class="container" style="flex: 1; padding: 20px; background-color: #1b1e21; min-height: 100vh;">
                @if(session()->has('message'))
                    <div class="alert alert-success text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

            <form action="{{ url('cre_tech') }}" method="POST" >
                @csrf

                <div style="margin-bottom: 20px;">
                    <label for="name" style="display: block; margin-bottom: 5px; margin-left: 0; font-weight: bold;">Name:</label>
                    <input type="text" id="name" name="name" required
                           style="width: 90%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
                    <input type="email" id="email" name="email" required
                           style="width: 90%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="password" style="display: block; margin-bottom: 5px; font-weight: bold;">Password:</label>
                    <input type="password" id="password" name="password" required
                           style="width: 90%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                </div>

                <button type="submit"
                        style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                    Create Teacher
                </button>
            </form>
        </div>

        @include('footer')
    </div>
</div>
<!-- JavaScript files-->
@include('js')
</body>
</html>
