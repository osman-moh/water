
<html dir="ltr">

    <title> تسجيل الدخول || هيئة مياه ولاية الخرطوم</title>
    @include('layouts.partials.css')


    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <b> هيئة مياه ولاية الخرطوم</b>
            </div>
        
            <div class="login-box-body">
                <p class="login-box-msg"><b> تسجيل الدخول </b></p>
            
                <form action="{{ route('login') }}" method="post" dir="ltr">
                    @csrf
                    <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                         @endif
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control has-error" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                         @endif
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">موافـــق</button>
                        </div>
                        <div class="col-xs-8">
                    
                        </div>
                        <!-- /.col -->
                        
                        <!-- /.col -->
                    </div>
                </form>
            
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
    
    </body>
</html>