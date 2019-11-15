@extends('layouts.app') 
@section('title' , 'مربع جديد')

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
            <h3 class="box-title"> مربع جديد   </h3>
        </div>
        <div class="box-body">
           
                <form id="send"  method="POST" action="{{route('squares.store')}}">
                   @csrf
               
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                                <lebel>اسم المربع  : </lebel>
                            <input placeholder="اسم المربع" name="name" class="form-control" 
                            required  pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z0-9\s]{1,300}"      
                                oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  اسم المربع')"
                                oninput="this.setCustomValidity('')" 
                                title="يجب ان يحتوي على حروف وارقام">
                        </div>
                        <div class="col-lg-6"></div>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                                <lebel>اسم المنطقة الكبري : </lebel>
                                <select id="city_id" class="form-control" name="city_id" 
                                required=""    
                                oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المنطقة الكبرى  ')"
                                oninput="this.setCustomValidity('')">
                            
                                    <option value="{{null}}" selected> اختر</option>
                                    @foreach($cities as $city )
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6">
                                    <lebel>المحلية : </lebel> 
                                <select id="locality_id" class="form-control" name="locality_id" required  
                                    oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المحلية  ')"
                                    oninput="this.setCustomValidity('')">
                                    
                                    </select>
                            </div>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <label for="">المكتب الفرعي</label>
                            <select name="office_id" class="form-control" id="office_id"></select>
                        </div>
                        <div class="col-lg-6">
                            <label for="">المدينة</label>
                            <select name="town_id" class="form-control" id="town_id"></select>
                        </div>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-12" align="center">
                        <button type="submit" class="btn btn-primary"> حفظ المربع </button>
                    </div>
                </form>

  
            </div>
       
    </div>



@endsection
@section('javascript')
  <script>
      $(document).ready(function(){ 
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

        $("#locality_id").change(
            function () {
                var id = $(this).val();
                $.get('/locality-offices-list/'+id,
                    function(data){
                        var options = '<option></option>' ;
                        $.each(data , function (key , value) {
                            options += '<option value='+value.id+'>'+value.name+'</option>';
                        });
                        $('#office_id').html(options);
                    });

            }
        );

        $("#office_id").change(
            function () {
                var id = $(this).val();
                $.getJSON('/office-towns-list/'+id,
                    function(data){
                        //set manager name&phone
                        var name = data.manager_name, phone = data.manager_phone ;
                        $('#manager_name').val(name) ;
                        $('#manager_phone').val(phone);
                        var options = '<option></option>' ;
                        $.each(data.towns , function (key , value) {
                            options += '<option value='+value.id+'>'+value.name+'</option>';
                        });
                        $('#town_id').html(options);
                    });

            }
        );

        $("#town_id").change(
            function () {
                var id = $(this).val();
                $.get('/town-squares-list/'+id,
                    function(data){
                        var options = '<option></option>' ;
                        $.each(data , function (key , value) {
                            options += '<option value='+value.id+'>'+value.name+'</option>';
                        });
                        $('#square_id').html(options);
                    });

            }
        ); 
      });
  </script>
@endsection
