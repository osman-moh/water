<?php $__env->startSection('title' , 'تعديل نوع البلاغ'); ?>
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
            <h3 class="box-title">  تعديل انواع البلاغات    </h3>
        </div>
        <div class="box-body">
            <form id="send"  method="POST" action="<?php echo e(route('reportType.update',$data->id)); ?>">
                <?php echo e(csrf_field()); ?>

                <input name="_method" type="hidden" value="PUT">
                <div class="row">
                    <div class="col-lg-6">
                        <label> الاسم : </label>
                            <input placeholder="نوع البلاغ" name="type" class="form-control" value="<?php echo e($data->name); ?>"
                            required  pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z0-9\s]{1,300}"
                            oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال نوع المسخدم')" 
                            oninput="this.setCustomValidity('')"
                            title="يجب ان يحتوي على حروف او ارقام">
                        </div>
                        <div class="col-lg-6"></div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            حفظ 
                        </button>
                    </div>
            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>