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
            <h3 class="box-title">  تعديل مربع   </h3>
        </div>
        <div class="box-body">
            <?php if(Session::has('step1')): ?>
                <form id="send"  method="POST" action="<?php echo e(route('Square.update',Session::get('id'))); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="name" value="<?php echo e(Session::get('name')); ?>">
                    <input type="hidden" name="Lloction_id" value="<?php echo e(Session::get('Lloction_id')); ?>">
                    <input type="hidden" name="regional_id" value="<?php echo e(Session::get('regional_id')); ?>">
                    <?php
                    $data = \App\Suboffices::where('regional_id',Session::get('regional_id'))->get();
                    //dd($data);
                    ?>
                    <?php echo $__env->make('sub',$data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
                    <button type="submit" class="btn btn-primary"> تعديل  المربع </button>
                </form>

            <?php else: ?>


                <form id="send"  method="POST" action="<?php echo e(route('Square2')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                    <div class="col-lg-12">
                        <lebel>اسم المربع  : </lebel>
                        <input placeholder=" اسم المربع" name="regional" value="<?php echo e($data->name); ?>" class="form-control">
                    </div>
                    <div class="col-lg-12">
                        <lebel>اسم المنطقة الكبري : </lebel>
                        <select id="Lloction" class="form-control" name="Lloction_id">
                            <option value="<?php echo e(null); ?>" selected> اختر</option>
                            <?php $__currentLoopData = $Lloction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-lg-12">
                        <lebel>المحلية : </lebel>
                        <div id="or">

                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            التالي
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
        })
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
        $("#suboffices").change(
            function () {
                $('#sub').empty();
                id = $(this).val();
                $.get('/city/'+id,
                    function(data){

                        $('#sub').append(data);
                    });

            }
        )
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>