@extends('layouts.app')
@section('title' , 'المربعات')
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

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"> المربعات   </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4">
                    <a href="{{route('squares.create')}}"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
                         اضافة مربع جديد
                    </a>
                </div>
            </div>
           
            <div class="container">
                        <div class="row">
                            <div class="col-md-11 table-responsive">
                                <table class="table hover table-hover table-bordered" id="squaresTable">

                
                    <thead>
                    <tr>
                        <th >الترقيم</th>
                        <th>المربع   </th>
                        <th>المنطقة الكبري </th>
                        <th>المحلية  </th>
                        <th>المدينة  </th>
                        <th> الاجراء     </th>
                        
                    </tr>
                    </thead>

                   
                </table>

            </div>
        </div>
      <!--  <div class="box-footer">

            {{$data->links()}}


        </div>-->
    </div>
@endsection

@section('javascript')
        <script>
            $(document).ready(function(){
                var user_type = '{{ auth()->user()->user_type_id }}' ;
                
                $('#squaresTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ url('squares-all') }}',

                            columns: [
                            { data: 'id'  },
                            { data: 'name' , defaultContent : " "} ,
							{ data: 'city.name' , defaultContent : " "} ,
                            { data: 'locality.name' , defaultContent : " "},
                            { data: 'town.name' ,	defaultContent : " "	},    
                         { data: 'id',
                                    render:function(data, type, row, meta){
                                        var btn = '' ;
                                        if(user_type == 3){
                                            btn = ' ' ;
                                        }else{
                                            btn = '<a href="squares/'+row.id+'">عرض</a>';
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