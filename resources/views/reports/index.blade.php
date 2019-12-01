@extends('layouts.app') 

@section('title' , 'البلاغات')

@section('content')
    @if (Session::has('message'))
        <div class="h3 alert alert-success text-center message">
			{{ Session::get('message') }}
			({{ Session::get('id') }})
		</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="box box-default">
        
            <div class="box-header with-border">
                <h3 class="box-title"> البلاغات </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
			@if (auth()->user()->type !== 2)
                <div class="row">
                    <div class="col-lg-4">
                        <a href="{{route('reports.create')}}"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
                        بلاغ جديد
                        </a>
                    </div>
                </div>
                <hr>
            @endif       
                    <div class="container">
                        <div class="row">
                            <div class="col-md-11 table-responsive">
                                <table class="table hover table-hover table-bordered" id="reportsTable">
                                    <thead>
                                        <tr>
                                            <th> </th>
                                            <th>مكان البلاغ</th>
                                            <th>تاريخ البلاغ</th>
                                            <th>اسم المبلغ</th>
											<th>هاتف المبلغ</th>
                                            <th>مسؤول الصيانة</th>
                                            <th>م. الصيانة</th>
                                            <th>حالة البلاغ</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                        </div>

                    </div> <!-- ./container -->
                
            </div>

        </div>
        
        <div class="box-footer">
        </div>

   
@endsection

@section('javascript')

        <script>
            $(document).ready(function(){
                var user_type = '{{ auth()->user()->user_type_id }}' ;
                
                $('#reportsTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ url('reports-all') }}',
                    columns: [
                            { data: 'id'  },
                            { data: 'locality.name' , defaultContent : " " },
                            { data: 'created_at' , defaultContent : " "},
                            { data: 'name' , defaultContent : " "} ,
							{ data: 'phone1' , defaultContent : " "} ,
                            { data: 'manager_name' , defaultContent : " "},
                            { data: 'office.name' ,	defaultContent : " "	},
                            { data: 'status.name' , defaultContent : " "},
                            { data: 'id',
                                    render:function(data, type, row, meta){
                                        var btn = '' ;
                                        if(user_type == 3){
                                            btn = ' ' ;
                                        }else{
                                            btn = '<a href="reports/'+row.id+'">عرض</a>';
                                        }
                                        return btn ;
                                    }
                            }
                    ],
                    "language":
                    {
                        "sProcessing": "جارٍ التحميل...",
                        "sLengthMenu": "أظهر _MENU_ مدخلات",
                        "sZeroRecords": "لم يعثر على أية سجلات",
                        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                        "sInfoPostFix": "",
                        "sSearch": "ابحث:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "الأول",
                            "sPrevious": "السابق",
                            "sNext": "التالي",
                            "sLast": "الأخير"
                        }
                    }
                });
                
                $('.message').hide(8000);

            });
        </script>

@endsection