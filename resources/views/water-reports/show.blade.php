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
                            <h5> {{ $fromDate }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="col-md-6"><h4>إلى</h4></div>
                        <div class="col-md-6">
                            <h5> {{ $toDate }}</h5>
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
        </div><!--- ./row --->

        <div class="row">
            <div class="col-md-11">
                <div class="box box-success">
                    <div class="box-header">
                        <h4 class="box-title">عدد البلاغات = {{ $reports->count() }}</h4>
                    </div>
                
                <div class="box-body table-responsive">
                    <table class="table table-hover">
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
                                    <td>{{ $report->name }}</td>
                                    <td>{{ $report->town->name }}</td>
                                    <td>{{ $report->square->name }}</td>
                                    <td>{{ ($report->house_number > 0) ? $report->house_number : '' }}</td>
                                    <td>{{ $report->date }}</td>
                                    <td></td>
                                    <td>{{ $report->type->name }}</td>
                                    <td>{{ $report->sub_type->name }}</td>
                                    <td>{{ $report->status->name }}</td>
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
    </div>

    @endsection

    @section('javascript')
        <script>

            $(document).ready(function(){

            });

        </script>

    @endsection
