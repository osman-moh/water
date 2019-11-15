<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title> مياة ولاية الخرطوم  </title>

        <script src="<?php echo e(asset('AdminLTE/plugins/pace/pace.min.js')); ?>"></script>
        <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/plugins/pace/pace.css')); ?>">
        <?php echo $__env->make('layouts.partials.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('css'); ?>
    </head>
    <body class=" hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
                <?php echo $__env->make('layouts.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php echo $__env->yieldContent('content'); ?>
            </div>

                <?php echo $__env->make('layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             </div>

        <?php echo $__env->make('layouts.partials.javascripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



    <!--   تغير لمة السر model-->
        <div  id="changpasswoerd"  	class="modal fade text-right" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo e(route("changepass")); ?>" method="post">
                        <div class="modal-header"> تغير كلمة السر:
                            <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <?php echo e(csrf_field()); ?>

                            <label> كلمة السر القديمة </label>
                            <input name="oldpass" type="text" class="form-control">
                            <label> كلمة السر الجديدة </label>
                            <input  name="password" type="text" class="form-control">
                            <label>تاكيد  كلمة السر الجديدة </label>
                            <input name="password_confirmation" type="text" class="form-control">

                        </div>
                        <div class="modal-footer">
                            <button> تغير</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>



        
    </body>

</html>