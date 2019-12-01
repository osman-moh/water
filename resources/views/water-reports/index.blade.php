@extends('layouts.app')

@section('title' , 'إنشاء تقرير || هيئة مياه ولاية الخرطوم')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>البلاغات - إنشاء تقرير</h3>
            </div>
        </div>

        <div class="row"><br></div>

        <div class="row">
            <div class="col-md-11">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-2">
                            <input type="radio" name="report-type" id="report-detail" class="radio" value="1">
                        </div>
                        <div class="col-md-3"><label for="">تقرير تفصيلي</label></div>
                        
                        <div class="col-md-2">
                            <input type="radio" name="report-type" id="report-summary" class="radio" value="2" checked>
                        </div>
                        <div class="col-md-3"><label for="">ملخص البلاغات</label></div>
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
                                        <input type="date" name="fDate" id="" class="form-control">
                                    </div>

                                    <div class="col-md-1"><h4>إلى</h4></div>
                                    <div class="col-md-3">
                                        <input type="date" name="tDate" id="" class="form-control">
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
                                        <button class="btn btn-primary" type="submit" id="generate-summary"> إنشاء التقرير</button>
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
                                    <div class="col-md-2"></div>
                                </div>
                            </div><!--- ./row --->
                            <hr>
                        
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">المحلية</label>
                                    <select name="locality_id" class="form-control" id="locality_id">
                                        <option value=""></option>
                                        @foreach ($localities as $locality)
                                            <option value="{{ $locality->id }}">{{ $locality->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="">المكتب الفرعي</label>
                                    <select name="office_id" class="form-control" id="office_id">
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
                                <div class="col-md-2"><br><button class="btn btn-primary">عرض التقرير</button></div>
                            </div>
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

                $('div.detail-report').hide();
                

                var from_date , to_date , summary_report ;

                $('input[type=radio][name=report-type').change(function(){
                    console.log($(this).val(),' is checked') ;

                    var checkedOption  = $(this).val() ;

                    if(checkedOption == 1){
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
                                console.log('success ', data);
                            },
                            error:function(error){
                                console.log('error ',error);
                            }
                        });
                    }
                    else{
                        $('input[type=date]').addClass('');
                        console.log('null dates');
                    }
                });

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
