<?php $__env->startSection('content'); ?>
    <?php if(Session::has('message')): ?>
        <div class="h3 alert alert-success text-center message"><?php echo e(Session::get('message')); ?></div>
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
                    <a href="<?php echo e(route('offices.create')); ?>"  class="btn btn-primary" ><i class="fa fa-fw fa-plus-square"></i>
                      اضافة مكتب فرعي جديد
                    </a>
                </div>
            </div>
            <hr>
            <div class="row" >

                <table  class="table table-bordered" id="officesTable">
                    <thead>
                    <tr>
                        <th >الترقيم</th>
                        <th>المكتب الفرعي  </th>
                        <th>المنطقة الكبري </th>
                        <th>المحلية  </th>
                        <th > مدير المكتب     </th>
                        <th colspan="2"> الاجراء     </th>
                    </tr>
                    </thead>

                    <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value->id); ?></td>
                            <td><?php echo e($value->name); ?></td>
                            <td>
                                <?php if(isset($value['city']->name)): ?>
                                    <?php echo e($value['city']->name); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(isset($value['locality']->name)): ?>
                                    <?php echo e($value['locality']->name); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($value->manager_name); ?></td>
                            <td>
                                <a class="btn btn-success" href="<?php echo e(route('offices.edit',$value->id)); ?>">
                                    تعديل

                                </a>
                                <a class="btn btn-danger">
                                    <form action="<?php echo e(route('offices.destroy',$value->id)); ?>"method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                        <i class="fa fa-fw fa-remove"></i>

                                    </form>
                                </a>


                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>

            </div>
        </div>
        <div class="box-footer">
            <?php echo e($offices->links()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        $(document).ready(function(){
            $('.message').hide(4000);

            //$('#officesTable').DataTable();

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>