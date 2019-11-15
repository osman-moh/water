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
            <h3 class="box-title">  تعديل بلاغ رقم <?php echo e($data->id); ?>  </h3>
        </div>
        <div class="box-body">
            <form id="send"  method="POST" action="<?php echo e(route('Comm.update',$data->id)); ?>">

                <?php echo e(csrf_field()); ?>

                <input name="_method" type="hidden" value="PUT">
                <div class="col-lg-6">
                    <lebel> مكان استقبال  البلاغ : </lebel>
                    <select class="form-control" name="loction">
                        <option value="<?php echo e(null); ?>"> اختر</option>
                        <?php $__currentLoopData = $loction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                            <?php echo e($data->loction == $value->id?"selected":""); ?>


                            > <?php echo e($value->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </select>
                </div>
                <div class="col-lg-6">
                    <lebel> التاريخ    : </lebel>
                    <input id="datepicker" autocomplete="off" name="date" class="form-control"  value="<?php echo e($data->date); ?>">
                </div>
                <div class="col-lg-12">
                    <br>
                    <br>

                    <fieldset>
                        <legend> بيانات الشخص المبلغ/ الجهة المبلغة</legend>
                        <div class="row">
                            <div class="col-lg-6">
                                <lebel> الاسم الشخص المبلغ    : </lebel>
                                <input id="datepicker" name="name" class="form-control" value="<?php echo e($data->name); ?>" >
                            </div>
                            <div class="col-lg-6">
                                <div class="text-center h3">
                                    تصنيف الجهة المبلغة :
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-2">
                                <lebel>   ارقام هواتف  المبلغ    : </lebel>
                            </div>
                            <div class="col-lg-2">
                                <input id="datepicker" name="phone1" class="form-control col-xs-3" value="<?php echo e($data->phone1); ?>" >
                            </div>
                            <div class="col-lg-2">
                                <input id="datepicker" name="phone2" class="form-control col-xs-3" value="<?php echo e($data->phone2); ?>" >
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control" name="type">
                                    <option value="<?php echo e(null); ?>"> اختر</option>

                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option value="<?php echo e($value->id); ?>"
                                                <?php echo e($data->type == $value->id?"selected":""); ?>


                                        > <?php echo e($value->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <lebel>مدير الصيانة المعني   : </lebel>
                                <input  name="wokername" class="form-control"  value="<?php echo e($data->wokername); ?>">
                            </div>
                            <div class="col-lg-6">
                                <div class="text-center ">
                                    <lebel>رقم الهاتف     : </lebel>
                                    <input  name="wokerphone" class="form-control" value="<?php echo e($data->wokerphone); ?>">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <br>
                    <br>
                    <fieldset>
                        <legend> بيانات البلاغ </legend>
                        <div class="row">
                            <div class="col-lg-4">
                                <lebel> المنطقة الكبري   : </lebel>
                                <select id="Lloction" class="form-control" name="Lloction">
                                    <option value="<?php echo e(null); ?>"> اختر</option>
                                    <?php $__currentLoopData = $Lloction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"> <?php echo e($value->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-lg-8" id="or">

                            </div>

                        </div>
                        <div class="row">

                            <div class="col-lg-4">
                                <label>رقم المنزل :</label>
                                <input type="text" name="House_number" class="form-control" value="<?php echo e($data->Housenumber); ?>">
                            </div>
                        </div>
                        <div class="row">

                            <label>الوصف/ معلم بارز  :</label>
                            <textarea  name="description" class="form-control" value="<?php echo e($data->description); ?>">
                                </textarea>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <label> نوع البلاغ:</label>

                                <select name="Type_communication" class="form-control" value="<?php echo e($data->type); ?>" >
                                    <option value="1">   عطش </option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label> تفاصيل نوع البلاغ :</label>

                                <select name="Details_communication" class="form-control" >
                                    <option value="1">   عطش منزل واحد </option>
                                </select>
                            </div>
                        </div>

                    </fieldset>
                </div>




                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> حفظ البلاغ</button>
                </div>



            </form>

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
                $.get('/regionaloption2/'+id,
                    function(data){
                        // alert(data)
                        html = "<select id='Lloction' class='form-control' name='regional_id'>";
                        html2 =html+data;
                        html3 = html2+ "<select>";
                        $('#or').html(data);
                    });

            }
        );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>