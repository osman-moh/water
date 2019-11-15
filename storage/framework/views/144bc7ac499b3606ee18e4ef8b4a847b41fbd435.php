<?php $__env->startSection('title' , 'تعديل أنواع المستخدمين'); ?>
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
            <h3 class="box-title">  تعديل انواع المستخدمين    </h3>
        </div>
        <div class="box-body">
            <form id="send"  method="POST" action="<?php echo e(route('usersType.update',$data->id)); ?>">

                <?php echo e(csrf_field()); ?>

                <input name="_method" type="hidden" value="PUT">
                <div class="col-lg-12">
                    
                    <input placeholder="اسم الموقع" name="user_type" class="form-control" value="<?php echo e($data->name); ?>"
                    
                            required=""
                            pattern="[أ-يa-zA-Z0-9\s]{1,300}" 
                            oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال الاسم')" 
                            oninput="this.setCustomValidity('')"
                            title="يجب ان يحتوي على حروف او ارقام">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                           تعديل الموقع
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>