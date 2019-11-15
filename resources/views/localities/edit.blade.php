@extends('layouts.app') 
@section('title' , 'تعديل بيانات محلية')
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
            <h3 class="box-title">   تعديل محلية    </h3>
        </div>
        <div class="box-body">


            <form id="send"  method="POST" action="{{route('localities.update',$data->id)}}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <div class="col-lg-12">
                    <label>المحلية : </label>
                    <input   name="locality" value="{{$data->name}}" class="form-control" 
					required pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z\s]{1,300}"  
				       oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المنطقة الكبرى  ')"
					   oninput="this.setCustomValidity('')"
					>
                </div>
                <div class="col-lg-12">
                    <label> المنطقة الكبري   : </label>
                    <select class="form-control" name="city_id" 
					 required   
				       oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المنطقة الكبرى  ')"
					   oninput="this.setCustomValidity('')"
					>
                        <option value="{{null}}"> اختر</option>
                        @foreach ($cities as $key => $value)
                            <option value="{{$value->id}}"

                            {{$data->city_id ==$value->id?"selected":""}}
                            > {{$value->name}}
                            </option>
                        @endforeach


                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        حفظ الموقع
                    </button>
                </div>



            </form>

        </div>
    </div>



@endsection
@section('javascript')
    <script>
        $('#datepicker').datepicker({

            dateFormat:"yy-mm-dd",
        })
    </script>
@endsection
