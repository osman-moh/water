<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $data['headerTitle'] }}</title>

        <!-- Fonts -->
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
        </style>
    </head>
<body>
    <header>
        <img src="../public/img/logo.png" alt="">
    </header>
    <div class="container">
        
        <div class=""><h3> <strong> ملخص البلاغات حسب : </strong> {{ $data['title'] }}</h3></div>
            @php
                $totalOfReports = 0 ;
            @endphp
            <div class="col-md-6">
                <h4> 
                    <strong>الفترة من  : </strong> 
                        {{ $data['fromDate'] }}  
                    <strong>إلى :</strong> 
                        {{  $data['toDate'] }}
                </h4>
            </div>
                <div class="" >
                    <table id="t01">
                        <thead>
                            <tr>
                            <!-- <td>#</td> -->
                            <td>{{ $data['title'] }}</td>
                            <td>العدد </td>
                            <td> غ عطش </td>
                            <td>م عطش</td>
                            <td>كسر</td>
                            <td>م كسر</td>
                            <td>تلوث</td>
                            <td>م تلوث</td>
                            <td>حفرة</td>
                            <td>م حفرة</td>
                            <td>عداد</td>
                            <td>م عداد</td>
                            <td>تسريب</td>
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
            
    </div>
   
</body>
</html>
