@extends('layouts.app')
@section('title' , 'تعديل بيانات مدينة')
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
            <h3 class="box-title">   تعديل  مدينة   </h3>
        </div>
        <div class="box-body">

                <form id="send"  method="POST" action="/towns/{{ $town->id }}">
                    @csrf
                    @method('PATCH')
                     <div class="col-lg-12">
                         <div class="col-lg-6">
                                 <lebel>اسم المدينة  : </lebel>
                             <input placeholder="اسم المدينة" name="name" class="form-control" value="{{ $town->name }}" 
                             required  pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z0-9\s]{1,300}"       
                                 oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال  اسم المدينة')"
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
                             
                                     @foreach ($cities as $city)
                                     <option value="{{$city->id}}" {{ $town->city_id==$city->id?'selected':'' }}> 
                                         {{$city->name}}
                                     </option>
                                  @endforeach
                                 </select>
                             </div>
 
                             <div class="col-lg-6">
                                     <lebel>المحلية : </lebel> 
                                 <select id="locality_id" class="form-control" name="locality_id" required  
                                     oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المحلية  ')"
                                     oninput="this.setCustomValidity('')">
                                     @foreach ($localities as $locality)
                                         <option value="{{ $locality->id }}" {{ $town->locality_id==$locality->id?'selected':'' }}>
                                             {{ $locality->name }}
                                         </option>
                                     @endforeach
                                     </select>
                             </div>
                     </div>
                     <div class="col-lg-12"><br></div>
                     <div class="col-lg-12">
                         <div class="col-lg-6">
                             <label for="">المكتب الفرعي</label>
                             <select name="office_id" class="form-control" id="office_id" 
                             required  
                                         oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المكتب  ')"
                                         oninput="this.setCustomValidity('')"
                             >
                                     @foreach ($offices as $office)
                                     <option value="{{ $office->id }}" {{ $town->office_id==$office->id?'selected':'' }}>
                                         {{ $office->name }}
                                     </option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-lg-6">
                            
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
 
       });
   </script>
 @endsection
 