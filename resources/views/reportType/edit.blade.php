@extends('layouts.app')
@section('title' , 'تعديل نوع البلاغ')
@section('content')
    @if (Session::has('status'))
        <div class="alert alert-info">{{ Session::get('status') }}</div>
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
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">  تعديل انواع البلاغات    </h3>
        </div>
        <div class="box-body">
            <form id="send"  method="POST" action="{{route('reportType.update',$data->id)}}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <div class="row">
                    <div class="col-lg-6">
                        <label> الاسم : </label>
                            <input placeholder="نوع البلاغ" name="type" class="form-control" value="{{ $data->name }}"
                            required  pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z0-9\s]{1,300}"
                            oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال نوع المسخدم')" 
                            oninput="this.setCustomValidity('')"
                            title="يجب ان يحتوي على حروف او ارقام">
                        </div>
                        <div class="col-lg-6"></div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            حفظ 
                        </button>
                    </div>
            </form>

        </div>
    </div>
@endsection
