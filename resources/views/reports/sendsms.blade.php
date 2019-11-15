@extends('layouts.app') 
@section('content')
    @if (Session::has('message'))
        <div class="h3 alert alert-success text-center">{{ Session::get('message') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="box box-default">
        <div class="box-header with-border">
            <h class="box-title"> ارسال رسائل sms </h>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
           <div class="alert-info ">
                    جاري ارسال الرسالة....
           </div>
            <div>
                <input id="phone" type="hidden" name="phone" value="{{$phone1}}">
				<input id="wokerphone" type="hidden" name="wokerphone" value="{{empty($wokerphone)?"":$wokerphone}}">				
                <input id="text" type="hidden" name="text" value="{{$text}}">
			     
            </div>


        </div>
        <div class="box-footer">




        </div>
    </div>




@endsection
@section('javascript')
    <script>
        $(function() {
            phone1 = $("#phone").val();
			wokerphone = $("#wokerphone").val();
			text = $("#text").val();
           
            $.get("http://212.0.129.229/bulksms/" +
                "webacc.aspx?user=watercorp&pwd=8778&smstext="+text+"&Sender=3131&Nums="+phone1+";"+wokerphone+";",
                function(data, status){
                    alert(data);
                    alert(status);
            });
        });
    </script>
@endsection