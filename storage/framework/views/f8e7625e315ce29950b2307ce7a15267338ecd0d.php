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
            <h class="box-title"> ارسال رسائل sms </h>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
           <div class="alert-info ">
                    جاري ارسال الرسالة....
           </div>
            <div>
                <input id="phone" type="hidden" name="phone" value="<?php echo e($phone1); ?>">
				<input id="wokerphone" type="hidden" name="wokerphone" value="<?php echo e(empty($wokerphone)?"":$wokerphone); ?>">				
                <input id="text" type="hidden" name="text" value="<?php echo e($text); ?>">
			     
            </div>


        </div>
        <div class="box-footer">




        </div>
    </div>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
        $(function() {
            phone1 = $("#phone").val();
			wokerphone = $("#wokerphone").val();
			text = $("#text").val();
           
            $.get("http://212.0.129.229/bulksms/" +
                "webacc.aspx?user=watercorp&pwd=8778&smstext="+text+"&Sender=3131&Nums="+phone1+";"+wokerphone+";",
                function(data, status){
                    alert(data);
                    alert(status);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>