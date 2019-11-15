 
<?php $__env->startSection('title' , 'تعديل بيانات تفصيل بند فرعي'); ?>
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
            <h3 class="box-title">   تعديل البيانات    </h3>
        </div>
        <div class="box-body">


            <form id="send"  method="POST" action="<?php echo e(route('report_sub_details.update',$reportSubDetail->id)); ?>">
                <?php echo e(csrf_field()); ?>

                <input name="_method" type="hidden" value="PUT">
                
                <div class="row">
                        <div class="col-lg-4">
                            <label>تفصيل البند : </label>
                        <input placeholder="الاسم" name="name" class="form-control" required value="<?php echo e($reportSubDetail->name); ?>"
                            pattern="[أ-يa-zA-Z0-9\s]{1,300}"     
                            oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال الاسم')"
                            oninput="this.setCustomValidity('')">
                        </div>
    
                        <div class="col-lg-4">
                            <label>نوع البند  : </label>
                            <select class="form-control" name="report_sub_type_id" required  
                                oninvalid="this.setCustomValidity('عفوا ! الرجاء اختيار بند')"
                                oninput="this.setCustomValidity('')">
                                <option value="<?php echo e(null); ?>"> اختر</option>
                                <?php $__currentLoopData = $report_sub_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>" <?php echo e(($reportSubDetail->report_sub_type_id == $value->id)?'selected' : ''); ?>> 
                                        <?php echo e($value->name); ?>

                                    </option>
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