 
<?php $__env->startSection('title' , 'إدخال تفصيل بند فرعي جديد'); ?>
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
            <h3 class="box-title"> تفصيل بند فرعي جديد </h3>
        </div>
        <div class="box-body">

          <?php if(empty($report_sub_types)): ?>

            die('لا يوجد تفصيل بلاغ')

          <?php endif; ?>
            <form id="send"  method="POST" action="<?php echo e(route('report_sub_details.store')); ?>">
                <?php echo e(csrf_field()); ?>


                <div class="row">
                    <div class="col-lg-4">
                        <label>البند : </label>
                    <input placeholder="الاسم" name="name" class="form-control"
                    required  pattern="[ء-ئ-أ-ي-ؤ-ة-a-zA-Z0-9\s]{1,300}"   
                        oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال الاسم')"
                        oninput="this.setCustomValidity('')">
                    </div>

                    <div class="col-lg-4">
                        <label> نوع البند الفرعي : </label>
                        <select class="form-control" name="report_sub_type_id" required  
                            oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر نوع البند')"
                            oninput="this.setCustomValidity('')">
                            <option value="<?php echo e(null); ?>"> اختر</option>
                            <?php $__currentLoopData = $report_sub_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>"> <?php echo e($value->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div><hr>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        حفظ البند
                    </button>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>