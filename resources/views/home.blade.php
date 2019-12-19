@extends('layouts.app')

@section('title' , 'الصفحة الرئيسة || هيئة مياه ولاية الخرطوم')

@section('content')
    <div class="container" style=" color: rgba(11, 80, 187, 0.83); background-color: rgba(16, 107, 130, 0.11);">
        <div class="text-center h1" >
            هيئة مياه ولاية الخرطوم
        </div>
        <div class="text-center h3" >
        مركز خالد علي خالد
        </div>
        <div class="text-center h2" >
            للبلاغات
        </div>
      

        <div class="row"><br><br></div>

        <div class="row">
            <div class="col-md-12">
                <div class="btn-group pull-left" data-toggle="buttons">
                    <label class="btn btn-info active">
                        <input type="radio" name="date-filter"
                            data-start="{{ $date_filters['this_day']['start'] }}"
                            data-end="{{ $date_filters['this_day']['end'] }}"
                            checked> اليوم
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="date-filter"
						  data-start="{{ $date_filters['this_week']['start']}}"
                            data-end="{{ $date_filters['this_week']['end']}}"> الاسبوع
                    </label>
                   
                    <label class="btn btn-info">
                        <input type="radio" name="date-filter"
						 data-start="{{ $date_filters['this_month']['start']}}"
                            data-end="{{ $date_filters['this_month']['end']}}"> الشهر
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="date-filter"
                            data-start="{{ $date_filters['fy']['start']}}"
                            data-end="{{ $date_filters['fy']['end']}}"
                        > السنة
                    </label>
                </div>
            </div>
        </div>
        
        <div class="row"></div><hr>

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue">
                        
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">مجموعة البلاغات </span>
                        <span class="info-box-number total_reports">
                            <i class="fa fa-refresh fa-spin fa-fw margin-bottom" id=""></i>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green">
                        <i class="ion ion-ios-gear-outline"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">تم حلها</span>
                        <span class="info-box-number total_finished_reports">
                            <i class="fa fa-refresh fa-spin  margin-bottom" id="finished"></i></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-red">
                        <i class="ion ion-ios-gear-outline"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">لم يتم حلها</span>
                        <span class="info-box-number total_unfinished_reports">
                            <i class="fa fa-refresh fa-spin fa-fw margin-bottom" id="unfinished"></i>
                        </span>
                        
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->


        </div>
    </div>

    @endsection

    @section('javascript')
        <script>

            $(document).ready(function(){

				var start = $('input[name=date-filter]').prop('checked' , true).data('start');
                var end = $('input[name=date-filter]').prop('checked' , true).data('end');
				console.log('date ',start,' end ',end);
                $.ajax({
                    method: "GET",
                    url: '/dashboard/'+start+'/'+end+'/reports',
                    success: function(data){
                        var total = (data.total == null) ? 0 : data.total ;
                        var finished = (data.finished == null) ? 0 : data.finished ;
                        var unfinished = (data.unfinished == null) ? 0 : data.unfinished ;
                        $('.bg-blue').html(total);
                        $('.bg-green').html(finished);
                        $('.bg-red').html(unfinished);
                    }
                });
               

                $(document).on('change', 'input[name=date-filter]', function(){
                    var start = $('input[name=date-filter]:checked').data('start');
                    var end = $('input[name=date-filter]:checked').data('end');
                    console.log('date ',start,' end ',end);
                    update_statistics(start, end);
                });

            });

            function update_statistics( start_date, end_date ){
                
                var  start = start_date , end = end_date ;
                //get reports details
                var loader = '<i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i>';
                $('.total_reports').html(loader);
                $('.total_unfinished_reports').html(loader);
                $('.total_finished_reports').html(loader);
               
                $.ajax({
                    method: "GET",
                    url: '/dashboard/'+start+'/'+end+'/reports',
                    success: function(data){
                        var total = (data.total == null) ? 0 : data.total ;
                        var finished = (data.finished == null) ? 0 : data.finished ;
                        var unfinished = (data.unfinished == null) ? 0 : data.unfinished ;
                        $('.bg-blue').html(total);
                        $('.bg-green').html(finished);
                        $('.bg-red').html(unfinished);
                    }
                });
               
            }

        </script>

    @endsection
