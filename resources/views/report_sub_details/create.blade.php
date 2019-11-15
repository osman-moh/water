@extends('layouts.app') 
@section('title' , 'إدخال تفصيل بند فرعي جديد')
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
            <h3 class="box-title"> تفصيل بند فرعي جديد </h3>
        </div>
        <div class="box-body">

          @if (empty($report_sub_types))

            die('لا يوجد تفصيل بلاغ')

          @endif
            <form id="send"  method="POST" action="{{route('report_sub_details.store')}}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-4">
                        <label>البند : </label>
                    <input placeholder="الاسم" name="name" class="form-control"
                    required  pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z0-9\s]{1,300}"   
                        oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال الاسم')"
                        oninput="this.setCustomValidity('')">
                    </div>

                    <div class="col-lg-4">
                        <label> نوع البند الفرعي : </label>
                        <select class="form-control" name="report_sub_type_id" required  
                            oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر نوع البند')"
                            oninput="this.setCustomValidity('')">
                            <option value="{{null}}"> اختر</option>
                            @foreach ($report_sub_types as $key => $value)
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
