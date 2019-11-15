@extends('layouts.app')
@section('title' , 'تعديل')
@section('content')


    <div class="row" dir="rtl">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel ">
                <div class="panel-heading text-right ">رسالة   </div>

                <div class="panel-body">
                      <p class="text-success" >{{$data}}</p>

                </div>
            </div>
        </div>
    </div>

@endsection