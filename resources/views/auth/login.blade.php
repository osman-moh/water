
<html style="
    background: #284ebb;
">

<title> تسجيل الدخول || هيئة مياه ولاية الخرطوم</title>
@include('layouts.partials.css')
<body  style="
    background: #eaf5ea;
">

<div class="container"  style="margin-top: 10%;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default h1">
                <div class="panel-heading">تسجيل الدخول</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}" style="
    background: #eaf5ea;

    font-size: initial;
    font-style: oblique;
">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"><pre>البريد الالكتروني</pre> </label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"><pre>كلمة السر</pre></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">

                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="
    font-size: inherit;
    font-size: medium;
    width: -webkit-fill-available;
    background: #284ebb;
">
                                    دخول
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

