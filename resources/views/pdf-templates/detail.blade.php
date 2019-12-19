<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ ($data['reportTotal'] !== null) ? ' تقرير تفصيلي للبلاغات ' : ' تقرير تجميعي للبلاغات ' }}</title>

        <!-- Fonts --
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            table {
                width:100%;
              }
              table,  td {
                border: 1px solid black;
                border-collapse: collapse;
              }
              td {
                padding: 5px;
                text-align: left;
              }
              table#t01 tr:nth-child(even) {
                background-color: #eee;
              }
              table#t01 tr:nth-child(odd) {
               background-color: #fff;
              }
              thead td {
                background-color: dimgrey;
                color: white;
              }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            @page {
                header: page-header;
                
            }
        </style>
    </head>
<body>
    <header>
        <img src="../public/img/logo.png" alt="">
    </header>

    <div class="container">
       
        <h4> {{ ($data['reportTotal'] !== null) ? ' تقرير تفصيلي للبلاغات ' : ' تقرير تجميعي للبلاغات ' }}
            
            || <strong>الفترة من  : </strong> {{ $data['fromDate'] }}  
            <strong>إلى :</strong> {{  $data['toDate'] }}
        </h4>
        
        <h4> 
            @if(isset($data['cityName']->name))
                المنطقة : {{ $data['cityName']->name }}
            @elseif($data['request']['city_id'] == 0)
                {{ 'كل المناطق' }}
            @else
            @endif

            @if(isset($data['localityName']->name))
               || المحلية : {{ $data['localityName']->name }}
            @elseif($data['request']['locality_id'] === '0')
               || {{ 'كل المحليات' }}
            @else
            @endif

            @isset($data['typeName']->name) 
                نوع البلاغ : {{ $data['typeName']->name }}
            @endisset

            @isset($data['statusName']->name) 
                حالة البلاغ : {{ $data['statusName']->name }}
            @endisset
        </h4>

        <h4>
           
            @if(isset($data['officeName']->name))
               المكتب : {{ $data['officeName']->name }}
            @elseif($data['request']['office_id'] === '0')
               {{ 'كل المكاتب' }}
            @else
            @endif
            
            @if(isset($data['townName']->name))
               || المدينة : {{ $data['townName']->name }}
            @elseif($data['request']['town_id'] === '0')
               {{ 'كل المدن' }}
            @else
            @endif

            @if(isset($data['squareName']->name))
               || المربع : {{ $data['squareName']->name }}
            @elseif($data['request']['square_id'] === '0')
               {{ 'كل المربعات' }}
            @else
            @endif

        </h4>

        <div>

            @if($data['reportTotal'] !== null)

                <table id="t01">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>رقم البلاغ</td>
                            <td>الإسم</td>
                            <td>الحي</td>
                            <td>المربع</td>
                            <td>رقم المنزل</td>
                            <td>التاريخ</td>
                                    <td>الزمن</td>
                                    <td>نوع البلاغ</td>
                                    <td>التصنيف</td>
                                    <td>الإجراء</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['reports'] as $report)
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
            @endif

            @php
                $totalOfReports = 0 ;
            @endphp
        @if($data['reportTotal'] == null)
            <div class="box-body table-responsive">
                    <table class="table table-hover" id="reportsTable">
                        <thead>
                            <tr>
                                <td>{{ $data['title'] }}</td>
                                <td>العدد الكلي</td>
                                <td>غ عطش</td>
                                <td>م عطش</td>
                                <td>غ كسر</td>
                                <td>م كسر</td>
                                <td>غ تلوث</td>
                                <td>م تلوث</td>
                                <td>غ حفرة</td>
                                <td>م حفرة</td>
                                <td> غ عداد</td>
                                <td>م عداد</td>
                                <td> غ تسريب</td>
                                <td>م تسريب</td>
                                <td>غ أخرى</td>
                                <td>م أخرى</td>
                                <td>نسبة الإنجاز</td>
                             </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['reports'] as $key => $report)
                                <tr>
                                    <!-- <td>{{ $loop->index + 1 }}</td> -->
                                    <td>{{ $key }}</td>
                                    <td>{{ $report['total'] }}</td>

                                    @php
                                        $totalOfFixedReports = 0 ;
                                        $totalOfReports += $report['total'] ;
                                    @endphp

                                    @foreach ($data['reportTypes'] as $type)

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

                                    <td>
                                    {{ round(($totalOfFixedReports / $report['total']) * 100 , 2) }}%
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4>عدد البلاغات : {{ $totalOfReports }} </h4>
                </div>
            @endif
    </div>
            
    </div>
   
</body>
</html>
