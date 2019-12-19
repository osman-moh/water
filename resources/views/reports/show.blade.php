 
    @extends('layouts.app')
	
    @section('title' , 'تفاصيل بلاغ')
    
    @section('content')
        
    <div class="container"> 
	
        <div class="row"><br></div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">بيانات البلاغ</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                            <h4><strong>مكان استقبال البلاغ </strong> <i> : 
                                @isset( $report->location->name ) 
                                {{ $report->location->name }}
                                @endisset
                                </i>
                            </h4>
                            </div>
                            <div class="col-md-4">
                                <h4><strong>تاريخ البلاغ </strong> <i> : 
                                @isset( $report->date )
                                    {{ $report->date }}
                                @endisset
                                    </i>
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <h4><strong>الجهة المبلغة </strong> <i> : 
                                @isset($report->category->name )
                                    {{ $report->category->name }}
                                @endisset
                                    </i>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div> <!-- ./box -->
            </div> <!-- ./col-md-12 -->
        </div><!-- ./row -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">بيانات المبلغ</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                            <h4><strong>اسم المبلغ</strong> <i> : 
                                @isset( $report->name ) 
                                {{ $report->name }}
                                @endisset
                                </i>
                            </h4>
                            </div>
                            <div class="col-md-4">
                                <h4><strong>رقم الهاتف </strong> <i> : 
                                    @isset( $report->phone1 )
                                        {{ $report->phone1 }}
                                    @endisset
                                    </i>
                                </h4>
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                    </div>
                </div> <!-- ./box -->
            </div> <!-- ./col-md-12 -->
        </div><!-- ./row -->
        
        
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">مكان البلاغ</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                            <h4><strong>المنطقة الكبرى</strong> <i> : 
                                @isset( $report->city->name ) 
                                {{ $report->city->name }}
                                @endisset
                                </i>
                            </h4>
                            </div>
                            <div class="col-md-3">
                                <h4><strong>المحلية</strong> <i> : 
                                @isset( $report->locality->name )
                                {{ $report->locality->name }}
                            @endisset
                                    </i>
                                </h4>
                            </div>
                            <div class="col-md-3">
                                <h4><strong>المكتب</strong> <i> : 
                                @isset( $report->office->name )
                                    {{ $report->office->name }}
                                @endisset
                                    </i>
                                </h4>
                            </div>
                            
                            <div class="col-md-3">
                                <h4><strong>المدينة</strong> <i> : 
                                @isset( $report->town->name )
                                    {{ $report->town->name }}
                                @endisset
                                    </i>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div> <!-- ./box -->
            </div> <!-- ./col-md-12 -->
        </div><!-- ./row -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">وصف المنزل</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                            <h4><strong>المربع</strong> <i> : 
                                @isset( $report->square->name ) 
                                {{ $report->square->name }}
                                @endisset
                                </i>
                            </h4>
                            </div>
                            <div class="col-md-4">
                                <h4><strong>رقم المنزل</strong> <i> : 
                                @isset( $report->house_number )
                                    {{ $report->house_number }}
                                @endisset
                                    </i>
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <h4><strong>وصف المنزل</strong> <i> : 
                                @isset( $report->house_description )
                                {{ $report->house_description }}
                            @endisset
                                    </i>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div> <!-- ./box -->
            </div> <!-- ./col-md-12 -->
        </div><!-- ./row -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">بيانات مدير مكتب الصيانة</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                            <h4><strong>مدير الصيانة</strong> <i> : 
                                @isset( $report->manager_name )
                                        {{ $report->manager_name }}
                                    @endisset
                                </i>
                            </h4>
                            </div>
                            <div class="col-md-4">
                                <h4><strong>رقم الهاتف</strong> <i> : 
                                @isset( $report->manager_phone )
                                    {{ $report->manager_phone }}
                                @endisset
                                    </i>
                                </h4>
                            </div>
                            <div class="col-md-4">
                            
                            </div>
                        </div>
                    </div>
                </div> <!-- ./box -->
            </div> <!-- ./col-md-12 -->
        </div><!-- ./row -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">تفاصيل البلاغ</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                            <h4><strong>نوع البلاغ</strong> <i> : 
                                @isset( $report->type->name )
                                {{ $report->type->name }}
                            @endisset
                                </i>
                            </h4>
                            </div>
                            <div class="col-md-3">
                                <h4><strong>البند الفرعي</strong> <i> : 
                                {{ empty($report->sub_type->name) ? '' : $report->sub_type->name }}
                                    </i>
                                </h4>
                            </div>
                            <div class="col-md-3">
                                <h4><strong>تفصيل البلاغ</strong> <i> : 
                                    {{ empty($report->sub_report_detail->name) ? '' : $report->sub_report_detail->name }}
                                    </i>
                                </h4>
                            </div>
                            <div class="col-md-3">
                                <h4><strong>حالة البلاغ </strong> <i> : 
                                    {{ empty($report->status->name)?'': $report->status->name }}
                                    </i>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div> <!-- ./box -->
            </div> <!-- ./col-md-12 -->
        </div><!-- ./row -->
        
        
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">بيانات البلاغ</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h4><strong>تم استلام البلاغ بواسطة</strong> <i> : 
                                    @isset( $report->user->name )
                                        {{ $report->user->name }}
                                    @endisset
                                    </i>
                                </h4>
                            </div>
                            <div class="col-md-3">
                                <h4><strong>تاريخ البلاغ</strong> <i> : 
                                @isset( $report->created_at )
                                    {{ $report->created_at }}
                                @endisset
                                    </i>
                                </h4>
                            </div>
                            <div class="col-md-3">
                                <h4><strong>تم تعديل البلاغ بواسطة</strong> <i> : 
                                    @isset( $report->updateByUser->name )
                                        {{ $report->updateByUser->name }}
                                    @endisset
                                    </i>
                                </h4>
                            </div>
                            <div class="col-md-3">
                                <h4><strong>تاريخ التعديل</strong> <i> : 
                                @isset( $report->updated_at )
                                    {{ $report->updated_at }}
                                @endisset
                                    </i>
                                </h4>
                            </div>

                            <div class="col-md-6">
                                <h4><strong>وصف ما تم عمله في البلاغ</strong> <i> : 
                                @isset( $report->report_action_description )
                                    {{ $report->report_action_description }}
                                @endisset
                                    </i>
                                </h4>
                            </div>

                        </div>
                    </div>
                </div> <!-- ./box -->
            </div> <!-- ./col-md-12 -->
        </div><!-- ./row -->
        
        
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">تعديل حالة البلاغ</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            @if (auth()->user()->user_type_id != 3)
                                <form action="/reports/update-status/{{ $report->id }}" method="post">
                                    @method('PATCH')
                                    @csrf
                                    
                                    <!-- <div class="row"> -->
                                        <div class="col-md-2">
                                            <input type="radio" name="report_status" value="1" {{ ($report->report_status == 1)? 'checked' :''}}>&nbsp;&nbsp; غير منجز
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" name="report_status" value="2" {{ ($report->report_status == 2)? 'checked' :''}}>&nbsp;&nbsp;منجز
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" name="report_status" value="3" {{ ($report->report_status == 3)? 'checked' :''}}>&nbsp;&nbsp;معلق
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" name="report_status" value="4" {{ ($report->report_status == 4)? 'checked' :''}}>&nbsp;&nbsp;قيد التنفيذ
                                        </div>
                                        <div class="col-md-3"> 
                                            <button type="submit" class="btn btn-success btn-block">تعديل الحالة</button>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="/reports/{{ $report->id }}/edit" class="btn btn-primary btn-block">تعديل البلاغ</a>
                                        </div>
                                    <!-- </div><hr> -->
                                    <hr>
                                </form>
                            @endif
                            @if (auth()->user()->user_type_id == 1)
                                
                                <form action="/reports/{{ $report->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="row">
                                        <div class="col-md-12"><br><br></div>
                                        <div class="col-md-2"></div>
                                        
                                        
                                        <div class="col-md-3">
                                            <button class="btn btn-danger btn-block" type="submit">حذف البلاغ</button>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div><hr>
                                </form>
                            @endif
                        </div>
                    </div>
                </div> <!-- ./box -->
            </div> <!-- ./col-md-12 -->
        </div><!-- ./row -->

</div><!-- ./container -->


    @endsection