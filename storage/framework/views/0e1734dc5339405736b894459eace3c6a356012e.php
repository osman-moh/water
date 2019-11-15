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
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">   تعديل محلية    </h3>
        </div>
        <div class="box-body">


            <form id="send"  method="POST" action="<?php echo e(route('regional.update',$data->id)); ?>">
                <?php echo e(csrf_field()); ?>

                <input name="_method" type="hidden" value="PUT">
                <div class="col-lg-12">
                    <lebel>المحلية : </lebel>
                    <input   name="regional" value="<?php echo e($data->name); ?>" class="form-control">
                </div>
                <div class="col-lg-12">
                    <lebel> المنطقة الكبري   : </lebel>
                    <select class="form-control" name="loction">
                        <option value="<?php echo e(null); ?>"> اختر</option>
                        <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"

                            <?php echo e($data->Lloction_id ==$value->id?"selected":""); ?>

                            > <?php echo e($value->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        حفظ الموقع
                    </button>
                </div>



            </form>

        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
        $('#datepicker').datepicker({

            dateFormat:"yy-mm-dd",
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>