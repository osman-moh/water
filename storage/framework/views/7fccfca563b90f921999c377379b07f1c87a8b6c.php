
<div class="col-lg-12">
    <lebel>   المربع  : </lebel>
    <select id="square_id" class="form-control" name="quare_id">
        <option value="<?php echo e(null); ?>" selected> اختر</option>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </select>
</div>

