 

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
            <h3 class="box-title"> تعديل  مكتب فرعي </h3>
        </div>
        <div class="box-body">

            <form id="send"  method="POST" action="<?php echo e(route('offices.update',$offices->id)); ?>">
                <?php echo e(csrf_field()); ?>

                <?php echo method_field('PUT'); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <label>اسم المكتب الفرعي : </label>
                        <input placeholder="اسم المكتب الفرعي" name="name" class="form-control" value="<?php echo e($offices->name); ?>"
                            required pattern="[أ-يa-zA-Z0-9\s]{1,300}"     
                            oninvalid="this.setCustomValidity('الرجاء كتابة اسم المكتب')"
                            oninput="this.setCustomValidity('')"
                            title="يجب ان يحتوي على حروف وارقام">
                    </div>
                    <div class="col-lg-6"></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">مدير المكتب</label>
                        <input type="text" name="manager_name" class="form-control" id="" value="<?php echo e($offices->manager_name); ?>">
                    </div>
                    <div class="col-lg-3">
                        <label for="">رقم الهاتف</label>
                        <input type="number" name="phone" class="form-control" id="" value="<?php echo e($offices->manager_phone); ?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <label> المنطقة الكبري   : </label>
                        <select id="city_id" class="form-control" name="city_id"required
                                oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المنطقة الكبرى  ')"
                                oninput="this.setCustomValidity('')">
                                <option value="<?php echo e(null); ?>"> اختر</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>" <?php echo e(($offices->city_id ==$value->id)?'selected' : ''); ?>> 
                                        <?php echo e($value->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label>المحلية : </label>
                        <select id="locality_id" class="form-control" name="locality_id" required    
                            oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر المحلية   ')"
                            oninput="this.setCustomValidity('')">
                            
                            <option value="<?php echo e(null); ?>"> اختر</option>
                            <?php $__currentLoopData = $localities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>" <?php echo e(($offices->locality_id == $value->id)?'selected' : ''); ?>> 
                                    <?php echo e($value->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="text-center" align="right"><button type="submit" class="btn btn-primary">حفظ المكتب</button></div>
                </div>



            </form>

        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
  <script>
      
      $("#city_id").change(
                function () {
                    var id = $(this).val();
                    $.get('/city-localities-list/'+id,
                        function(data){
                            var options = '<option></option>' ;
                            $.each(data , function (key , value) {
                                options += '<option value='+value.id+'>'+value.name+'</option>';
                            });
                            $('#locality_id').html(options);
                        });

                }
            );
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>