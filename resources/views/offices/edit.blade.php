
@extends('layouts.app')

@section('title' , 'تعديل مكتب فرعي') 

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
            <h3 class="box-title"> تعديل  مكتب فرعي </h3>
        </div>
        <div class="box-body">

            <form id="send"  method="POST" action="{{route('offices.update',$offices->id)}}">
                {{ csrf_field() }}
                @method('PUT')
                <div class="row">
                    <div class="col-lg-6">
                        <label>اسم المكتب الفرعي : </label>
                        <input placeholder="اسم المكتب الفرعي" name="name" class="form-control" value="{{ $offices->name }}"
                            required pattern="[أ-يa-zA-Z0-9\s]{1,300}"     
                            oninvalid="this.setCustomValidity('الرجاء كتابة اسم المكتب')"
                            oninput="this.setCustomValidity('')"
                            title="يجب ان يحتوي على حروف وارقام">
                    </div>
                    <div class="col-lg-6"></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">مدير المكتب</label>
                        <input type="text" name="manager_name" class="form-control" id="" value="{{ $offices->manager_name }}" 
						
						 required  pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z0-9\s]{1,300}"      
                            oninvalid="this.setCustomValidity('الرجاء كتابة اسم مديرالمكتب')"
                            oninput="this.setCustomValidity('')"
                            title="يجب ان يحتوي على حروف "
						
						>
                    </div>
                    <div class="col-lg-3">
                        <label for="">رقم الهاتف</label>
                        <input type="number" name="phone" class="form-control" id="" value="{{ $offices->manager_phone }}"  
						
						maxlength="10" placeholder="رقم الهاتف" 
						required pattern="(0[1 9]\d{8})" 
				                oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  رقم الهاتف')"
					            oninput="this.setCustomValidity('')"title="يجب ان يحتوي على 10 ارقام" >
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <label> المنطقة الكبري   : </label>
                        <select id="city_id" class="form-control" name="city_id"required
                                oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المنطقة الكبرى  ')"
                                oninput="this.setCustomValidity('')">
                                <option value="{{null}}"> اختر</option>
                                @foreach ($cities as $key => $value)
                                    <option value="{{$value->id}}" {{ ($offices->city_id ==$value->id)?'selected' : '' }}> 
                                        {{$value->name}}
                                    </option>
                                @endforeach
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label>المحلية : </label>
                        <select id="locality_id" class="form-control" name="locality_id" required    
                            oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر المحلية   ')"
                            oninput="this.setCustomValidity('')">
                            
                            <option value="{{null}}"> اختر</option>
                            @foreach ($localities as $key => $value)
                                <option value="{{$value->id}}" {{ ($offices->locality_id == $value->id)?'selected' : '' }}> 
                                    {{$value->name}}
                                </option>
                            @endforeach
                        </select>
                        
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="text-center" align="right"><button type="submit" class="btn btn-primary">حفظ المكتب</button></div>
                </div>



            </form>

        </div>
    </div>



@endsection
@section('javascript')
  <script>
      
      $("#city_id").change(
                function () {
                    var id = $(this).val();
                    $.get('/city-localities-list/'+id,
                        function(data){
                            var options = '<option></option>' ;
                            $.each(data , function (key , value) {
                                options += '<option value='+value.id+'>'+value.name+'</option>';
                            });
                            $('#locality_id').html(options);
                        });

                }
            );
  </script>
@endsection

