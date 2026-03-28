<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('admin/css/fontawesome-css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap-css/bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap-css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap-css/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/adminlte-css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/overlayscrollbars/overlayscrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/sweetalert2/bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('image/logo.jpg')}}" alt="AdminLTELogo" height="60" width="60">
        </div> -->
        <!-- Top Navbar -->
        @include('admin.partials.navbar')
        @include('admin.partials.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('admin.partials.footer')
    </div>
    <script src="{{asset('admin/js/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery-ui/jquery-ui.js')}}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{asset('admin/js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/chart/chart.min.js')}}"></script>
    <script src="{{asset('admin/js/sparklines/sparklines.js')}}"></script>
    <script src="{{asset('admin/js/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/js/daterangpicker/daterangpicker.js')}}"></script>
    <script src="{{asset('admin/js/overlayscrollbars/overlayscrollbars.min.js')}}"></script>
    <script src="{{asset('admin/js/adminlte/adminlte.min.js')}}"></script>
    <script src="{{asset('admin/js/validate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/js/validate/additional-methods.min.js')}}"></script>
    <script src="{{asset('admin/js/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('admin/js/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    @include('admin.partials.toast')
    @yield('scripts')
</body>
</html>