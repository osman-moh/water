@extends('layouts.app')
@section('title' , 'نوع جديد')
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
            <h3 class="box-title">  تصنيف المستخدمين  </h3>
        </div>
        <div class="box-body">
            <form id="send"  method="POST" action="{{route('usersType.store')}}">
                {{ csrf_field() }}
                <div class="col-lg-12">
                   <!-- <label> تصنيف بلاغ  : </label>-->
                  <input placeholder="تصنيف المستخدمين" name="user_type" class="form-control" 
                    required  pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z0-9\s]{1,300}"  
              oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال نوع المسخدم')" 
              oninput="this.setCustomValidity('')"
              title="يجب ان يحتوي على حروف او ارقام">
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
