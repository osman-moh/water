@extends('layouts.app')
@section('title' , 'لا توجد صلاحية للدخول')
@section('content')
    <div class="container">
       <div class="panel panel-danger">
           <div class="panel-body">
                           ليس لديك صلاحيات هنا
           </div>
           <div class="panel-footer">
                         <a href="{{url('/')}}">
                             رجوع
                         </a>
           </div>

       </div>
    </div>
@endsection
