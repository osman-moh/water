@extends('layouts.app')

@section('title' , 'عرض التقرير || هيئة مياه ولاية الخرطوم')

@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-6"><h4>الفترة من </h4></div>
                        <div class="col-md-6">
                            <h5 id="fDate"> {{ $fromDate }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-6"><h4>إلى</h4></div>
                        <div class="col-md-6">
                            <h5 id="tDate"> {{ $toDate }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--- ./row --->

        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-6"><h4>المحلية</h4></div>
                        <div class="col-md-6">
                            <h5> {{ $localityName->name }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-6"><h4>المكتب</h4></div>
                        <div class="col-md-6">
                            <h5> 
                                @if (isset($officeName->name))
                                    {{ $officeName->name }}
                                @else
                                    {{ 'كل المكاتب' }}
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-6"><h4>نوع البلاغ</h4></div>
                        <div class="col-md-6">
                            <h5> 
                               @if (isset($typeName->name))
                                    {{ $typeName->name }}
                                @else
                                    {{ 'كل الأنواع' }}
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-6"><h4>حالة البلاغ</h4></div>
                        <div class="col-md-6">
                            <h5> 
                                @if (isset($statusName->name))
                                    {{ $statusName->name }}
                                @else
                                    {{ 'كل الحالات' }}
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <button class="btn btn-lg btn-primary downloadPdf">تحميل (PDF)</button>
            </div>
        </div><!--- ./row --->

        <div class="row">
            <div class="col-md-11">
                <div class="box box-success">
                    <div class="box-header">
                        <h4 class="box-title">عدد البلاغات = {{ $reports->count() }}</h4>
                    </div>
                
                <div class="box-body table-responsive">
                    <table class="table table-hover" id="reportsTable">
                        <thead>
                            <th>#</th>
                            <th>رقم البلاغ</th>
                            <th>الإسم</th>
                            <th>الحي</th>
                            <th>المربع</th>
                            <th>رقم المنزل</th>
                            <th>التاريخ</th>
                            <th>الزمن</th>
                            <th>نوع البلاغ</th>
                            <th>التصنيف</th>
                            <th>الإجراء</th>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $report->id }}</td>
                                    <td>{{ !empty($report->name) ?$report->name : '' }}</td>
                                    <td>{{ !empty($report->town->name) ? $report->town->name : '' }}</td>
                                    <td>{{ !empty($report->square->name) ? $report->square->name : '' }}</td>
                                    <td>{{ ($report->house_number > 0) ? $report->house_number : '' }}</td>
                                    <td>{{ !empty($report->date) ? $report->date : '' }}</td>
                                    <td></td>
                                    <td>{{ !empty($report->type->name) ? $report->type->name : '' }}</td>
                                    <td>{{ !empty($report->sub_type->name) ? $report->sub_type->name : '' }}</td>
                                    <td>{{ !empty($report->status->name) ? $report->status->name : '' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- ./ box -->
            </div> <!-- /. col-md-11 -->   
        </div><!-- /.row -->
    
        <div class="row">
           
        </div>
        <input type="hidden" name="locality" value="{{ $localityName->id ?? 0 }}">
        <input type="hidden" name="office" value="{{ $officeName->id ?? 0 }}">
        <input type="hidden" name="reportType" value="{{ $typeName->id ?? 0 }}">
        <input type="hidden" name="reportStatus" value="{{ $statusName->id ?? 0 }}">
    </div>

    @endsection

    @section('javascript')
        <script>

            $(document).ready(function(){
                $('button.downloadPdf').click(function(){
                    var locality  = $('input[name=locality]').val() , fromDate = $('h5#fDate').text() , 
                        toDate      = $('h5#tDate').text()              , office  = $('input[name=office]').val() ,
                        reportType  = $('input[name=reportType]').val() , reportStatus  = $('input[name=reportStatus]').val() ;
                    
                    var param = 'report_type='+reportType+'&fromDate='+fromDate+'&toDate='+toDate+'&report_status='+reportStatus+'&locality_id='+locality+'&office_id='+office ;
                   
                    console.log('values to be submitted ..',param);

                    window.open('/water-reports/generate?'+param , '_blank');

                });
            });

        </script>

    @endsection
