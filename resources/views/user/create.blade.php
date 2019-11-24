@extends('layouts.app')
@section('title' , 'مستخدم جديد')
@section('content')
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">اضافة مستخدم جديد</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('user.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">الاسم</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">البريد</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">كلمة السر</label>

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
                                <label for="password-confirm" class="col-md-4 control-label">تاكيد كلمة السر</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                    <label for="phone" class="col-md-4 control-label">رقم الهاتف</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="number" class="form-control" name="phone" value="">
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">نوع المستخدم   </label>
                                    <div class="col-md-6">
                                        <select name="user_type_id"  class="form-control" >
                                            @foreach ($types as $user_type_id)
                                                <option value="{{ $user_type_id->id }}" {{ ($user_type_id->id==$user_type_id->user_type_id)?'selected' :'' }}>
                                                    {{ $user_type_id->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            
                            <div class="form-group">
                                    <label for="city_id" class="col-md-4 control-label">المنطقة</label>
                                    <div class="col-md-6">
                                        <select name="city_id" id="city_id" class="form-control">
                                            <option value=""></option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="office_id" class="col-md-4 control-label">المكتب</label>
                                    <div class="col-md-6">
                                        <select name="office_id" id="office_id" class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                            </div>


                            <hr>
                            <div class="form-group">
                                <div class="col-md-4"></div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">انشاء المستخدم</button>
                                </div>
                                <div class="col-md-3"><a href="/user" class="btn btn-danger">إلغاء</a></div>
                            </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $('document').ready(function(){
            $("#city_id").change(
                function () {
                    var id = $(this).val();
                    $.get('/city-offices-list/'+id,
                        function(data){
                            var options = '<option></option>' ;
                            $.each(data , function (key , value) {
                                options += '<option value='+value.id+'>'+value.name+'</option>';
                            });
                            $('#office_id').html(options);
                        });

                }
            );
        });
    </script>
@endsection

