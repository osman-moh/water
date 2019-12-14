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
                        <div class="col-md-6 date">
                            <h5 id="from-date"> {{ $fromDate }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-6"><h4>إلى</h4></div>
                        <div class="col-md-6 date">
                            <h5 id="to-date"> {{ $toDate }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--- ./row --->
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-6"><h4>ملخص البلاغات حسب :</h4></div>
                        <div class="col-md-6 report-type">
                            <input type="hidden" name="report-type" id="report-type" value="{{ $reportType }}">
                            <h4> {{ $title }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <button class="btn btn-lg btn-primary downloadPdf">تحميل (PDF)</button>
            </div>
        </div><!--- ./row --->

        @if (count($reports) > 0)
        <div class="row">
            <div class="col-md-11">
                <div class="box box-success">
                    <div class="box-header">
                        {{--  <h4 class="box-title">عدد البلاغات = {{ $reports->count() }}</h4>  --}}
                    </div>
                
                <div class="box-body table-responsive">
                    <table class="table table-hover" id="reportsTable">
                        <thead>
                            <th>#</th>
                            <th>{{ $title }}</th>
                            <th>العدد الكلي</th>
                            <th>عطش</th>
                            <th>م عطش</th>
                            <th>كسر</th>
                            <th>م كسر</th>
                            <th>تلوث</th>
                            <th>م تلوث</th>
                            <th>حفرة</th>
                            <th>م حفرة</th>
                            <th>عداد</th>
                            <th>م عداد</th>
                            <th>تسريب</th>
                            <th>م تسريب</th>
                            {{-- <th>نسبة الإنجاز</th>
                            <th>عدم الإنجاز</th> --}}
                        </thead>
                        <tbody>
                            @foreach ($reports as $key => $report)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $key }}</td>
                                    <td>{{ $report['total'] }}</td>

                                    @php
                                        $totalOfFixedReports = 0 ;
                                    @endphp

                                    @foreach ($reportTypes as $type)

                                        <td>   
                                            @php
                                                $sumOfFixed = 0 ;
                                                $sumOfUNFixed = 0 ;
                                            @endphp
                                            @if (isset($report['fixed'][$type->name]))
                                                @php
                                                    $sumOfFixed = $report['fixed'][$type->name] ;
                                                    $totalOfFixedReports += $sumOfFixed ;
                                                @endphp
                                            @endif
                                            @if(isset($report['unfixed'][$type->name]))
                                                @php
                                                    $sumOfUNFixed = $report['unfixed'][$type->name]
                                                @endphp
                                            @endif

                                            {{  $sumOfUNFixed }}

                                        </td>
 
                                        <td>
                                            {{ $sumOfFixed }}
                                        </td>
                                    @endforeach

                                    {{-- <td>
                                        {{ round(($totalOfFixedReports / $report['total']) * 100 , 2) }}%
                                    </td>
                                    <td>
                                       {{ 100 - round(($totalOfFixedReports / $report['total']) * 100 , 2) }} 
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- ./ box -->
            </div> <!-- /. col-md-11 -->   
        </div><!-- /.row -->
        @else
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-danger">
                        <div class="box-body">
                            <div class="col-md-4"><h4>لقد حدث خطأ !</h4></div>
                            <div class="col-md-6">
                                <h4> لم يتم انشاء التقرير بصورة صحيحة </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--- ./row --->
        @endif
    
    </div>

    @endsection

    @section('javascript')
        <script>
            $(document).ready(function(){

                //$('#reportsTable').DataTable();

                $('button.downloadPdf').click(function(){
                    var reportType  = $('input#report-type').val() , fromDate = $('h5#from-date').text() , 
                        toDate      = $('h5#to-date').text() ;
                    console.log('values to be submitted ..',reportType,' & ',fromDate,' & ',toDate);

                    window.open('/water-reports/summary?summaryReport='+reportType+'&fDate='+fromDate+'&tDate='+toDate , '_blank');

                });

            });
        </script>

    @endsection
