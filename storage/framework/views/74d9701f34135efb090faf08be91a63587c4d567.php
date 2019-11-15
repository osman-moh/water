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
            <h3 class="box-title"> المناطق الكبري </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4">
                    <a href="<?php echo e(route('cities.create')); ?>"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
 منطقة كبري جديدة
                    </a>
                </div>
            </div>
            <hr>
            <div class="row" >

                <table id="Comm" class="table table-bordered" >
                    <thead>
                    <tr>
                        <th >الترقيم</th>
                        <th>المنطقة </th>

                        <th > انشاء     </th>
                        <th > تحديث     </th>
                        <th colspan="2" > الاجراء     </th>
                    </tr>
                    </thead>


                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value->id); ?></td>
                            <td><?php echo e($value->name); ?></td>
                            <td><?php echo e($value->created_at); ?></td>
                            <td><?php echo e($value->updated_at); ?></td>
                            <td>
                                <a  class="btn btn-success" href="<?php echo e(route('cities.edit',$value->id)); ?>">
                                    تعديل

                                </a>
                            </td>
                            <td>
                                <form  action="<?php echo e(route('cities.destroy',$value->id)); ?>"method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                    <button    type="submit" class="btn btn-danger">
                                        <i class="fa fa-fw fa-remove"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>

            </div>
        </div>
        <div class="box-footer">




        </div>
    </div>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
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
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>