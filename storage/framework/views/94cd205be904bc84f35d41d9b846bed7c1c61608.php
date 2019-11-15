<?php $__env->startSection('title' , 'انواع الجهات المبلغة'); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Session::has('message')): ?>
        <div class="h3 alert alert-success text-center"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">  تصنيف البلاغات </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4">
                    <a href="<?php echo e(route('category.create')); ?>"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
تصنيف جديد
                    </a>
                </div>
            </div>
            <hr>
            <div class="row" >

                <table id="Comm" class="table table-bordered" >

                    <tr>
                        <th >الترقيم</th>
                        <th>اسم الموقع </th>
                        <th> وقت الانشاء </th>
                        <th>التحديث  </th>
                        <th colspan="2" > الاجراء     </th>
                    </tr>

                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td>
                            <?php echo e($value->id); ?>

                        </td>
                        <td>
                            <?php echo e($value->name); ?>

                        </td>
                        <td>
                            <?php echo e($value->created_at); ?>

                        </td>
                        <td>
                            <?php echo e($value->updated_at); ?>

                        </td>
                        <td>
                            <a  class="btn btn-success" href="<?php echo e(route('category.edit',$value->id)); ?>">
                                تعديل

                            </a>
                        </td>
                        <td>
                              <form class="form-submit" action="<?php echo e(route('category.destroy',$value->id)); ?>"method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                    <button  type="button"  class="btn btn-danger delete">
                                    <i class="fa fa-fw fa-remove"></i>
                                </button>
                            </form>
                        </td>
                </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>

            </div>
        </div>
    </div>


        <div class="box-footer">




        </div>
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
	



<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>