 

<?php $__env->startSection('title' , 'البلاغات'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Session::has('message')): ?>
        <div class="h3 alert alert-success text-center message">
			<?php echo e(Session::get('message')); ?>

			(<?php echo e(Session::get('id')); ?>)
		</div>
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
                <h3 class="box-title"> البلاغات </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
			<?php if(auth()->user()->type !== 2): ?>
                <div class="row">
                    <div class="col-lg-4">
                        <a href="<?php echo e(route('reports.create')); ?>"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
                        بلاغ جديد
                        </a>
                    </div>
                </div>
                <hr>
            <?php endif; ?>       
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

   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

        <script>
            $(document).ready(function(){
                var user_type = '<?php echo e(auth()->user()->type); ?>' ;
                
                $('#reportsTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '<?php echo e(url('reports-all')); ?>',
                    columns: [
                            { data: 'id'  },
                            { data: 'locality.name' },
                            { data: 'created_at'},
                            { data: 'name'} ,
                            { data: 'manager_name'},
                            { data: 'office.name'},
                            { data: 'status.name'},
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>