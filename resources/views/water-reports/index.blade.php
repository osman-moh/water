@extends('layouts.app')

@section('title' , 'إنشاء تقرير || هيئة مياه ولاية الخرطوم')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>البلاغات - إنشاء تقرير</h3>
            </div>
        </div>

        @if ($errors->any())
            <div class="row">
                <div class="col-md-11 alert alert-danger message">
                    <h4><strong>خطأ !</strong> توجد حقول مطلوبة لم يتم اختيارها </h4>
                </div>
            </div>
        @endif

        <div class="row"><br></div>

        <div class="row">
            <div class="col-md-11">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-2">
                            <input type="radio" name="report-type" id="report-detail" class="radio" value="1">
                        </div>
                        <div class="col-md-2"><label for="">تقرير تفصيلي</label></div>
                        
                        <div class="col-md-2">
                            <input type="radio" name="report-type" id="report-summary" class="radio" value="2" checked>
                        </div>
                        <div class="col-md-2"><label for="">ملخص البلاغات</label></div>

                        <div class="col-md-4"></div>

                    </div>
                </div> 
            </div>
        </div>

        <div class="row"><hr></div>

        <div class="row summaryReport">
            <div class="col-md-11">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="box-title">
                            <h4>تقرير تجميعي</h4>
                        </div>
                    </div>
                    <div class="box-body">
                        <form method="POST" action="{{ route('water-reports.summary') }}"  class="form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-2"><h4>الفترة من </h4></div>
                                    <div class="col-md-3">
                                        <input type="date" name="fDate" id="f" class="form-control">
                                    </div>

                                    <div class="col-md-1"><h4>إلى</h4></div>
                                    <div class="col-md-3">
                                        <input type="date" name="tDate" id="t" class="form-control">
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div><!--- ./row --->
                            <hr>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-2"><label for="">ملخص المحليات</label></div>
                                    <div class="col-md-1">
                                        <input type="radio" name="summaryReport" id="sum-report-locality" class="radio" value="1">
                                    </div>
                                    <div class="col-md-2"><label for="">ملخص المكاتب</label></div>
                                    <div class="col-md-1">
                                        <input type="radio" name="summaryReport" id="sum-report-office" class="radio" value="2">
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary" type="submit" id="generate-summary"> عرض التقرير</button>
                                    </div>
                                </div>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row detail-report" style="display:none;">
            <div class="col-md-11">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="box-title"><h4>تقرير تفصيلي</h4></div>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('water-reports.generate') }}" class="form detail-report" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-2"><h4>الفترة من </h4></div>
                                    <div class="col-md-3">
                                        <input type="date" name="fromDate" id="fromDate" class="form-control">
                                    </div>

                                    <div class="col-md-1"><h4>إلى</h4></div>
                                    <div class="col-md-3">
                                        <input type="date" name="toDate" id="toDate" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-1">
                                        <input type="checkbox" name="reportTotal" id="report-total" class="checkbox" value="1"> 
                                    </div>
                                    <div class="col-md-2"><b> مجموع البلاغات </b></div>
                                </div>
                            </div><!--- ./row --->
                            <hr>
                        
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">المنطقة الكبرى</label>
                                    <select name="city_id" class="form-control" id="city_id">
                                        <option></option>
                                        <option value="0">كل المناطق</option>
                                        <option></option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="">المحلية</label>
                                    <select name="locality_id" class="form-control" id="locality_id">
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="">المكتب الفرعي</label>
                                    <select name="office_id" class="form-control" id="office_id">
                                    </select>
                                </div>
                            
                                <div class="col-md-2">
                                    <label for="">المدينة / الحي</label>
                                    <select name="town_id" class="form-control" id="town_id">
                                    </select>
                                </div>
                            </div><!-- ./row -->
                            <div class="row"><br></div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">المربع</label>
                                    <select name="square_id" class="form-control" id="square_id">
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="">نوع البلاغ</label>
                                    <select name="report_type" id="report_type" class="form-control">
                                        <option value="{{ null }}"></option>
                                        @foreach ($reportTypes as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="">حالة البلاغ</label>
                                    <select name="report_status" id="report_status" class="form-control">
                                        <option value="{{ null }}"></option>
                                        @foreach ($reportStatuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2"><br><button class="btn btn-primary btn-block">عرض التقرير</button></div>
                            </div><!-- ./row -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
           
        </div>
    </div>

    @endsection

    @section('javascript')
        <script>

            $(document).ready(function(){

                $('.message').fadeOut(5000);

                $('div.detail-report').hide();
                
                var from_date , to_date , summary_report ;

                $('input[type=radio][name=report-type').change(function(){
                    //console.log($(this).val(),' is checked') ;

                    var checkedOption  = $(this).val() ;

                    if(checkedOption == 1 ){
                        $('div.detail-report').show();
                        $('div.summaryReport').hide();
                    }else{
                        $('div.detail-report').hide();
                        $('div.summaryReport').show();
                    }

                });

                $('button#generate-summary').on('click' , function(){

                    from_date = $('input[name=fromDate]').val() ;
                    to_date   = $('input[name=toDate]').val() ;
                    summary_report = $('input[name=summaryReport]:checked').val();

                    if((from_date !== "" && to_date !== "") && from_date <= to_date){
                        $.ajax({
                            type:'GET' ,
                            url :'/summaryReport-by',
                            data:{report_type:summary_report , from_date:from_date , to_date:to_date},
                            beforeSend:function(){},
                            complete:function(){},
                            success:function(data){
                                //console.log('success ', data);
                            },
                            error:function(error){
                                //console.log('error ',error);
                            }
                        });
                    }
                    else{
                        $('input[type=date]').addClass('');
                        console.log('null dates');
                    }
                });

                $("#city_id").change(
                    function () {
                        //reset selects
                        $('#locality_id , #office_id , #town_id , #square_id').html('<option></option>');
                        
                        var id = $(this).val();

                        $.get('/city-localities-list/'+id,
                            function(data){
                                var options = '<option></option>'
                                                +'<option value="0">كل المحليات</option>'
                                                +'<option></option>' ;
                                $.each(data , function (key , value) {
                                    options += '<option value='+value.id+'>'+value.name+'</option>';
                                });
                                $('#locality_id').html(options);
                            });
                        
                    }
                );

                $("#locality_id").change(
                    function () {
                        //reset selects
                        $('#office_id , #town_id , #square_id').html('<option></option>');
                        
                        var id = $(this).val();

                        $.get('/locality-offices-list/'+id,
                            function(data){
                                var options = '<option></option>'
                                                +'<option value="0">كل المكاتب</option>'
                                                +'<option></option>' ;
                                $.each(data , function (key , value) {
                                    options += '<option value='+value.id+'>'+value.name+'</option>';
                                });
                                $('#office_id').html(options);
                            });
                        
                    }
                );

                $("#office_id").change(
                    function () {
                        $('#town_id , #square_id').val('');
                        var id = $(this).val();
                        $.getJSON('/office-towns-list/'+id,
                            function(data){
                                var options = '<option></option>'
                                                +'<option value="0">كل المدن</option>'
                                                +'<option></option>' ;
                                $.each(data.towns , function (key , value) {
                                    options += '<option value='+value.id+'>'+value.name+'</option>';
                                });
                                $('#town_id').html(options);
                            });

                    }
                );

                $("#town_id").change(
                    function () {
                        $('#square_id').html('<option></option>');
                        var id = $(this).val();
                        $.get('/town-squares-list/'+id,
                            function(data){
                                var squares = data.squares ;
                                var options = '<option></option>'
                                                +'<option value="0">كل المربعات</option>'
                                                +'<option></option>' ;
                                $.each(squares , function (key , value) {
                                    options += '<option value='+value.id+'>'+value.name+'</option>';
                                });
                                $('#square_id').html(options);
                            });

                    }
                );

            });

        </script>

    @endsection
