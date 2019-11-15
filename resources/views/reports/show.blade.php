 
    @extends('layouts.app')
	@section('title' , 'تفاصيل بلاغ')
    @section('content')
        <div class="box box-default">

            <div class="box-header with-border">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
                    <!-- /.box-header -->
                    
            <div class="box-body">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>بيانات البلاغ</h2>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2"><h5><strong>مكان استقبال البلاغ</strong></h5></div>
                        <div class="col-md-3">
                            <h5>
                                @isset( $report->location->name ) 
                                 {{ $report->location->name }}
                                @endisset
                                الخرطوم
                            </h5>
                        </div>
                        <div class="col-md-2"><h5><strong>تاريخ استقبال البلاغ</strong></h5></div>
                        <div class="col-md-3">
                            <h5>
                                    @isset( $report->date )
                                    {{ $report->date }}
                                   @endisset
                            </h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2"><h5><strong>نوع الجهة المبلغة</strong></h5></div>
                        <div class="col-md-1">
                            <h5>
                                @isset($report->category->name )
                                    {{ $report->category->name }}
                                @endisset
                            </h5>
                        </div>

                        <div class="col-md-1"><h5><strong>اسم المبلغ</strong></h5></div>
                        <div class="col-md-2">
                            <h5>
                            
                            @isset( $report->name )
                            {{ $report->name }}
                           @endisset
                            </h5>
                        </div>

                        <div class="col-md-1"><h5><strong>رقم الهاتف</strong></h5></div>
                        <div class="col-md-2">
                            <h5>
                                    @isset( $report->phone1 )
                                    {{ $report->phone1 }}
                                   @endisset
                            </h5>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2"><h5><strong>المنطقة الكبرى</strong></h5></div>
                        <div class="col-md-1">
                            <h5>
                                @isset( $report->city->name )
                                {{ $report->city->name }}
                               @endisset
                            </h5>
                        </div>

                        <div class="col-md-1"><h5><strong>المحلية</strong></h5></div>
                        <div class="col-md-2"><h5>
                           
                            @isset( $report->locality->name )
                            {{ $report->locality->name }}
                           @endisset
                            </h5></div>

                        <div class="col-md-1"><h5><strong>المكتب</strong></h5></div>
                        <div class="col-md-2"><h5>
                           
                            @isset( $report->office->name )
                            {{ $report->office->name }}
                           @endisset
                        </h5></div>
                    </div>
                    <hr>
                    <div class="row">
                            <div class="col-md-1"><h5><strong>المدينة</strong></h5></div>
                            <div class="col-md-2"><h5>
                               
                                @isset( $report->town->name )
                                {{ $report->town->name }}
                               @endisset
                            </h5></div>

                            <div class="col-md-1"><h5><strong>المربع</strong></h5></div>
                            <div class="col-md-2"><h5>
                                    @isset( $report->square->name )
                                    {{ $report->square->name }}
                                   @endisset
                                </h5></div>

                            <div class="col-md-1"><h5><strong>رقم المنزل</strong></h5></div>
                            <div class="col-md-2"><h5>
                                    @isset( $report->house_number )
                                    {{ $report->house_number }}
                                   @endisset
                                </h5></div>
                    </div>
                    <hr> 
                    <div class="row">
                        <div class="col-md-2"><h5><strong>وصف المنزل</strong></h5></div>
                        <div class="col-md-4"><h5>
                                @isset( $report->house_description )
                                {{ $report->house_description }}
                               @endisset
                            </h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                            <div class="col-md-2"><h5><strong>مدير الصيانة</strong></h5></div>
                            <div class="col-md-4"><h5>
                                    @isset( $report->manager_name )
                                        {{ $report->manager_name }}
                                    @endisset
                                </h5>
                            </div>
                            <div class="col-md-2"><h5><strong>رقم الهاتف</strong></h5></div>
                            <div class="col-md-4"><h5>
                                    @isset( $report->manager_phone )
                                    {{ $report->manager_phone }}
                                @endisset
                                </h5>
                            </div>
                            
                        </div>
                        <hr>
                    <div class="row">
                        <div class="col-md-1"><h5><strong>نوع البلاغ </strong></h5></div>
                        <div class="col-md-2"><h5>
                                @isset( $report->type->name )
                                {{ $report->type->name }}
                               @endisset
                            </h5></div>
                        <div class="col-md-1"><h5><strong>البند الفرعي </strong></h5></div>
                        <div class="col-md-2">
                            <h5>
                                {{ empty($report->sub_type->name) ? '' : $report->sub_type->name }}
                            </h5>
                        </div>
                        <div class="col-md-2"><h5><strong>تفصيل البلاغ </strong></h5></div>
                        <div class="col-md-3">
                            <h5>
                                {{ empty($report->sub_report_detail->name) ? '' : $report->sub_report_detail->name }}
                            </h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                            <div class="col-md-1"><h5><strong>حالة البلاغ </strong></h5></div>
                            <div class="col-md-2"><h5>{{ empty($report->status->name)?'': $report->status->name }}</h5></div>

                            <div class="col-md-2"><h5><strong> تم استلام البلاغ بواسطة </strong></h5></div>
                            <div class="col-md-2">
                                <h5>
                                @isset( $report->user->name )
                                    {{ $report->user->name }}
                                @endisset
                               </h5>
                            </div>

                            <div class="col-md-1"><h5><strong>تاريخ البلاغ </strong></h5></div>
                            <div class="col-md-2"><h5>
                                    @isset( $report->created_at )
                                    {{ $report->created_at }}
                                   @endisset
                                </h5></div>
                    </div>
                    <hr>
                    <div class="row">
                        @if (auth()->user()->type != 3)
                            
                        <form action="/reports/update-status/{{ $report->id }}" method="post">
                            @method('PATCH')
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-2"><label for="">تعديل حالة البلاغ</label></div>
                                <div class="col-md-2">
                                    <input type="radio" name="report_status" value="1" {{ ($report->report_status == 1)? 'checked' :''}}>&nbsp;&nbsp; غير منجز
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="report_status" value="2" {{ ($report->report_status == 2)? 'checked' :''}}>&nbsp;&nbsp;منجز
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="report_status" value="3" {{ ($report->report_status == 3)? 'checked' :''}}>&nbsp;&nbsp;معلق
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" name="report_status" value="4" {{ ($report->report_status == 4)? 'checked' :''}}>&nbsp;&nbsp;قيد التنفيذ
                                </div>
                                <div class="col-md-3"> 
                                    <button type="submit" class="btn btn-success btn-block">تعديل الحالة</button>
                                 </div>
                            </div><hr>
                        </form>
                        @endif
                        @if (auth()->user()->type == 1)
                            
                            <form action="/reports/{{ $report->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <div class="col-md-12"><br><br></div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-3">
                                        <a href="/reports/{{ $report->id }}/edit" class="btn btn-primary btn-block">تعديل البلاغ</a>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <button class="btn btn-danger btn-block" type="submit">حذف البلاغ</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div><hr>
                            </form>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    @endsection