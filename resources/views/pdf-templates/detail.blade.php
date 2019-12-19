<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>تقرير تفصيلي عن البلاغات</title>

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
       
        <h4>{{ (!$data['reportTotal']) ? 'تقرير تفصيلي للبلاغات' : 'تقرير تجميعي للبلاغات' }}
            
            || <strong>الفترة من  : </strong> {{ $data['fromDate'] }}  
            <strong>إلى :</strong> {{  $data['toDate'] }}
        </h4>
        
        <h4> المنطقة :  {{ $data['cityName']->name }}  
            @isset($data['localityName']->name) 
                || المحلية : {{ $data['localityName']->name }}
            @endisset

            @isset($data['typeName']->name) 
                || نوع البلاغ : {{ $data['typeName']->name }}
            @endisset

            @isset($data['statusName']->name) 
                || حالة البلاغ : {{ $data['statusName']->name }}
            @endisset
        </h4>

        <h4>
            @isset($data['officeName']->name) 
                 المكتب : {{ $data['officeName']->name }}
            @endisset

            @isset($data['townName']->name) 
                || المدينة : {{ $data['townName']->name }}
            @endisset

            @isset($data['squareName']->name) 
                || المربع : {{ $data['squareName']->name }}
            @endisset
        </h4>

        @if($data['reportTotal'] != null)
            <h3> عدد البلاغات : {{ $data['reports'] }} </h3>
        @endif

        <div>

            @if($data['reportTotal'] == null)

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

    </div>
            
    </div>
   
</body>
</html>
