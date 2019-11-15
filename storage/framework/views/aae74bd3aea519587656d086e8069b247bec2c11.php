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
            <h3 class="box-title">   اضافة  مدنية جديدة  </h3>
        </div>
        <div class="box-body">

            <?php if(Session::has('step1')): ?>
                <form id="send"  method="POST" action="<?php echo e(route('City.store')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="name" value="<?php echo e(Session::get('name')); ?>" >
                    <input type="hidden" name="Lloction_id" value="<?php echo e(Session::get('Lloction_id')); ?>" >
                    <input type="hidden" name="regional_id" value="<?php echo e(Session::get('regional_id')); ?>" >
                    <?php
                    $data = \App\Suboffices::where('regional_id',Session::get('regional_id'))->get();
                    //dd($data);
                    ?>
                    <?php echo $__env->make('sub',$data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
                    <button type="submit" class="btn btn-primary"> حفظ المربع </button>
                </form>

            <?php else: ?>


            <form id="send"  method="POST" action="<?php echo e(route('City2')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="col-lg-12">
                    <lebel>اسم المنطقة الكبري : </lebel>
                   <select id="Lloction" class="form-control" name="Lloction_id"   required=""    
				       oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر اسم المنطقة الكبرى  ')"
					   oninput="this.setCustomValidity('')" >
                       <option value="<?php echo e(null); ?>" selected> اختر</option>
                       <?php $__currentLoopData = $Lloction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                   </select>
                </div>
                <div class="col-lg-12">
                    <lebel>المحلية : </lebel>
					<select id="Lloction" class="form-control" name="Lloction_id"   required=""    
				       oninvalid="this.setCustomValidity('عفوا ! الرجاء اختر المحلية   ')"
					   oninput="this.setCustomValidity('')" >
                       <option value="<?php echo e(null); ?>" selected> اختر</option>
                       <?php $__currentLoopData = $Lloction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                   </select>
                    <div id="or">

                    </div>
                </div>


                <div class="col-lg-12">
                    <lebel>الاسم  : </lebel>
                   <input name="name"  class=" form-control"=""     required="" pattern="[أ-يa-zA-Z0-9\s]{1,300}"     
				       oninvalid="this.setCustomValidity('عفوا ! الرجاء ادخال الاسم')"
					   oninput="this.setCustomValidity('')" 
					   title="يجب ان يحتوي على حروف وارقام"
				   
                     >
				   
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        حفظ الموقع
                    </button>
                </div>



            </form>
            <?php endif; ?>

        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
        $('#datepicker').datepicker({

            dateFormat:"yy-mm-dd",
        });
        $("#Lloction").change(
            function () {
                id = $(this).val();
                $.get('/regionaloption/'+id,
                    function(data){
                        // alert(data)
                        html = "<select id='Lloction' class='form-control' name='regional_id'>";
                        html2 =html+data;
                        html3 = html2+ "<select>";
                        $('#or').html(html3);
                    });

            }
        )
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>