@extends('layouts.app')
@section('title' , 'المكاتب الفرعية')
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
            <h3 class="box-title"> المكاتب الفرعية  </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4">
                    <a href="{{route('offices.create')}}"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
                      اضافة مكتب فرعي جديد
                    </a>
                </div>
            </div>
            <hr>
            <div class="row" >
                <div class="col-lg-8">
                <table  class="table">
                    <thead>
                    <tr>
                        <th >الترقيم</th>
                        <th>المكتب الفرعي  </th>
                        <th>المنطقة الكبري </th>
                        <th>المحلية  </th>
                        <th > مدير المكتب     </th>
                        <th colspan="2" class="text-center"> الاجراء     </th>
                    </tr>
                    </thead>

                    @foreach($offices as $key => $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>
                                @isset($value['city']->name)
                                    {{ $value['city']->name }}
                                @endisset
                            </td>
                            <td>
                                @isset($value['locality']->name)
                                    {{ $value['locality']->name }}
                                @endisset
                            </td>
                            <td>{{$value->manager_name}}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('offices.edit',$value->id)}}">
                                    تعديل
                                </a>
                            </td>
                            <td>   
                                       <form class="form-submit" action="{{route('offices.destroy',$value->id)}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                     <button  type="button"  class="btn btn-danger delete">
                                    <i class="fa fa-fw fa-remove"></i></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
				{{ $offices->links() }}
            </div>
            </div>
        </div>
        <div class="box-footer">
            
        </div>

<!-- Modal -->
			<div class="modal fade " id="myModal" role="dialog">
				<div class="modal-dialog">
				
					<!-- Modal content-->
					<div class="modal-content modal-sm">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<div class="alert alert-danger col-sm-12 modal-title"><strong> تنبيه ! </strong></div>
						</div>
						<div class="modal-body">
							<p>هل تود فعلا حذف السجل ؟</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" id="delete-record">موافق</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">إلغاء</button>
						</div>
					</div>
				  
				</div>
			</div>
	



@endsection
@section('javascript')
  <script>
        $(function() {
            /*
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

                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action' }
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
                    },


                ]
            });*/
			
			$('.delete').click(function(){
				$('#myModal').modal('show') ;
			});
			$('#delete-record').click(function(){
				$('.form-submit').submit() ;
			});
			
        });
    </script>
@endsection
