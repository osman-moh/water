    

    <?php $__env->startSection('content'); ?> 

        <?php if(Session::has('status')): ?>
            <div class="alert alert-info"><?php echo e(Session::get('status')); ?></div>
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

        <div class="container">
            <hr>
            <div class="row" dir="rtl">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary" href="#"><i class="fa fa-fw fa-plus"></i>مستخدم جديد</a>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel">
                        <div class="panel-heading"><h5>   المستخدمين  </h5> </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-responsive text-center" dir="rtl">
                                <tr>
                                    <th class="text-center"><input type="checkbox" class="flat-red" id="checkall" ></th>
                                    <th class="text-center">الترقيم</th>
                                    <th class="text-center"> الاسم</th>
                                    <th class="text-center"> البريد </th>

                                    <th class="text-center" colspan="3"> الاجراء</th>
                                </tr>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="flat-red"  name="studantid" value="<?php echo e($value->id); ?>" >
                                        </td>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($value->name); ?></td>
                                        <td><?php echo e($value->email); ?></td>

                                        <td>
                                            <a href="<?php echo e(route('user.edit',$value->id)); ?>" class="btn btn-success" value="<?php echo e($value->id); ?>">
                                                <i class="fa fa-fw fa-edit"></i>تعديل
                                            </a>
                                        </td>
                                        <td>
                                            <form action="<?php echo e(route('user.destroy',$value->id)); ?>" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <button type="submit" class="btn btn-danger" value="<?php echo e($value->id); ?>">
                                                    <i class="fa fa-fw fa-remove"></i>
                                                    حذف</button>
                                            </form>
                                        </td>
                                        <td>

                                    </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>

                        </div>
                    </div>
                </div>
            </div> <!-- ./ row-->
    </div><!-- ./container -->
        
        <script>
           /* $.('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
            <!--checkall -->
            // Remove the checked state from "All" if any checkbox is unchecked
            $('#checkall').on('ifChecked', function(event){
                $('input').iCheck('check');
            });
            $('#checkall').on('ifUnchecked', function(event){
                $('input').iCheck('uncheck');
            });
*/
        </script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>