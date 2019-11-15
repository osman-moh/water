@extends('layouts.app')
@section('title' , 'تعديل بيانات منطقة')
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
            <h3 class="box-title">   اضافة المناطق الكبري  </h3>
        </div>
        <div class="box-body">
            <form id="send"  method="POST" action="{{route('cities.update',$data->id)}}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                
                <div class="row">
                    <div class="col-lg-6">
                        <label> اسم المنطقة </label>
                        <input placeholder="اسم المنطقة" name="name" class="form-control" required value="{{ $data->name }}"
                                 pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z\s]{1,300}"
                                oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال الاسم')" 
                                oninput="this.setCustomValidity('')"
                                title="يجب ان يحتوي على حروف او ارقام">
                    </div>
                    <div class="col-lg-6"></div>
                </div><hr>
                <div class="row">
                    <div class="col-lg-12"></div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                           حفظ 
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection
