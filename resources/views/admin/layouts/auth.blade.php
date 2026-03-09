<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('admin/css/fontawesome-css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap-css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/adminlte-css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
    @yield('content')
    <script src="{{asset('admin/js/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/adminlte/adminlte.min.js')}}"></script>
</body>
</html>