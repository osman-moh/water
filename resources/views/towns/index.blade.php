@extends('layouts.app')
@section('title' , 'المدن || الأحياء')
@section('content')
    @if (Session::has('message'))
        <div class="h3 alert alert-success text-center message">{{ Session::get('message') }}</div>
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
    
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> المدن  </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4">
                    <a href="{{route('towns.create')}}"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
مدنية جديدة
                    </a>
                </div>
            </div>
           <div class="row"><br></div>
            <div class="row" >
                <div class="col-md-11">
                    <table  class="table table-bordered" id ="townsTable" >
                        <thead>
                        <tr>
                            <th >الترقيم</th>
                            <th>المدينة   </th>
                            <th>المنطقة الكبري </th>
                            <th>المحلية  </th>
                            <th>المكتب  </th>
                           
                            <th> الاجراء</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
           
        </div> <!-- ./box-body -->
        
    </div>
@endsection


@section('javascript')

        <script>
            $(document).ready(function(){
                var user_type = '{{ auth()->user()->type }}' ;
                
                $('#townsTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ url('towns-all') }}',
                    columns: [
                            { data: 'id' , defaultContent : " 2" },
                            { data: 'name' , defaultContent : " "} ,
                            { data: 'city.name' , defaultContent : " " },                      
                          //  { data: 'office.name' ,	defaultContent : " "	},
                            { data: 'locality.name' , defaultContent : " " },                      
                            { data: 'office.name' ,	defaultContent : " "	},
                            { data: 'id',
                                    render:function(data, type, row, meta){
                                        var btn = '' ;
                                        if(user_type == 3){
                                            btn = ' ' ;
                                        }else{
                                            btn = '<a href="towns/'+row.id+'">عرض</a>';
                                        }
                                        return btn ;
                                    }
                            }
                         
                            
                    ],

                    search: {
                    "regex": true
                },
                dom: 'lBfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        text: 'Copy to clipboard'
                    },
                    'excel',

                    {
                        extend: 'print',
                        text: 'طباعة',
                        autoPrint: true,
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'colvis',
                        text: 'الأعمدة',
                        autoPrint: true,
                        exportOptions: {
                            columns: ':visible'
                        },
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