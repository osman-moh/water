@extends('layouts.app') 
@section('title' , 'إدخال بند فرعي جديد')
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
            <h3 class="box-title">  بند جديد  </h3>
        </div>
        <div class="box-body">

          @if (empty($report_types))

          die('لا يوجد نوع بلاغ')

          @endif
            <form id="send"  method="POST" action="{{route('report_sub_types.store')}}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-4">
                        <label>البند : </label>
                    <input placeholder=" اسم البند" name="name" class="form-control"
                    required   pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z0-9\s]{1,300}"   
                        oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال الاسم')"
                        oninput="this.setCustomValidity('')">
                    </div>

                    <div class="col-lg-4">
                        <label>نوع البلاغ  : </label>
                        <select class="form-control" name="report_type_id" required  
                            oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر نوع البلاغ')"
                            oninput="this.setCustomValidity('')">
                            <option value="{{null}}"> اختر</option>
                            @foreach ($report_types as $key => $value)
                                <option value="{{$value->id}}"> {{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div><hr>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        حفظ البند
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
