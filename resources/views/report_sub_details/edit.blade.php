@extends('layouts.app') 
@section('title' , 'تعديل بيانات تفصيل بند فرعي')
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
            <h3 class="box-title">   تعديل البيانات    </h3>
        </div>
        <div class="box-body">


            <form id="send"  method="POST" action="{{route('report_sub_details.update',$reportSubDetail->id)}}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                
                <div class="row">
                        <div class="col-lg-4">
                            <label>تفصيل البند : </label>
                        <input placeholder="الاسم" name="name" class="form-control" required value="{{ $reportSubDetail->name }}"
                             pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z0-9\s]{1,300}"    
                            oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال الاسم')"
                            oninput="this.setCustomValidity('')">
                        </div>
    
                        <div class="col-lg-4">
                            <label>نوع البند  : </label>
                            <select class="form-control" name="report_sub_type_id" required  
                                oninvalid="this.setCustomValidity('عفوا ! الرجاء اختيار بند')"
                                oninput="this.setCustomValidity('')">
                                <option value="{{null}}"> اختر</option>
                                @foreach ($report_sub_types as $key => $value)
                                    <option value="{{$value->id}}" {{ ($reportSubDetail->report_sub_type_id == $value->id)?'selected' : '' }}> 
                                        {{$value->name}}
                                    </option>
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
