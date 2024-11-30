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

        @include('teacher.body')

        @include('teacher.footer')
    </div>
</div>
<!-- JavaScript files-->
@include('teacher.js')
</body>
</html>
