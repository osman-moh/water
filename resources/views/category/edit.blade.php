@extends('layouts.app')
@section('title' , 'تعديل جهة بلاغ')
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
            <h3 class="box-title">  تعديل انواع تصنيفات البلاغات    </h3>
        </div>
        <div class="box-body">
            <form id="send"  method="POST" action="{{route('category.update',$data->id)}}">

                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <div class="col-lg-12">
                    <label> مكان استقبال  البلاغ : </label>
                    <input placeholder="اسم الموقع" name="category" class="form-control" value="{{$data->name}}"
					
					      required pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z\s]{1,300}"
							oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال الاسم')" 
							oninput="this.setCustomValidity('')"
							title="يجب ان يحتوي على حروف او ارقام">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                           تعديل
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
