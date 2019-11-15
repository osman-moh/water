<meta name="csrf-token" content="{{ csrf_token() }}"> 
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">

<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.rtl.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-select.css') }}">


<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('AdminLTE/css/AdminLTE.min.css') }}">

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">

<!-- AdminLTE Skins.-->
<link rel="stylesheet" href="{{ asset('AdminLTE/css/skins/skin-blue.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE/css/AdminLTE.rtl.min.css') }}">

<!--link rel="stylesheet" href="{{ asset('plugins/time/jquery.datetimepicker.min.css') }}"-->
<!-- -->
@yield('css')
<!-- app css -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<style>
    .valid{
        border-color: green ;
    }
    .invalid{
        border-color: red;
    }
</style>

