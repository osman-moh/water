
<!-- jQuery 2.2.3 -->
<script src="<?php echo e(asset('plugins/jquery/dist/jquery.min.js')); ?>"></script>

<!--script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script-->

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('bootstrap/js/bootstrap-select.min.js')); ?>"></script>

<!-- iCheck --
<script src="<?php echo e(asset('plugins/iCheck/icheck.js')); ?>"></script>
<!-- Select2 --
<script src="<?php echo e(asset('plugins/select2/js/select2.full.js')); ?>"></script>
<!-- Add language file for select2
//<script src=" //asset('AdminLTE/plugins/select2/lang/ar') }}"></script>
<!-- bootstrap datepicker
<script src=" //asset('AdminLTE/plugins/datepicker/bootstrap-datepicker.min.js') }}"></script>

<!-- DataTables -->
<script src="<?php echo e(asset('plugins/DataTables/datatables.min.js')); ?>"></script>

<!--script src="<?php echo e(asset('plugins/DataTables/Buttons-1.5.2/js/dataTables.buttons.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/DataTables/pdfmake-0.1.36/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/DataTables/pdfmake-0.1.36/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/DataTables/Buttons-1.5.2/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/DataTables/Buttons-1.5.2/js/buttons.print.min.js')); ?>"></script-->

<!-- jQuery Validator --
<script src="<?php echo e(asset('js/jquery-validation-1.16.0/dist/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-validation-1.16.0/dist/additional-methods.min.js')); ?>"></script>

<!-- Toastr --
<script src="<?php echo e(asset('plugins/toastr/toastr.min.js')); ?>"></script>
<!-- Bootstrap file input
//<script src=" //asset('plugins/bootstrap-fileinput/fileinput.min.js') }}"></script>
<!--accounting js
<script src="// //asset('plugins/accounting.min.js') }}"></script>

<script src=" //asset('AdminLTE/plugins/daterangepicker/moment.min.js') }}"></script>

<script src=" //asset('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
-->
<!--script src="<?php echo e(asset('plugins/time/jquery.datetimepicker.full.js')); ?>"></script-->

<!--script src="<?php echo e(asset('plugins/sweetalert/sweetalert.min.js')); ?>"></script-->

<!--script src="<?php echo e(asset('plugins/bootstrap-tour/bootstrap-tour.min.js')); ?>"></script-->

<!--script src="<?php echo e(asset('plugins/printThis.js')); ?>"></script-->


<!--<script src=" //asset('plugins/screenfull.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    var financial_year = {
    	start: moment('<?php echo e(Session::get("financial_year.start")); ?>'),
    	end: moment('<?php echo e(Session::get("financial_year.end")); ?>'),
    }
    //Default setting for select2
    $.fn.select2.defaults.set("language", "<?php echo e(session()->get('user.language', config('app.locale'))); ?>");


</script>

<!-- Scripts -->
<script src="<?php echo e(asset('js/AdminLTE-app.js')); ?>"></script>
<!--script src="<?php echo e(asset('js/functions.js')); ?>"></script-->
<!--<script src=" //asset('js/common.js') }}"></script>-->
<!--script src="<?php echo e(asset('js/app.js')); ?>"></script-->
<!--script src="<?php echo e(asset('js/help-tour.js')); ?>"></script-->


<?php echo $__env->yieldContent('javascript'); ?>


