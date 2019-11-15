<?php $__env->startSection('title' , 'موقع بلاغات جديد'); ?>

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
            <h3 class="box-title">موقع جديد </h3>
        </div>
        <div class="box-body">
            <form id="send"  method="POST" action="<?php echo e(route('locations.store')); ?>">
                <?php echo e(csrf_field()); ?>

                
                <div class="row">
                    <div class="col-lg-6">
                        <label> مكان استقبال  البلاغ : </label>
                        <input placeholder="اسم الموقع" name="location" class="form-control" required pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z\s]{1,300}"
                                oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال الاسم')" 
                                oninput="this.setCustomValidity('')"
                                title="يجب ان يحتوي على حروف او ارقام">
                    </div>
                    <div class="col-lg-6"></div>
                </div><hr>
                <div class="row">
                    <div class="col-lg-12"></div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>