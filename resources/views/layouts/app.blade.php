<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <script src="{{ asset('AdminLTE/plugins/pace/pace.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/pace/pace.css') }}">
        @include('layouts.partials.css')
        @yield('css')
    </head>
    <body class=" hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
                @include('layouts.partials.header')
                @include('layouts.partials.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>

                @include('layouts.partials.footer')
             </div>

        @include('layouts.partials.javascripts')



    <!--   تغير لمة السر model-->
        <div  id="changpasswoerd"  	class="modal fade text-right" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route("changepass")}}" method="post">
                        <div class="modal-header"> تغير كلمة السر:
                            <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <label> كلمة السر القديمة </label>
                            <input name="oldpass" type="password" class="form-control">
                            <label> كلمة السر الجديدة </label>
                            <input  name="password" type="password" class="form-control">
                            <label>تاكيد  كلمة السر الجديدة </label>
                            <input name="password_confirmation" type="password" class="form-control">

                        </div>
                        <div class="modal-footer">
                            <button> تغير</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>



        
    </body>

</html>