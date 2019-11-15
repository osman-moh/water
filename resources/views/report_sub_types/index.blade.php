@extends('layouts.app') 
@section('title' , 'البنود الفرعية للبلاغات')
@section('content')
    @if (Session::has('message'))
        <div class="h3 alert alert-success text-center">{{ Session::get('message') }}</div>
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
            <h3 class="box-title">  بنود البلاغات الفرعية </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4">
                    <a href="{{route('report_sub_types.create')}}"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
                               اضافة بند جديد
                    </a>
                </div>
            </div>
            <hr>
            <div class="row" >
                <div class="col-lg-8">
                <table id="Comm" class="table table-bordered" >
                    <thead>
                    <tr>
                        <th >الترقيم</th>
                        <th>البند </th>
                        <th>نوع البلاغ</th>
                        <th colspan="2" class="text-center"> الاجراء   </th>
                    </tr>
                    </thead>
                    @foreach($sub_types as $kay=>$value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->report_type->name}}</td>
                            <td>
                                <a  class="btn btn-success" href="{{route('report_sub_types.edit',$value->id)}}">
                                    تعديل

                                </a>
                            </td>
                            <td>
                                <form  action="{{route('report_sub_types.destroy',$value->id)}}"method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button    type="submit" class="btn btn-danger">
                                        <i class="fa fa-fw fa-remove"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="box-footer">




        </div>
    </div>




@endsection
@section('javascript')
    <script>
        $(function() {
            $('#Comm').DataTable({

                "language": {
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
                },


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
                    },


                ]
            });
        });
    </script>
@endsection
