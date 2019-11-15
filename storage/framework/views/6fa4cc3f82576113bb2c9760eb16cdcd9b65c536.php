<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="text-center h1" >
        هيئة مياة ولاية الخرطوم
    </div>
    <div class="text-center h3" >
      ادارة الخدمات اللوجستبة
    </div>
    <div class="text-center h3" >
        قسم الطواري
    </div>


    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="btn-group pull-right" data-toggle="buttons">
                <label class="btn btn-info active">
                    <input type="radio" name="date-filter"
                           data-start="<?php echo e(date('Y-m-d')); ?>"
                           data-end="<?php echo e(date('Y-m-d')); ?>"
                           checked> اليوم
                </label>
                <label class="btn btn-info">
                    <input type="radio" name="date-filter"
                           data-start="<?php echo e($date_filters['this_week']['start']); ?>"
                           data-end="<?php echo e($date_filters['this_week']['end']); ?>"
                    > الاسبوع
                </label>
                <label class="btn btn-info">
                    <input type="radio" name="date-filter"
                           data-start="<?php echo e($date_filters['this_month']['start']); ?>"
                           data-end="<?php echo e($date_filters['this_month']['end']); ?>"
                    > الشهر
                </label>
                <label class="btn btn-info">
                    <input type="radio" name="date-filter"
                           data-start="<?php echo e($date_filters['fy']['start']); ?>"
                           data-end="<?php echo e($date_filters['fy']['end']); ?>"
                    > السنة
                </label>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                 <span class="info-box-icon bg-blue">
                    <i class="ion ion-ios-gear-outline"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">مجموعة البلاغات </span>
                    <span class="info-box-number total_purchase"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green">
                    <i class="ion ion-ios-gear-outline"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">تم حلها</span>
                    <span class="info-box-number total_sell">
                        <i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
	        <span class="info-box-icon bg-red">
                    <i class="ion ion-ios-gear-outline"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">لم يتم حلها</span>
                    <span class="info-box-number purchase_due"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->


    </div>
</div>





<?php $__env->stopSection(); ?>



<?php $__env->startSection('javascript'); ?>
    <script>

        $(document).ready(function(){

            var start = $('input[name="date-filter"]:checked').data('start');
            var end = $('input[name="date-filter"]:checked').data('end');
            update_statistics(start, end);
            $(document).on('change', 'input[name="date-filter"]', function(){
                var start = $('input[name="date-filter"]:checked').data('start');
                var end = $('input[name="date-filter"]:checked').data('end');
                update_statistics(start, end);
            });

            //atock alert datatables

            //payment dues datatables


            //Stock expiry report table

        });

        function update_statistics( start, end ){
            var data = { start: start, end: end };
            //get purchase details
            var loader = '<i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i>';
            $('.total_purchase').html(loader);
            $('.purchase_due').html(loader);
            $('.total_sell').html(loader);
            $('.invoice_due').html(loader);
            $.ajax({
                method: "POST",
                url: '/all',
                dataType: "json",
                data: data,
                success: function(data){
                    $('.total_purchase').html(__currency_trans_from_en(data.total_purchase_inc_tax, true ));
                    $('.purchase_due').html( __currency_trans_from_en(data.purchase_due, true));
                }
            });
            //get sell details
            $.ajax({
                method: "POST",
                url: '/home/get-sell-details',
                dataType: "json",
                data: data,
                success: function(data){
                    $('.total_sell').html(__currency_trans_from_en(data.total_sell_inc_tax, true ));
                    $('.invoice_due').html( __currency_trans_from_en(data.invoice_due, true));
                }
            });
        }




    </script>



    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>